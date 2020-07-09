#!/bin/bash
sleep 1
service apache2 start
find /var/lib/mysql -type f -exec touch {} \; && /etc/init.d/mysql start
flagfile=/var/www/html/ctf.sql
if [ -f $flagfile ]; then
	mysqladmin -u root password 123456
	mysql -uroot -p123456 < $flagfile
	rm -f $flagfile
fi 
/bin/bash 