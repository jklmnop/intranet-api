# LeBow Intranet API

## Getting Started

1. `$ git clone git@github.com:jklmnop/intranet-api.git`
1. `$ cd intranet-api`
1. `$ lando start`
1. `$ lando composer install`
1. `$ lando console doctrine:migrations:migrate`
1. Navigate to `https://intranet-api.lndo.site/api`
1. Play around with the API

## Entities

### Creating a new Entity

Run this command and follow the prompts  
`$ lando console make:entity`

Create the migration for Doctrine to run  
`$ lando console make:migration`

Run the migration to update the database  
`$ lando console doctrine:migrations:migrate`

### Entity Relationships

While creating a field on an entity, you will be asked about the type. Type `relation` and follow the prompts based on the needs of the relationship.

The related Entity must already be created.

### Updating an Entity

__Hint: it's basically the same thing as creating an entity, but you use an existing name.__

Run this command and type the name of the existing entity you want to augment.  
`$ lando console make:entity` 

Create the migration for Doctrine to run  
`$ lando console make:migration`

Run the migration to update the database  
`$ lando console doctrine:migrations:migrate`
