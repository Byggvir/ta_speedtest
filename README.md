# TA Speedtest
Monitoring of the speed of a internet connection

Motivation for this git was my need to monitor the speed of an internet connection with a Raspberry Pi.

The reports should be displayed on a 3.5" LCD-Display on top of the Pi and be accessible through a web-page.

I wrote a small script to extract the ping, download and upload values and insert these values with a timestamp in a SQL database.

To display the last report I wrote a quick and dirty PHP-Page: speedreport.php

This solution ist based on speedtest-cli from sivel. You will find it at https://github.com/sivel/speedtest-cli. Thanks to this work.
