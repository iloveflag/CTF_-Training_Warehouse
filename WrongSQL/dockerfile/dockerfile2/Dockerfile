
FROM ubuntu:14.04

MAINTAINER iloveflag@outlook.com

ENV REFRESHED_AT 2020-7-10

ENV LANG C.UTF-8

RUN sudo sed -i 's/archive.ubuntu.com/mirrors.ustc.edu.cn/g' /etc/apt/sources.list
RUN apt-get update -y



# 安装mysql
RUN apt-get -y install mysql-server
# 安装apache2
RUN apt-get -yqq install apache2
# 安装php5
RUN apt-get -yqq install php5 libapache2-mod-php5
# 安装php扩展
RUN apt-get install -yqq php5-mysql php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl

RUN rm -rf /var/www/html
ADD html.tar.gz /var/www
RUN rm -rf /var/www/html.tar.gz
COPY flag.txt /root/flag.txt

# start.sh为开机启动脚本，里面包含容器开启后要启动的命令
COPY start.sh /root/start.sh
# 加上执行权限
RUN chmod +x /root/start.sh 
# 使用ENTRYPOINT而不使用CMD（CMD容易受run命令最后的命令给影响）
ENTRYPOINT cd /root; ./start.sh
# WEB开放端口默认为80，一般为一个，若有特殊情况，请写明
EXPOSE 80