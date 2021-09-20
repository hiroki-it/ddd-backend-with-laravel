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
  && docker-php-ext-install \
      bcmath \
      pdo_mysql \
  # フロントエンドのスキャフォールドを使用する時にコメントアウトを外す．
  # 新しいバージョンのNodeをインストールするために，apt-getを使用しない．
  # && curl -sL https://deb.nodesource.com/setup_12.x | bash - \
  #  apt-get install -y nodejs \
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
