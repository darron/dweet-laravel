FROM octohost/php5

ADD default /etc/nginx/sites-available/default
ADD . /srv/www
RUN composer install

EXPOSE 8000

CMD php artisan serve