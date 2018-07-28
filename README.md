# TA Speedtest
Monitoring of the speed of a internet connection

Motivation for this git was my need to monitor the speed of an internet connection with a Raspberry Pi.

The reports should be displayed on a 3.5" LCD-Display on top of the Pi and be accessible through a web-page.

I wrote a small script to extract the ping, download and upload values and insert these values with a timestamp in a SQL database.

To display the last report I wrote a quick and dirty PHP-Page: speedreport.php

# Requirements

## php7.0, php7.0-mysql

Install php7.0, php7.0-mysql

```bash
sudo apt update
sudo apt install php7.0 php7.0-mysql
sudo systemctp restart apache2
``` 

## Speedtest-cli

This solution is based on speedtest-cli from sivel. You will find it at https://github.com/sivel/speedtest-cli. Thanks to this work.

How to install speedtest-cli

```bash
git clone https://github.com/sivel/speedtest-cli.git
sudo python speedtest-cli/setup.py install
```

For more ways to install speedtest-cli see https://github.com/sivel/speedtest-cli/blob/master/README.rst
