#===================
# Global ARG
#===================
ARG PHP_FPM_VERSION="7.4.9"
ARG LABEL="Hiroki <hasegawafeedshop@gmail.com>"

#===================
# Base Stage
#===================
FROM php:${PHP_FPM_VERSION}-fpm as base

RUN apt-get update -y \
  && apt-get install -y \
      git \
      vim \
      unzip \
      zip \
      # Node
      nodejs \
      npm \
  && docker-php-ext-install \
      bcmath \
      pdo_mysql \
  # キャッシュ削除
  && apt-get clean

COPY --from=composer:1.10.10 /usr/bin/composer /usr/bin/composer

#===================
# Develop Stage
#===================
FROM base as develop
LABEL mantainer=${LABEL}

#===================
# Production Stage
#===================
FROM base as production
LABEL mantainer=${LABEL}
