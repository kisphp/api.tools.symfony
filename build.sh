#!/bin/bash

PHP=`which php`
COMPOSER=`which composer`
NPM=`which npm`
PHPUNIT=`which phpunit`
PWD=`pwd`

export SYMFONY_ENV=prod

if [[ "dev" == "$1" ]]; then
    $COMPOSER install
    $PHP $PWD/app/console cache:clear -e=dev
    $PHP $PWD/app/console cache:clear -e=test
else
    $COMPOSER install --no-dev -o -a
fi


$NPM install

if [[ "dev" == "$1" ]]; then
    $PHPUNIT
fi
