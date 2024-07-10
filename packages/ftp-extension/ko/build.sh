#!/bin/bash

set -e

composer install --no-dev --optimize-autoloader --ignore-platform-req=ext-ftp
