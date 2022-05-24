# ECOM-System

### Requirements
[Docker](https://docs.docker.com/engine/install/ubuntu/)

[docker-compose](https://docs.docker.com/compose/install/)

[Node](https://nodejs.org/en/download/)


### Installation
`git clone https://github.com/Zevcore/ecom-system.git`

The following command will build modules and run the environment on the docker

`bash build_start.bash`

#### xdebug
First, check the ip address of your docker

`ifconfig docker0`


Copy the address of the inet field and paste it into docker-compose.yml

```
environment:
    - XDEBUG_CONFIG=remote_host=inet_docker_address
```

Then configure xdebug in PHPStorm

Go to Settings `CTRL+ALT+S` > Debug

![debug](https://i.imgur.com/iMQ3kwH.png)

Then go to Settings `CTRL+ALT+S` > Server and add new server

![server](https://i.imgur.com/GQrokWy.png)

Additionally, you can add a CLI interpreter using our docker-compose

Go to Settings `CTRL+ALT+S` > PHP > CLI interpreter > `...`

![interpeter](https://i.imgur.com/RQGyEMk.png)