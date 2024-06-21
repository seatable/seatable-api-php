#!/bin/bash

# this script generates the SeaTable php API Client with the openapi generator docker image.
# replace the yaml files in /openapi_input/ and run this script. 

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
cd "$SCRIPT_DIR" || exit

rm -r ./lib/*
rm -r ./test/*
rm -r ./docs/*

TAG="v7.6.0"

# generate sysadmin
docker run --rm \
 --user $(id -u):$(id -g) \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/system_admin_account_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_sysadmin.json \
 -t /local/generator/templates/php/
mkdir ./docs/SysAdmin
mv ./docs/{Api,Model} ./docs/SysAdmin
mv ./README.md ./README_SysAdmin.md

# teamadmin
docker run --rm \
 --user $(id -u):$(id -g) \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/team_admin_account_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_teamadmin.json \
 -t /local/generator/templates/php/
mkdir ./docs/TeamAdmin
mv ./docs/{Api,Model} ./docs/TeamAdmin
mv ./README.md ./README_TeamAmin.md

# user
docker run --rm \
 --user $(id -u):$(id -g) \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/user_account_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_user.json \
 -t /local/generator/templates/php/
mkdir ./docs/User
mv ./docs/{Api,Model} ./docs/User
mv ./README.md ./README_User.md

# base
docker run --rm \
 --user $(id -u):$(id -g) \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/base_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_base.json \
 -t /local/generator/templates/php/
mkdir ./docs/Base
mv ./docs/{Api,Model} ./docs/Base
mv ./README.md ./README_Base.md

# file
docker run --rm \
 --user $(id -u):$(id -g) \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/file_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_file.json \
 -t /local/generator/templates/php/
mkdir ./docs/File
mv ./docs/{Api,Model} ./docs/File
mv ./README.md ./README_File.md

# auth
docker run --rm \
 --user $(id -u):$(id -g) \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/authentication.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_authentication.json \
 -t /local/generator/templates/php/
mkdir ./docs/Auth
mv ./docs/{Api,Model} ./docs/Auth
mv ./README.md ./README_Auth.md

cp README.backup README.md
echo "client_test" >> ./.gitignore

# Check PHP files for syntax errors
find . -type f -name '*.php' -print0 | xargs -0 -n1 -P4 php -l -n | (! grep -v "No syntax errors detected" )
