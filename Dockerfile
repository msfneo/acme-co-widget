FROM php:8.1-cli

# Set the working directory
WORKDIR /app

# Copy only composer files first (to leverage Docker cache)
COPY composer.json composer.lock* ./

# Install system dependencies and Composer
RUN apt-get update \
    && apt-get install -y unzip git curl \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the rest of the application
COPY . .

# Default command
CMD ["php", "bin/basket.php"]
