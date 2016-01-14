# symfony-micro
Symfony micro applicatin based on ```\Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait```

[Symfony as a Microframework](http://symfony.com/blog/new-in-symfony-2-8-symfony-as-a-microframework)

[![Latest Stable Version](https://poser.pugx.org/cawakharkov/symfony-micro/v/stable)](https://packagist.org/packages/cawakharkov/symfony-micro) [![Total Downloads](https://poser.pugx.org/cawakharkov/symfony-micro/downloads)](https://packagist.org/packages/cawakharkov/symfony-micro) [![Latest Unstable Version](https://poser.pugx.org/cawakharkov/symfony-micro/v/unstable)](https://packagist.org/packages/cawakharkov/symfony-micro) [![License](https://poser.pugx.org/cawakharkov/symfony-micro/license)](https://packagist.org/packages/cawakharkov/symfony-micro)
[![Scrutinizer](https://img.shields.io/scrutinizer/g/CawaKharkov/symfony-micro.svg)]()
[![Travis](https://api.travis-ci.org/CawaKharkov/symfony-micro.svg)]()

# What's included
 - Symfony v3.0.*
 - Doctrine 2.5
 - Generator-bundle
 - Uikit
 - FontAwesome


# Usage
 * Create project
```bash
composer create-project cawakharkov/symfony-micro:dev-master
```
* Bower
```bash
bower install
```
 * Run with built in server .
```bash
bin/console server:run localhost
```

## Small benchmark
```
-> % siege -b -t30S -c 20 http://prod.micro.local/                     
** SIEGE 3.0.8
** Preparing 20 concurrent users for battle.
The server is now under siege...
Lifting the server siege...      done.

Transactions:                  11252 hits
Availability:                 100.00 %
Elapsed time:                  29.09 secs
Data transferred:               4.79 MB
Response time:                  0.05 secs
Transaction rate:             386.80 trans/sec
Throughput:                     0.16 MB/sec
Concurrency:                   19.96
Successful transactions:       11252
Failed transactions:               0
Longest transaction:            0.12
Shortest transaction:           0.03
```
