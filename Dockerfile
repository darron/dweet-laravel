FROM octohost/php

WORKDIR /srv/www

ADD . /srv/www
ADD ./default /etc/nginx/sites-available/default

RUN  mkdir /srv/www/public/logs/ && chmod 777 /srv/www/public/logs/

EXPOSE 80

CMD service php5-fpm start && nginx