#! /bin/bash

while true; do
    # shellcheck disable=SC2162
    read -p "Do you want to install node packages? [yes/no]" yn
    case $yn in
        [Yy]* ) cd api && npm install; cd ../docker && docker-compose up -d --force-recreate break;;
        [Nn]* ) cd ./docker && docker-compose up -d --force-recreate; exit;;
        * ) echo "Please answer yes or no.";;
    esac
done