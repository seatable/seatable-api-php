#!/bin/bash

# this script generates the SeaTable php API Client with the openapi generator docker image.
# replace the yaml files in /openapi_input/ and run this script. 

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
cd "$SCRIPT_DIR" || exit

sudo rm -r ./lib/*
sudo rm -r ./test/*
sudo rm -r ./docs/*

TAG="v7.6.0"

# generate sysadmin
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/system_admin_account_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_sysadmin.json \
 -t /local/generator/templates/php/
sudo mkdir ./docs/SysAdmin
sudo mv ./docs/{Api,Model} ./docs/SysAdmin
sudo mv ./README.md ./README_SysAdmin.md

# teamadmin
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/team_admin_account_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_teamadmin.json \
 -t /local/generator/templates/php/
sudo mkdir ./docs/TeamAdmin
sudo mv ./docs/{Api,Model} ./docs/TeamAdmin
sudo mv ./README.md ./README_TeamAmin.md

# user
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/user_account_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_user.json \
 -t /local/generator/templates/php/
sudo mkdir ./docs/User
sudo mv ./docs/{Api,Model} ./docs/User
sudo mv ./README.md ./README_User.md

# base
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/base_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_base.json \
 -t /local/generator/templates/php/
sudo mkdir ./docs/Base
sudo mv ./docs/{Api,Model} ./docs/Base
sudo mv ./README.md ./README_Base.md

# file
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/file_operations.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_file.json \
 -t /local/generator/templates/php/
sudo mkdir ./docs/File
sudo mv ./docs/{Api,Model} ./docs/File
sudo mv ./README.md ./README_File.md

# auth
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli:$TAG generate \
 -i /local/openapi_input/authentication.yaml \
 -g php \
 -o /local \
 -c /local/generator/config/config_authentication.json \
 -t /local/generator/templates/php/
sudo mkdir ./docs/Auth
sudo mv ./docs/{Api,Model} ./docs/Auth
sudo mv ./README.md ./README_Auth.md

cp README.backup README.md
echo "client_test" >> ./.gitignore
sudo chown -R christoph: ./*