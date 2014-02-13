FROM octohost/laravel

WORKDIR /srv/www

RUN service redis-server start
# RUN service memcached start

RUN mkdir /srv/logs

ADD httpd.conf /srv/conf/httpd.conf

ADD . /srv/www

RUN  mkdir /srv/www/public/logs/ && chmod 777 /srv/www/public/logs/

# RUN composer install
# RUN /usr/local/sbin/php-fpm -y /srv/conf/php-fpm.conf -c /srv/conf/php.ini

EXPOSE 80

CMD /usr/local/apache/bin/httpd -f /srv/conf/httpd.conf -DNO_DETACH