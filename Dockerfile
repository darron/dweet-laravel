FROM octohost/php5

ADD default /etc/nginx/sites-available/default
ADD . /srv/www

EXPOSE 80

CMD service php5-fpm start && nginx