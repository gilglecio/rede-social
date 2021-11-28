FROM mattrayner/lamp:latest-1804

RUN apt-get install nano -y

RUN a2enmod rewrite

COPY 000-default.conf /etc/apache2/sites-available/