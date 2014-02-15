FROM octohost/php5

WORKDIR /srv/www

RUN service start redis-server

ADD . /srv/www
ADD ./default /etc/nginx/sites-available/default

RUN mkdir /srv/www/public/logs/ && chmod 777 /srv/www/public/logs/
RUN chmod -R 777 /srv/www/app/storage/

EXPOSE 80

CMD service php5-fpm start && nginx