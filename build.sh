#!/bin/bash

PHP=`which php`
COMPOSER=`which composer`
NPM=`which npm`
PHPUNIT=`which phpunit`

$PHP bin/console cache:clear -e=prod
$PHP bin/console cache:clear -e=dev
$PHP bin/console cache:clear -e=test

rm -rf var/cache/dev
rm -rf var/cache/prod
rm -rf var/cache/test

if [[ "dev" == "$1" ]]; then
    $COMPOSER install
else
    $COMPOSER install --no-dev -o -a
fi

$NPM install

$PHPUNIT
