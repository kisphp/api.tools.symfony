#!/bin/bash

PHP=`which php`
COMPOSER=`which composer`
NPM=`which npm`
PHPUNIT=`which phpunit`
PWD=`pwd`

export SYMFONY_ENV=prod

function writeIndexFile {
    if [[ -f "web/index.php" ]]; then
        exit 0
    fi

    TYPE=''
    if [[ "dev" == "$1" ]]; then
        TYPE='_dev'
    fi

    echo "<?php " > web/index.php
    echo " " >> web/index.php
    echo "include __DIR__ . 'app$TYPE.php';" >> web/index.php

    exit 0
}

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

writeIndexFile $1
