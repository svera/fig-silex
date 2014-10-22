# Microservices-based application in PHP with Fig and Silex

This is a sample implementation of a microservices-style [Silex](http://silex.sensiolabs.org/) application, using [Docker](https://www.docker.com/) for management and 
[Fig](http://www.fig.sh/index.html) for service orchestration.

What it does is just show the number of visits to its root URL,
using [Redis](redis.io) to count them. Thus, the app is composed of two main:
A PHP server which takes code from the host and serves it (using the embedded PHP web server) and a Redis one.

The PHP app container is built from the included Dockerfile, while the Redis container
is taken from the [Docker registry](https://registry.hub.docker.com/).


## Install on Mac OS X

### Prerequisites

* Fig >= 1.0
* PHP >= 5.4
* [Composer](https://getcomposer.org/)
* [Boot2Docker](https://github.com/boot2docker/boot2docker) >= 1.3
(**OR** [Boot2Docker-cli](https://github.com/boot2docker/boot2docker-cli/releases) >= 1.3
if you have [VirtualBox](https://www.virtualbox.org/) already installed)

### Steps

1. Clone sample project into your `Users` folder (note that it won't work
anywhere else due to a current Boot2docker limitation)  
`git clone https://github.com/svera/fig-silex`  
`cd fig-silex`

2. Install project PHP dependencies
`composer install`

3. Build app infrastructure  
`fig up` (or `fig up -d` to run in background)

4. Check out VM exposed IP  
`boot2docker ip` 

5. Go to your web browser and type  
`http://<VM exposed IP>:8000`

6. That's it!