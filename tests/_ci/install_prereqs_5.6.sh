#!/usr/bin/env bash

source ${TRAVIS_BUILD_DIR}/tests/_ci/install_common.sh

install_extension imagick
enable_extension memcache
enable_extension memcached
install_extension yaml
install_extension mongo

printf "\n" | pecl install apcu-4.0.11 &> /dev/null

echo "apc.enable_cli=On" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini

install_igbinary
