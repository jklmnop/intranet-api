<?php

namespace App\Entity;

use App\Repository\PersonEmailAddressRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PersonEmailAddressRepository::class)
 */
class PersonEmailAddress
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
    private $emailAddress;

    /**
     * @ORM\ManyToOne(targetEntity=Person::class, inversedBy="personEmailAddresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $person;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    public function setEmailAddress(string $emailAddress): self
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    public function getPerson(): ?Person
    {
        return $this->person;
    }

    public function setPerson(?Person $person): self
    {
        $this->person = $person;

        return $this;
    }
}
