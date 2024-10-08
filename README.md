# BRICKS
This repo is an __updated__ version of Bricks, that run on PHP 8.  
The __Docker__ image provided runs on __Ubuntu 22.04__.

## TLDR

You can run Bricks in a docker container with:

```bash
sudo docker run -d --name bricks -p 7000:80 0xfalafel/bricks
```


## Introduction

Bricks is a **deliberately vulnerable web application** to learn common vulnerabilites.

It features the following exercices:

* **SQL injection** authentication bypass.
* SQL injection content retrival with `UNION`.
* **File upload** vulnerabilities.


The interest of Bricks over some other training material is that:

1. It look nice
2. The **SQL query executed is reflected** in the webpage. Which make it **easier** to **understand SQL injections**.

## Build

### Docker

You can build the container with the following command:

```bash
sudo docker build -t falafel/bricks .
```

### Vagrant

If you prefer to work with Virtual Machines, you can create one using `vagrant`.

First [install Vagrant](https://developer.hashicorp.com/vagrant/downloads), i.e. `sudo apt install vagrant`

Then run the following command from the folder
```bash
vagrant up
```
