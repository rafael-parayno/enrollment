FROM php:7.4.3-apache
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Use a base image (e.g., Ubuntu)
# FROM ubuntu:latest

# Install Git (if not already installed)
RUN apt-get update && apt-get install -y git

# Set the working directory
WORKDIR /var/www/html/

