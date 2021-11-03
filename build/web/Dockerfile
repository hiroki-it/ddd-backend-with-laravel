#===================
# Global ARG
#===================
ARG NGINX_VERSION="1.19"
ARG LABEL="Hiroki <hasegawafeedshop@gmail.com>"

#===================
# Build Stage
#===================
FROM nginx:${NGINX_VERSION} as build

RUN apt-get update -y \
  && apt-get install -y \
     curl \
     vim \
  # キャッシュ削除
  && apt-get clean

#===================
# Develop Stage
#===================
FROM build as develop
LABEL mantainer=${LABEL}

COPY ./build/web/develop.nginx.conf /etc/nginx/nginx.conf

CMD ["/usr/sbin/nginx", "-g", "daemon off;"]

#===================
# Production Stage
#===================
FROM build as production
LABEL mantainer=${LABEL}

COPY ./build/web/production.nginx.conf /etc/nginx/nginx.conf

CMD ["/usr/sbin/nginx", "-g", "daemon off;"]
