# Symfony blog

* PHP 7.1
* Symfony 3.4
* Doctrine 2.5

## Commands

Database
```bash
$ php bin/console doctrine:database:create
$ php bin/console doctrine:migrations:migrate
```
Assets compile
```bash
$ ./node_modules/.bin/encore dev 
$ ./node_modules/.bin/encore dev --watch #watcher
```
Run tests
```bash
$ php bin/phpunit
```