#!/usr/bin/env bash
set -euo pipefail
composer install
vendor/bin/phpunit
