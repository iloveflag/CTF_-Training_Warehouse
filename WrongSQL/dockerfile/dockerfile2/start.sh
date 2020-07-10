#!/bin/bash

sleep 1

# 启动服务，例如apache2
# 具体的启动命令，视系统环境而定
# 一般的apache2
/etc/init.d/apache2 start

# 为了适应各种docker版本，mysql的启动命令建议如下（mysqld除外）
find /var/lib/mysql -type f -exec touch {} \; && service mysql start


flagfile=/var/www/html/ctf.sql
if [ -f $flagfile ]; then
#   这里就是替换flag值为/root/flag.txt里的值（/root/flag.txt为动态flag自动下发的位置）
#   这里的flag{x*}对应了flag{xxxxxx}，因为sed不支持扩展正则语法
#   如果原来文件里的flag值并不是flag{xxxxxx}，那么下面这一句请自己改写
    sed -i "s/flag{.*}/$(cat /root/flag.txt)/" $flagfile
#   修改mysql的root密码（如果有使用mysql且必须修改的话）
    mysqladmin -u root password "123456"
#   mysql导入sql文件（newwpasswd只是示例密码）
    mysql -uroot -p123456 < $flagfile
#   删除sql文件(一般是要删除的) / 如果不是sql文件这里不需要删除
    rm -f $flagfile
fi
/bin/bash