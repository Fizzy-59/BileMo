# SnowTricks

Creating an API using the Symfony framework and the API Platform bundle.

## Installation

1. Clone or download the GitHub repository in the desired folder: https://github.com/Fizzy-59/BileMo.git
2. Create and configure .env file for the database connection, SMTP server or mail address in the root directory
   https://symfony.com/doc/current/configuration.html
3. Install dependencies with : "composer install"

### Optional
1. Create the database: `php bin/console doctrine:database:create`
2. Load schemas: `php bin/console doctrine:schema:update --force`
3. Load fixtures in database: `php bin/console doctrine:fixtures:load`

### CLI Common commands

- `php bin/console make:entity`
- `php bin/console make:migration`
- `php bin/console doctrine:migrations:migrate`
- `composer dump-autoload`
- `php bin/console doctrine:database:drop --force`
- `php bin/console doctrine:database:create`
- `php bin/console doctrine:schema:update --force`
- `symfony server:start`

### Doctrine
- `php bin/console doctrine:schema:update --force`
- `php bin/console doctrine:database:create`
- `php bin/console doctrine:schema:update --force`

### Fixtures
-  ` php bin/console doctrine:fixtures:load`