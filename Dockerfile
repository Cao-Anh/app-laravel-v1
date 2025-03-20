# FROM php:8.2-apache
# WORKDIR /var/www/html

# # Mod Rewrite
# RUN a2enmod rewrite

# # Linux Library
# RUN apt-get update -y && apt-get install -y \
#     libicu-dev \
#     libmariadb-dev \
#     unzip zip \
#     zlib1g-dev \
#     libpng-dev \
#     libjpeg-dev \
#     libfreetype6-dev \
#     libjpeg62-turbo-dev \
#     libpng-dev 

# # Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # PHP Extension
# RUN docker-php-ext-install gettext intl pdo_mysql gd

# RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
#     && docker-php-ext-install -j$(nproc) gd

    FROM php:8.2-apache

    # Set working directory
    WORKDIR /var/www/html
    
    # Enable Apache Mod Rewrite
    RUN a2enmod rewrite
    
    # Install required Linux packages
    RUN apt-get update -y && apt-get install -y \
        libicu-dev \
        libmariadb-dev \
        unzip zip \
        zlib1g-dev \
        libpng-dev \
        libjpeg-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev
    
    # Install Composer
    COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
    
    # Install PHP Extensions
    RUN docker-php-ext-install gettext intl pdo pdo_mysql gd
    RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
        && docker-php-ext-install -j$(nproc) gd
    
    # Set DocumentRoot to Laravel /public directory
    RUN printf '<VirtualHost *:80>\n\
        DocumentRoot /var/www/html/public\n\
        <Directory /var/www/html/public>\n\
            Options Indexes FollowSymLinks\n\
            AllowOverride All\n\
            Require all granted\n\
        </Directory>\n\
    </VirtualHost>\n' > /etc/apache2/sites-available/000-default.conf
    
    # Set permissions for Laravel storage
    # RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    #     && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache
    
    # Restart Apache (Optional)
    RUN service apache2 restart
    