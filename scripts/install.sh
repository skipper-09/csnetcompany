#!/usr/bin/env bash

set -e

# Configurable deployment root
DEPLOY_DIR="/srv/www"

echo "Updating system packages..."
sudo apt update && sudo apt upgrade -y

echo "Installing prerequisites..."
sudo apt install -y curl gnupg2 ca-certificates lsb-release software-properties-common unzip zip git

echo "Adding PHP 8.3 repository..."
sudo curl -sSL https://packages.sury.org/php/README.txt | sudo bash -x

echo "Installing PHP 8.3 and Laravel-required extensions..."
sudo apt install -y php8.3 php8.3-cli php8.3-fpm php8.3-common php8.3-mysql \
    php8.3-xml php8.3-mbstring php8.3-curl php8.3-zip php8.3-bcmath php8.3-tokenizer php8.3-fileinfo

echo "Installing Nginx..."
sudo apt install -y nginx

echo "Installing MariaDB..."
sudo apt install -y mariadb-server mariadb-client

echo "Securing MariaDB..."
sudo mysql_secure_installation

echo "Installing Node.js (LTS) and npm..."
curl -fsSL https://deb.nodesource.com/setup_lts.x | sudo -E bash -
sudo apt install -y nodejs

echo "Installing Composer..."
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

echo "Creating deployment directory at $DEPLOY_DIR..."
sudo mkdir -p "$DEPLOY_DIR"
sudo chown -R "$USER":www-data "$DEPLOY_DIR"
sudo chmod -R 775 "$DEPLOY_DIR"

echo "Enabling and starting services..."
sudo systemctl enable php8.3-fpm nginx mariadb
sudo systemctl start php8.3-fpm nginx mariadb

echo "Installation complete! ✅"
echo "Versions installed:"
php -v
nginx -v
mysql --version
node -v
npm -v
composer --version

echo "Your Laravel app should be deployed in: $DEPLOY_DIR"
