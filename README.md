# TA Speedtest
Monitoring of the speed of a internet connection

Motivation for this repository was my need to monitor the speed of an internet connection with a Raspberry Pi. It started as a quick and dirty project for a Sutarday evening which extended into the early Sunday morning. 

The reports should be displayed on a 3.5" LCD-Display on top of the Pi and be accessible through a web-page.

The very first version extracted the ping, download and upload values and inserted these values with a timestamp in a SQL database.

In the current version speedtest-cli is used with the parameter ´--csv´ and formats the CSV into a SQL INSERT statement. 

You may add ´--spare´ to generate and provide a URL to the speedtest.net share results image.

To display the last report I wrote a quick and dirty PHP-Page: speedreport.php

# Requirements

## php7.0, php7.0-mysql

Install php7.0, php7.0-mysql

```bash
sudo apt update
sudo apt install php7.0 php7.0-mysql
sudo systemctp restart apache2
``` 

## Install setuptools for python on Debian / Raspberry Pi

For installation of speedtest-cli from GITHUB please install python-setuptools python3-setuptools

```bash
sudo apt update
sudo apt install python-setuptools python3-setuptools
```

## Installing speedtest-cli

This solution is based on speedtest-cli from sivel. You will find it at https://github.com/sivel/speedtest-cli. Thanks to this work.

### How to install speedtest-cli

(At the time of writing:) There is a mistake in the installation procedure from sivel. See: https://github.com/sivel/speedtest-cli/issues/529

Please use the following commands to install speedtest-cli. 

```
git clone https://github.com/sivel/speedtest-cli.git
cd speedtest-cli
sudo python setup.py install
```

For more ways to install speedtest-cli see https://github.com/sivel/speedtest-cli/blob/master/README.rst. Be advised I have not tested them.

The installation script will do this for you.

#Installation

You may use install.sh on your own risk. It currently overrides an existing installation and deletes the database *speedtest*, the data and the three requires users.

The script creates passwords for three database users and updates the files.

You could change the passwords (P@ssW0rd{1,2,3}) in the following files if you install the files manually:

* usr/local/speedreport
* usr/local/pingreport
* sql/speedreport.sql
* html/speeddb.inc


# FAQ

See [FAQ.md](FAQ.md)
