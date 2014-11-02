# Microservices-based application in PHP with Fig and Silex

This is a sample implementation of a microservices-style [Silex](http://silex.sensiolabs.org/) application, using [Docker](https://www.docker.com/) for management and 
[Fig](http://www.fig.sh/index.html) for service orchestration.

What it does is just show the number of visits to its root URL,
using [Redis](redis.io) to count them. Thus, the app is composed of two main services:
A PHP server which takes code from the host and serves it (using the embedded PHP web server) and a Redis one.

The PHP app container is built from the included `Dockerfile`, while the Redis container
is taken from the [Docker registry](https://registry.hub.docker.com/).

## Requirements

* Fig >= 1.0
* PHP >= 5.4
* [Composer](https://getcomposer.org/)
* Docker (Linux) or 
[Boot2Docker](https://github.com/boot2docker/boot2docker) (Mac OS) >= 1.3

## Install

1. Clone sample project into your `Users` folder (note that it won't work
anywhere else due to a current Boot2docker limitation)  
    ```
    git clone https://github.com/svera/fig-silex
    
    cd fig-silex
    ```
2. Install project PHP dependencies  
`composer install`

3. Build app infrastructure  
`fig up` (or `fig up -d` to run in background)  

4. Check out VM exposed IP (Boot2docker only)
`boot2docker ip` 

5. Go to your web browser and type  
`http://<VM exposed IP>:8000` (Mac OS) or  
`http://localhost:8000` (Linux)

## Troubleshooting

* If you already have VirtualBox installed, it is better to install [Boot2Docker-cli](https://github.com/boot2docker/boot2docker-cli/releases) >= 1.3 and use it to download *boot2docker.iso* with `boot2docker download`
* If the `fig up` step fails with a `Couldn't connect to Docker daemon at http+unix://var/run/docker.sock - is it running?` message,
do the following (Linux only) 
    * Change the DOCKER_OPTS in /etc/default/docker to:  
`DOCKER_OPTS="-H tcp://127.0.0.1:4243 -H unix:///var/run/docker.sock"`  

    * Restart docker  
    `sudo restart docker`

    * Make sure that docker is running on localhost:4243  
        ```
        $ netstat -ant  |grep 4243
        tcp        0      0 127.0.0.1:4243          0.0.0.0:*               LISTEN
        ```

    * Set `DOCKER_HOST` (`.bashrc`)  
    `export DOCKER_HOST=tcp://localhost:4243`
