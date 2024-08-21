#!/bin/bash

# Update package list
sudo apt update

# Install software-properties-common if not already installed
sudo apt install -y software-properties-common

# Add the PHP PPA repository
sudo add-apt-repository -y ppa:ondrej/php

# Update package list again
sudo apt update -y

# Install PHP 8.3 and SQLite3 extension
sudo apt install -y php8.3 php8.3-sqlite3

# Create SQLite database file
touch database/database.sqlite

# Create directory for keyrings and download Cloudflare GPG key
sudo mkdir -p --mode=0755 /usr/share/keyrings
curl -fsSL https://pkg.cloudflare.com/cloudflare-main.gpg | sudo tee /usr/share/keyrings/cloudflare-main.gpg >/dev/null

# Add Cloudflare APT repository
echo "deb [signed-by=/usr/share/keyrings/cloudflare-main.gpg] https://pkg.cloudflare.com/cloudflared $(lsb_release -cs) main" | sudo tee /etc/apt/sources.list.d/cloudflared.list

# Update package list and install cloudflared
sudo apt-get update -y && sudo apt-get install -y cloudflared

# Install Composer dependencies
composer install

# Cloudflared Login
cloudflare tunnel login
