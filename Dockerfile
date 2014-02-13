FROM octohost/laravel

WORKDIR /srv/www

RUN apt-get install redis-server && service redis-server start

ADD . /srv/www
RUN composer install
RUN /usr/local/sbin/php-fpm -y /srv/conf/php-fpm.conf -c /srv/conf/php.ini

EXPOSE 80

CMD /usr/local/apache/bin/httpd -f /srv/conf/httpd.conf -DNO_DETACH