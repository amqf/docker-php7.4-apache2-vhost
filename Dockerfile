# Usar a imagem oficial do PHP com Apache
FROM php:7.4-apache

# Habilitar módulos do Apache e do PHP necessários
RUN a2enmod rewrite

# Instalar extensões do PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Copiar o arquivo de configuração do Virtual Host para o Apache
COPY ./apache/sites-available/vhost.conf /etc/apache2/sites-available/000-default.conf

# Expor a porta 80 para acesso externo
EXPOSE 80

# Copiar o código do projeto para o diretório raiz do Apache
COPY ./src/ /var/www/html/