#!/bin/bash
#
# Thomas Arend
# 
# (cc) 2018 GNU GPLv3
#
# Installation script foor ta_speedtest 


# 1. Copy HTML to web-server and script to /usr/local/bin/

cp -r html/* /var/www/html/
cp usr/local/bin/* /usr/local/bin/


# 2. Generate new passwords

NEWPWD=$(mktemp)

# We need three different passwords

if type -p pwgen >/dev/null
then
    # if pwgen is installed, we will use it
    for i in 1 2 3 ; do echo -e "s/P@ssW0rd${i}/$(pwgen -s 32 1)/" ; done >$NEWPWD 
else
    # As an alternate we use dd and base64
    for i in 1 2 3 ; do echo -e "s/P@ssW0rd${i}/$(dd if=/dev/urandom bs=32 count=1 | base64| sed 's#/=##g')/" ; done >$NEWPWD 
fi

# 3. Update all files with passwords

sed -f $NEWPWD html/speeddb.php.orig > /var/www/html/speeddb.php
sed -f $NEWPWD sql/speedtest.sql.orig > /tmp/speedtest.sql

for F in usr/local/bin/*.orig
do
    # Update all scripts with the passwords
    TARGET="/$(dirname "$F")/$(basename "$F" .orig)"
    sed  -f $NEWPWD "$F"  > "$TARGET"
    chmod +x "$TARGET"
done

# 4. Create MariaDB database

echo "You must provide the MySQL password for user root to install the database:\n"

mysql -u root -p -b < /tmp/speedtest.sql

# 5. Add crontab entries, uncomment to activate

grep 'speedreport' /etc/crontab \
|| cat >> /etc/crontab <<EOF
#5 *  * * *   root    /usr/local/bin/speedreport
#*/10 *  * * *   root    /usr/local/bin/pingreport
EOF

# 6. Installl speedtest-cli if it is not available on the system

if type -p speedtest-cli > /dev/null
then
    echo speedtest-cli bereits vorhanden!
else
    cd /tmp
    git clone https://github.com/sivel/speedtest-cli.git
    cd speedtest-cli
    python ./setup.py install
fi
