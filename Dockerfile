FROM octohost/php5

WORKDIR /srv/www

RUN apt-get update && apt-get install -y redis-server && service start redis-server

ADD . /srv/www
ADD ./default /etc/nginx/sites-available/default

RUN  mkdir /srv/www/public/logs/ && chmod 777 /srv/www/public/logs/

EXPOSE 80

CMD service php5-fpm start && nginx