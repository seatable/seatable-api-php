#!/bin/bash

# this script generates the SeaTable php API Client with the openapi generator docker image.
# replace the yaml files in /openapi_input/ and run this script. 

SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" &> /dev/null && pwd )"
cd "$SCRIPT_DIR" || exit

sudo rm -r ./lib

# generate sysadmin
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli generate \
 -i /local/openapi_input/system_admin_account_operations.yaml \
 -g php \
 -o /local/lib \
 -c /local/generator/config/config_sysadmin.json \
 -t /local/generator/templates/php/


sudo mkdir ./lib/docs/SysAdmin
sudo mv ./lib/docs/{Api,Model} ./lib/docs/SysAdmin
sudo mv ./lib/README.md ./lib/README_SysAdmin.md

# teamadmin
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli generate \
 -i /local/openapi_input/team_admin_account_operations.yaml \
 -g php \
 -o /local/lib \
 -c /local/generator/config/config_teamadmin.json \
 -t /local/generator/templates/php/
sudo mkdir ./lib/docs/TeamAdmin
sudo mv ./lib/docs/{Api,Model} ./lib/docs/TeamAdmin
sudo mv ./lib/README.md ./lib/README_TeamAmin.md

# user
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli generate \
 -i /local/openapi_input/user_account_operations.yaml \
 -g php \
 -o /local/lib \
 -c /local/generator/config/config_user.json \
 -t /local/generator/templates/php/
sudo mkdir ./lib/docs/User
sudo mv ./lib/docs/{Api,Model} ./lib/docs/User
sudo mv ./lib/README.md ./lib/README_User.md

# base
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli generate \
 -i /local/openapi_input/base_operations.yaml \
 -g php \
 -o /local/lib \
 -c /local/generator/config/config_base.json \
 -t /local/generator/templates/php/
sudo mkdir ./lib/docs/Base
sudo mv ./lib/docs/{Api,Model} ./lib/docs/Base
sudo mv ./lib/README.md ./lib/README_Base.md

# file
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli generate \
 -i /local/openapi_input/file_operations.yaml \
 -g php \
 -o /local/lib \
 -c /local/generator/config/config_file.json \
 -t /local/generator/templates/php/
sudo mkdir ./lib/docs/File
sudo mv ./lib/docs/{Api,Model} ./lib/docs/File
sudo mv ./lib/README.md ./lib/README_File.md

# auth
sudo docker run --rm \
 -v ${PWD}:/local openapitools/openapi-generator-cli generate \
 -i /local/openapi_input/authentication.yaml \
 -g php \
 -o /local/lib \
 -c /local/generator/config/config_authentication.json \
 -t /local/generator/templates/php/
sudo mkdir ./lib/docs/Auth
sudo mv ./lib/docs/{Api,Model} ./lib/docs/Auth
sudo mv ./lib/README.md ./lib/README_Auth.md
