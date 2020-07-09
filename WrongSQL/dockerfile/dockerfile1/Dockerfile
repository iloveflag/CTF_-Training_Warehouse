FROM tutum/lamp
MAINTAINER iloveflag@outlook.com
RUN rm -rf /var/www/html/*
ADD html/ /var/www/html/
ADD db.sql /db.sql
RUN echo "mysql -uroot</db.sql" > /mysql-setup.sh
EXPOSE 80 
CMD ["/run.sh"]