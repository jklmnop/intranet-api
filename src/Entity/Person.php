<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *   collectionOperations={"get", "post"},
 *   itemOperations={"get", "put"},
 *   normalizationContext={"groups"={"person:read"}},
 *   denormalizationContext={"groups"={"person:write"}}
 * )
 * @ORM\Entity(repositoryClass=PersonRepository::class)
 */
class Person
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"person:read", "person:write"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"person:read", "person:write"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"person:read", "person:write"})
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity=PersonEmailAddress::class, mappedBy="person", orphanRemoval=true, cascade={"persist"})
     * @Groups({"person:read", "person:write"})
     * @Assert\Valid()
     */
    private $personEmailAddresses;

    public function __construct()
    {
        $this->personEmailAddresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getUserId(): ?string
    {
        return $this->userId;
    }

    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection|PersonEmailAddress[]
     */
    public function getPersonEmailAddresses(): Collection
    {
        return $this->personEmailAddresses;
    }

    public function addPersonEmailAddress(PersonEmailAddress $personEmailAddress): self
    {
        if (!$this->personEmailAddresses->contains($personEmailAddress)) {
            $this->personEmailAddresses[] = $personEmailAddress;
            $personEmailAddress->setPerson($this);
        }

        return $this;
    }

    public function removePersonEmailAddress(PersonEmailAddress $personEmailAddress): self
    {
        if ($this->personEmailAddresses->contains($personEmailAddress)) {
            $this->personEmailAddresses->removeElement($personEmailAddress);
            // set the owning side to null (unless already changed)
            if ($personEmailAddress->getPerson() === $this) {
                $personEmailAddress->setPerson(null);
            }
        }

        return $this;
    }
}
