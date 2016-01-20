#!/bin/bash

PHP=`which php`
COMPOSER=`which composer`
NPM=`which npm`
PHPUNIT=`which phpunit`

export SYMFONY_ENV=prod

if [[ "dev" == "$1" ]]; then
    $COMPOSER install
else
    $COMPOSER install --no-dev -o -a
fi

$PHP bin/console cache:clear -e=prod
$PHP bin/console cache:clear -e=dev
$PHP bin/console cache:clear -e=test

rm -rf var/cache/dev
rm -rf var/cache/prod
rm -rf var/cache/test

$NPM install

if [[ "dev" == "$1" ]]; then
    $PHPUNIT
fi
