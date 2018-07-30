#!/bin/sh

# 1. Create MariaDB database

echo "MySQL password for user root:"

mysql -u root -p -b < sql/speedtest.sql

# 2. Copy HTML to web-server

cp -r html/* /var/www/html/

#3. Copy speedreport script

cp usr/local/bin/* /usr/local/bin/

#4. Add crontab
grep 'speedreport' /etc/crontab \
|| cat >> /etc/crontab <<EOF
*/10 *  * * *   root    /usr/local/bin/speedreport
EOF

type speedtest-cli >/dev/null || ( \
    git clone https://github.com/sivel/speedtest-cli.git
    cd speedtest-cli
    sudo python ./setup.py install
)
