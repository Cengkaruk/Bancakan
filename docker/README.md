# LaraDock

[![forthebadge](http://forthebadge.com/images/badges/built-by-developers.svg)](http://zalt.me)

[![Gitter](https://badges.gitter.im/LaraDock/laradock.svg)](https://gitter.im/LaraDock/laradock?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge)

LaraDock helps you run your **Laravel** App on **Docker** real quick.
<br>
It's like Laravel Homestead but for Docker instead of Vagrant.

>With LaraDock, use Docker first and learn about it later.


![](https://s31.postimg.org/nbettdki3/lara_dock_poster_new.jpg)

<br>
## Contents


- [Intro](#Intro)
	- [Features](#features)
	- [Supported Software's](#Supported-Containers)
	- [What is Docker](#what-is-docker)
	- [What is Laravel](#what-is-laravel)
	- [Why Docker not Vagrant](#why-docker-not-vagrant)
	- [LaraDock VS Homestead](#laradock-vs-homestead)
- [Demo Video](#Demo)
- [Requirements](#Requirements)
- [Installation](#Installation)
- [Usage](#Usage)
- [Documentation](#Documentation)
	- [Docker](#Docker)
		- [List current running Containers](#List-current-running-Containers)
		- [Close all running Containers](#Close-all-running-Containers)
		- [Delete all existing Containers](#Delete-all-existing-Containers)
		- [Enter a Container (SSH into a running Container)](#Enter-Container)
		- [Edit default container configuration](#Edit-Container)
		- [Edit a Docker Image](#Edit-a-Docker-Image)
		- [Build/Re-build Containers](#Build-Re-build-Containers)
		- [Add more Software's (Docker Images)](#Add-Docker-Images)
		- [View the Log files](#View-the-Log-files)
	- [Laravel](#Laravel):
		- [Install Laravel from a Docker Container](#Install-Laravel)
		- [Run Artisan Commands](#Run-Artisan-Commands)
		- [Use Redis](#Use-Redis)
		- [Use Mongo](#Use-Mongo)
	- [PHP](#PHP)
		- [Install PHP Extensions](#Install-PHP-Extensions)
		- [Change the PHP-FPM Version](#Change-the-PHP-FPM-Version)
		- [Change the PHP-CLI Version](#Change-the-PHP-CLI-Version)
		- [Install xDebug](#Install-xDebug)
		    - [Start/Stop xDebug](#Controll-xDebug)
	- [Production](#Production)
		- [Setup Laravel and Docker on Digital Ocean](#Digital-Ocean)
	- [Misc](#Misc)
		- [Use custom Domain](#Use-custom-Domain)
		- [Enable Global Composer Build Install](#Enable-Global-Composer-Build-Install)
		- [Install Prestissimo](#Install-Prestissimo)
		- [Install Node + NVM](#Install-Node)
		- [Debugging](#debugging)
		- [Upgrading LaraDock](#upgrading-laradock)
- [Help & Questions](#Help)



<a name="Intro"></a>
## Intro

LaraDock strives to make the development experience easier.
It contains pre-packaged Docker Images that provides you a wonderful development environment without requiring you to install PHP, NGINX, MySQL, REDIS, and any other software on your local machine.


**Usage Overview:** 

Let's see how easy it is to install `NGINX`, `PHP`, `Composer`, `MySQL` and `Redis`. Then run `Laravel`.

1. Get LaraDock inside your Laravel project: 
<br>
`git clone https://github.com/LaraDock/laradock.git`.
2. Enter the laradock folder and run only these Containers: 
<br>
`docker-compose up -d nginx mysql redis`
3. Open your `.env` file and set `DB_HOST` to `mysql` and `REDIS_HOST` to `redis`.
4. Open your browser and visit the localhost: `http://localdock`



<a name="features"></a>
### Features

- Easy switch between PHP versions: 7.0, 5.6, 5.5...
- Choose your favorite database engine: MySQL, Postgres, MariaDB...
- Run your own combination of software's: Memcached, HHVM, Beanstalkd...
- Every software runs on a separate container: PHP-FPM, NGINX, PHP-CLI...
- Easy to customize any container, with simple edit to the `dockerfile`.
- All Images extends from an official base Image. (Trusted base Images).
- Pre-configured Nginx for Laravel.
- Easy to apply configurations inside containers.
- Clean and well structured Dockerfiles (`dockerfile`).
- Latest version of the Docker Compose file (`docker-compose`).
- Everything is visible and editable.
- Fast Images Builds.
- More to come every week..


<a name="Supported-Containers"></a>
### Supported Software's (Containers)

- **Database Engines:**
	- MySQL
	- PostgreSQL
	- MariaDB
	- MongoDB
	- Neo4j
- **Cache Engines:**
	- Redis
	- Memcached
- **PHP Servers:**
	- NGINX
	- Apache2
	- Caddy
- **PHP Compilers:**
	- PHP-FPM
	- HHVM
- **Message Queueing Systems:**
	- Beanstalkd (+ Beanstalkd Console)
- **Tools:**
	- Workspace (PHP7-CLI, Composer, Git, Node, Gulp, SQLite, Vim, Nano, cURL...)


>If you can't find your Software, build it yourself and add it to this list. Contributions are welcomed :)





<a name="what-is-docker"></a>
### What is Docker?

[Docker](https://www.docker.com) is an open-source project that automates the deployment of applications inside software containers, by providing an additional layer of abstraction and automation of [operating-system-level virtualization](https://en.wikipedia.org/wiki/Operating-system-level_virtualization) on Linux, Mac OS and Windows.

<a name="what-is-laravel"></a>
### What is Laravel?

Seriously!!!


<a name="why-docker-not-vagrant"></a>
### Why Docker not Vagrant!?

[Vagrant](https://www.vagrantup.com) creates Virtual Machines in minutes while Docker creates Virtual Containers in seconds.

Instead of providing a full Virtual Machines, like you get with Vagrant, Docker provides you **lightweight** Virtual Containers, that share the same kernel and allow to safely execute independent processes.

In addition to the speed, Docker gives tons of features that cannot be achieved with Vagrant.

Most importantly Docker can run on Development and on Production (same environment everywhere). While Vagrant is designed for Development only, (so you have to re-provision your server on Production every time).


<a name="laradock-vs-homestead"></a>
### LaraDock VS Homestead

LaraDock and [Homestead](https://laravel.com/docs/master/homestead) both gives you a complete virtual development environments. (Without the need to install and configure every single software on your own Operating System).

- Homestead is a tool that controls Vagrant for you (using Homestead special commands). And Vagrant manages your Virtual Machine.

- LaraDock is a tool that controls Docker for you (using Docker & Docker Compose official commands). And Docker manages your Virtual Containers.

Running a virtual Container is much faster than running a full virtual Machine. Thus **LaraDock is much faster than Homestead**.





<a name="Demo"></a>
## Demo Video

What's better than a **Demo Video**:

- LaraDock v4.0 (Coming soon..)
- LaraDock [v2.2](https://www.youtube.com/watch?v=-DamFMczwDA)
- LaraDock [v0.3](https://www.youtube.com/watch?v=jGkyO6Is_aI)
- LaraDock [v0.1](https://www.youtube.com/watch?v=3YQsHe6oF80)



<a name="Requirements"></a>
## Requirements

- [Git](https://git-scm.com/downloads)                                           
- [Docker](https://www.docker.com/products/docker/)



<a name="Installation"></a>
## Installation


1 - Clone the `LaraDock` repository:

**A)** If you already have a Laravel project, clone this repository on your `Laravel` root directory:

```bash
git submodule add https://github.com/LaraDock/laradock.git
```
>If you are not already using Git for your Laravel project, you can use `git clone` instead of `git submodule`.

**B)** If you don't have a Laravel project, and you want to install Laravel from Docker, clone this repo anywhere on your machine:

```bash
git clone https://github.com/LaraDock/laradock.git
```



<a name="Usage"></a>
## Usage


**Read Before starting:**

If you are using **Docker Toolbox** (VM), do one of the following:

- Upgrade to Docker [Native](https://www.docker.com/products/docker) for Mac/Windows (Recommended). Check out [Upgrading Laradock](#upgrading-laradock)
- Use LaraDock v3.* (Visit the `LaraDock-ToolBox` [Branch](https://github.com/LaraDock/laradock/tree/LaraDock-ToolBox)).


If you are using **Docker Native** (For Mac/Windows) or even for Linux, continue this documentation normally since LaraDock v4 and above is just for that.



<br>
<br>
1 - Run Containers: *(Make sure you are in the `laradock` folder before running the `docker-compose` commands).*



**Example:** Running NGINX and MySQL:

```bash
docker-compose up -d  nginx mysql
```

You can select your own combination of Containers form the list below:

`nginx`, `hhvm`, `php-fpm`, `mysql`, `redis`, `postgres`, `mariadb`, `neo4j`, `mongo`, `apache2`, `caddy`, `memcached`, `beanstalkd`, `beanstalkd-console`, `workspace`.


**Note**: `workspace` and `php-fpm` will run automatically in most of the cases, so no need to specify them in the `up` command.



<br>
2 - Enter the Workspace container, to execute commands like (Artisan, Composer, PHPUnit, Gulp, ...).

```bash
docker-compose exec workspace bash
```
<br />
Add `--user=laradock` (example `docker-compose exec --user=laradock workspace bash`) to have files created as your host's user. (you can change the PUID (User id) and PGID (group id) variables from the `docker-compose.yml`).



<br>
3 - Edit the Laravel configurations.

If you don't have a Laravel project installed yet, see [How to Install Laravel in a Docker Container](#Install-Laravel).

Open your Laravel's `.env` file and set the `DB_HOST` to your `mysql`:

```env
DB_HOST=mysql
```





<br>
4 - Open your browser and visit your localhost address (`http://localhost/`).



<br>
**Debugging**: if you are facing any problem here check the [Debugging](#debugging) section.

If you need a special support. Contact me, more details in the [Help & Questions](#Help) section.


<br>
<a name="Documentation"></a>
## Documentation


<a name="Docker"></a>




<a name="List-current-running-Containers"></a>
### List current running Containers
```bash
docker ps
```
You can also use the this command if you want to see only this project containers:

```bash
docker-compose ps
```





<br>
<a name="Close-all-running-Containers"></a>
### Close all running Containers
```bash
docker-compose stop
```

To stop single container do:

```bash
docker-compose stop {container-name}
```






<br>
<a name="Delete-all-existing-Containers"></a>
### Delete all existing Containers
```bash
docker-compose down
```

*Note: Careful with this command as it will delete your Data Volume Container as well. (if you want to keep your Database data than you should stop each container by itself as follow):*







<br>
<a name="Enter-Container"></a>
### Enter a Container (SSH into a running Container)

1 - first list the current running containers with `docker ps`

2 - enter any container using:

```bash
docker-compose exec {container-name} bash
```

*Example: enter MySQL container*

```bash
docker-compose exec mysql bash
```

3 - to exit a container, type `exit`.







<br>
<a name="Edit-Container"></a>
### Edit default container configuration
Open the `docker-compose.yml` and change anything you want.

Examples:

Change MySQL Database Name:

```yml
  environment:
    MYSQL_DATABASE: laradock
```

Change Redis defaut port to 1111:

```yml
  ports:
    - "1111:6379"
```








<br>
<a name="Edit-a-Docker-Image"></a>
### Edit a Docker Image

1 - Find the `dockerfile` of the image you want to edit,
<br>
example for `mysql` it will be `mysql/Dockerfile`.

2 - Edit the file the way you want.

3 - Re-build the container:

```bash
docker-compose build mysql
```
More info on Containers rebuilding [here](#Build-Re-build-Containers).








<br>
<a name="Build-Re-build-Containers"></a>
### Build/Re-build Containers

If you do any change to any `dockerfile` make sure you run this command, for the changes to take effect:

```bash
docker-compose build
```
Optionally you can specify which container to rebuild (instead of rebuilding all the containers):

```bash
docker-compose build {container-name}
```

You might use the `--no-cache` option if you want full rebuilding (`docker-compose build --no-cache {container-name}`).





<br>
<a name="Add-Docker-Images"></a>
### Add more Software's (Docker Images)

To add an image (software), just edit the `docker-compose.yml` and add your container details, to do so you need to be familiar with the [docker compose file syntax](https://docs.docker.com/compose/compose-file/).









<br>
<a name="View-the-Log-files"></a>
### View the Log files
The Nginx Log file is stored in the `logs/nginx` directory.

However to view the logs of all the other containers (MySQL, PHP-FPM,...) you can run this:

```bash
docker logs {container-name}
```





<br>
<a name="Laravel"></a>




<a name="Install-Laravel"></a>
### Install Laravel from a Docker Container

1 - First you need to enter the Workspace Container.

2 - Install Laravel.

Example using Composer

```bash
composer create-project laravel/laravel my-cool-app "5.2.*"
```

> We recommand using `composer create-project` instead of the Laravel installer, to install Laravel.

For more about the Laravel installation click [here](https://laravel.com/docs/master#installing-laravel).


3 - Edit `docker-compose.yml` to Map the new application path:

By default LaraDock assumes the Laravel application is living in the parent directory of the laradock folder.

Since the new Laravel application is in the `my-cool-app` folder, we need to replace `../:/var/www/laravel` with `../my-cool-app/:/var/www/laravel`, as follow:

```yaml
    application:
        build: ./application
        volumes:
            - ../my-cool-app/:/var/www/laravel
```
4 - Go to that folder and start working..

```bash
cd my-cool-app
```

5 - Go back to the laraDock installation steps to see how to edit the `.env` file.



<br>
<a name="Run-Artisan-Commands"></a>
### Run Artisan Commands

You can run artisan commands and many other Terminal commands from the Workspace container.

1 - Make sure you have the workspace container running.

```bash
docker-compose up -d workspace // ..and all your other containers
```

2 - Find the Workspace container name:

```bash
docker-compose ps
```

3 - Enter the Workspace container:

```bash
docker-compose exec workspace bash
```

Add `--user=laradock` (example `docker-compose exec --user=laradock workspace bash`) to have files created as your host's user.


4 - Run anything you want :)

```bash
php artisan
```
```bash
Composer update
```
```bash
phpunit
```

<br>
<a name="Use-Redis"></a>
### Use Redis

1 - First make sure you run the Redis Container (`redis`) with the `docker-compose up` command.

```bash
docker-compose up -d redis
```

2 - Open your Laravel's `.env` file and set the `REDIS_HOST` to `redis`

```env
REDIS_HOST=redis
```

If you don't find the `REDIS_HOST` variable in your `.env` file. Go to the database config file `config/database.php` and replace the default `127.0.0.1` IP with `redis` for Redis like this:

```php
'redis' => [
    'cluster' => false,
    'default' => [
        'host'     => 'redis',
        'port'     => 6379,
        'database' => 0,
    ],
],
```

3 - To enable Redis Caching and/or for Sessions Management. Also from the `.env` file set `CACHE_DRIVER` and `SESSION_DRIVER` to `redis` instead of the default `file`.

```env
CACHE_DRIVER=redis
SESSION_DRIVER=redis
```

4 - Finally make sure you have the `predis/predis` package `(~1.0)` installed via Composer:

```bash
composer require predis/predis:^1.0
```

5 - You can manually test it from Laravel with this code:

```php
\Cache::store('redis')->put('LaraDock', 'Awesome', 10);
```





<br>
<a name="Use-Mongo"></a>
### Use Mongo

1 - First install `mongo` in the Workspace and the PHP-FPM Containers:
<br>
a) open the `docker-compose.yml` file
<br>
b) search for the `INSTALL_MONGO` argument under the Workspace Container
<br>
c) set it to `true`
<br>
d) search for the `INSTALL_MONGO` argument under the PHP-FPM Container
<br>
e) set it to `true`

It should be like this:

```yml
    workspace:
        build:
            context: ./workspace
            args:
                - INSTALL_MONGO=true
    ...
    php-fpm:
        build:
            context: ./php-fpm
            args:
                - INSTALL_MONGO=true
    ...
```

2 - Re-build the containers `docker-compose build workspace php-fpm`



3 - Run the MongoDB Container (`mongo`) with the `docker-compose up` command.

```bash
docker-compose up -d mongo
```


4 - Add the MongoDB configurations to the `config/database.php` config file:

```php
'connections' => [

    'mongodb' => [
        'driver'   => 'mongodb',
        'host'     => env('DB_HOST', 'localhost'),
        'port'     => env('DB_PORT', 27017),
        'database' => env('DB_DATABASE', 'database'),
        'username' => '',
        'password' => '',
        'options'  => [
            'database' => '',
        ]
    ],

	// ...

],
```

5 - Open your Laravel's `.env` file and update the following variables:

- set the `DB_HOST` to your `mongo`.
- set the `DB_PORT` to `27017`.
- set the `DB_DATABASE` to `database`.


6 - Finally make sure you have the `jenssegers/mongodb` package installed via Composer and its Service Provider is added.

```bash
composer require jenssegers/mongodb
```
More details about this [here](https://github.com/jenssegers/laravel-mongodb#installation).

7 - Test it:

- First let your Models extend from the Mongo Eloquent Model. Check the [documentation](https://github.com/jenssegers/laravel-mongodb#eloquent).
- Enter the Workspace Container.
- Migrate the Database `php artisan migrate`.






<br>
<a name="PHP"></a>






<a name="Install-PHP-Extensions"></a>
### Install PHP Extensions

Before installing PHP extensions, you have to decide whether you need for the `FPM` or `CLI` because each lives on a different container, if you need it for both you have to edit both containers.

The PHP-FPM extensions should be installed in `php-fpm/Dockerfile-XX`. *(replace XX with your default PHP version number)*.
<br>
The PHP-CLI extensions should be installed in `workspace/Dockerfile`.









<br>
<a name="Change-the-PHP-FPM-Version"></a>
### Change the (PHP-FPM) Version
By default **PHP-FPM 7.0** is running.

>The PHP-FPM is responsible of serving your application code, you don't have to change the PHP-CLI version if you are planing to run your application on different PHP-FPM version.

#### A) Switch from PHP `7.0` to PHP `5.6`

1 - Open the `docker-compose.yml`.

2 - Search for `Dockerfile-70` in the PHP container section.

3 - Change the version number, by replacing `Dockerfile-70` with `Dockerfile-56`, like this:

```txt
php-fpm:
    build:
        context: ./php-fpm
        dockerfile: Dockerfile-70
```

4 - Finally rebuild the container

```bash
docker-compose build php
```

> For more details about the PHP base image, visit the [official PHP docker images](https://hub.docker.com/_/php/).


#### B) Switch from PHP `7.0` or `5.6` to PHP `5.5`

We do not natively support PHP 5.5 anymore, but you can get it in few steps:

1 - Clone `https://github.com/LaraDock/php-fpm`.

3 - Rename `Dockerfile-56` to `Dockerfile-55`.

3 - Edit the file `FROM php:5.6-fpm` to `FROM php:5.5-fpm`.

4 - Build an image from `Dockerfile-55`.

5 - Open the `docker-compose.yml` file.

6 - Point `php-fpm` to your `Dockerfile-55` file.












<br>
<a name="Change-the-PHP-CLI-Version"></a>
### Change the PHP-CLI Version
By default **PHP-CLI 7.0** is running.

>Note: it's not very essential to edit the PHP-CLI verion. The PHP-CLI is only used for the Artisan Commands & Composer. It doesn't serve your Application code, this is the PHP-FPM job.

The PHP-CLI is installed in the Workspace container. To change the PHP-CLI version you need to edit the `workspace/Dockerfile`.

Right now you have to manually edit the `Dockerfile` or create a new one like it's done for the PHP-FPM. (consider contributing).




<br>
<a name="Install-xDebug"></a>
### Install xDebug

1 - First install `xDebug` in the Workspace and the PHP-FPM Containers:
<br>
a) open the `docker-compose.yml` file
<br>
b) search for the `INSTALL_XDEBUG` argument under the Workspace Container
<br>
c) set it to `true`
<br>
d) search for the `INSTALL_XDEBUG` argument under the PHP-FPM Container
<br>
e) set it to `true`

It should be like this:

```yml
    workspace:
        build:
            context: ./workspace
            args:
                - INSTALL_XDEBUG=true
    ...
    php-fpm:
        build:
            context: ./php-fpm
            args:
                - INSTALL_XDEBUG=true
    ...
```

2 - Re-build the containers `docker-compose build workspace php-fpm`


For information on how to configure xDebug with your IDE and work it out, check this [Repository](https://github.com/LarryEitel/laravel-laradock-phpstorm).


<br>
<a name="Controll-xDebug"></a>
### Start/Stop xDebug:

By installing xDebug, you are enabling it to run on startup by default.

To controll the behavior of xDebug (in the `php-fpm` Container), you can run the following commands from the LaraDock root folder:

- Stop xDebug from running by default: `./xdebugPhpFpm stop`.
- Start xDebug by default: `./xdebugPhpFpm start`.
- See the status: `./xdebugPhpFpm status`.





<br>
<a name="Production"></a>




<br>
<a name="Digital-Ocean"></a>
### Setup Laravel and Docker on Digital Ocean

####[Full Giude Here](https://github.com/LaraDock/laradock/blob/master/_guides/digital_ocean.md)










<br>
<a name="Misc"></a>





<br>
<a name="Use-custom-Domain"></a>
### Use custom Domain (instead of the Docker IP)

Assuming your custom domain is `laravel.dev`

1 - Open your `/etc/hosts` file and map your localhost address `127.0.0.1` to the `laravel.dev` domain, by adding the following:

```bash
127.0.0.1    laravel.dev
```

2 - Open your browser and visit `{http://laravel.dev}`


Optionally you can define the server name in the nginx config file, like this:

```conf
server_name laravel.dev;
```



<br>
<a name="Enable-Global-Composer-Build-Install"></a>
### Enable Global Composer Build Install

Enabling Global Composer Install during the build for the container allows you to get your composer requirements installed and available in the container after the build is done.

1 - open the `docker-compose.yml` file

2 - search for the `COMPOSER_GLOBAL_INSTALL` argument under the Workspace Container and set it to `true`

It should be like this:

```yml
    workspace:
        build:
            context: ./workspace
            args:
                - COMPOSER_GLOBAL_INSTALL=true
    ...
```
3 - now add your dependencies to `workspace/composer.json`

4 - rebuild the Workspace Container `docker-compose build workspace`




<br>
<a name="Install-Prestissimo"></a>
### Install Prestissimo

[Prestissimo](https://github.com/hirak/prestissimo) is a plugin for composer which enables parallel install functionality.

1 - Enable Running Global Composer Install during the Build:

Click on this [Enable Global Composer Build Install](#Enable-Global-Composer-Build-Install) and do steps 1 and 2 only then continue here.

2 - Add prestissimo as requirement in Composer:

a - now open the `workspace/composer.json` file

b - add `"hirak/prestissimo": "^0.3"` as requirement

c - rebuild the Workspace Container `docker-compose build workspace`




<br>
<a name="Install-Node"></a>
### Install Node + NVM

To install NVM and NodeJS in the Workspace container

1 - Open the `docker-compose.yml` file

2 - Search for the `INSTALL_NODE` argument under the Workspace Container and set it to `true`

It should be like this:

```yml
    workspace:
        build:
            context: ./workspace
            args:
                - INSTALL_NODE=true
    ...
```

3 - Re-build the container `docker-compose build workspace`



<br>
<a name="debugging"></a>
### Debugging

*Here's a list of the common problems you might face, and the possible solutions.*

#### I see a blank (white) page instead of the Laravel 'Welcome' page!

Run the following command from the Laravel root directory:

```bash
sudo chmod -R 777 storage bootstrap/cache
```

#### I see "Welcome to nginx" instead of the Laravel App!

Use `http://127.0.0.1` instead of `http://localhost` in your browser.

#### I see an error message containing `address already in use`

Make sure the ports for the services that you are trying to run (80, 3306, etc.) are not being used already by other programs, such as a built in `apache`/`httpd` service or other development tools you have installed.






<br>
<a name="upgrading-laradock"></a>
### Upgrading LaraDock


Moving from Docker Toolbox (VirtualBox) to Docker Native (for Mac/Windows). Requires upgrading LaraDock from v3.* to v4.*:

1. Stop the docker vm `docker-machine stop {default}`
2. Install Docker for [Mac](https://docs.docker.com/docker-for-mac/) or [Windows](https://docs.docker.com/docker-for-windows/).
3. Upgrade LaraDock to `v4.*.*` (`git pull origin master`)
4. Use LaraDock as you used to do: `docker-compose up -d nginx mysql`.

**Note:** If you face any problem with the last step above: rebuild all your containers 
`docker-compose build --no-cache`
"Warnning Containers Data might be lost!"







<br>
## Contributing

This little project was built by one man who has a full time job and many responsibilities, so if you like this project and you find that it needs a bug fix or support for new software or upgrade any container, or anything else.. Do not hesitate to contribute, you are more than welcome :)

#### Read our [Contribution Guidelines](https://github.com/LaraDock/laradock/blob/master/_guides/contributing.md)

<a name="Help"></a>
## Help & Questions

Join the chat room on [Gitter](https://gitter.im/LaraDock/laradock) and get help and support from the community.

You can as well can open an [issue](https://github.com/laradock/laradock/issues) on Github (will be labeled as Question) and discuss it with people on [Gitter](https://gitter.im/LaraDock/laradock).

For special help with Docker and/or Laravel, you can schedule a live call with the creator of this project at [Codementor.io](https://www.codementor.io/mahmoudz).

## Credits

**Creator:**

- [Mahmoud Zalt](https://github.com/Mahmoudz)  (Twitter [@Mahmoud_Zalt](https://twitter.com/Mahmoud_Zalt))

**Main Contributors:**

- [MidasCodeBreaker](https://github.com/midascodebreaker)
- [Larry Eitel (LarryEitel)](https://github.com/LarryEitel)
- [Suteepat (tianissimo)](https://github.com/tianissimo)
- [David (davidavz)](https://github.com/davidavz)
- [Lialosiu](https://github.com/lialosiu)
- [Eric Pfeiffer (computerfr33k)](https://github.com/computerfr33k)
- [Orette](https://github.com/orette)
- [Jack Fletcher (Kauhat)](https://github.com/Kauhat)
- [Bo-Yi Wu (appleboy)](https://github.com/appleboy)
- [Amin Mkh (AminMkh)](https://github.com/AminMkh)
- [Matthew Tonkin Dunn (mattythebatty)](https://github.com/mattythebatty)
- [Zhivitsa Kirill (zhikiri)](https://github.com/zhikiri)
- [Benmag](https://github.com/benmag)

**Awesome People:**

- [Contributors](https://github.com/LaraDock/laradock/graphs/contributors)
- [Supporters](https://github.com/LaraDock/laradock/issues?utf8=%E2%9C%93&q=)


## License

[MIT License](https://github.com/laradock/laradock/blob/master/LICENSE) (MIT)
