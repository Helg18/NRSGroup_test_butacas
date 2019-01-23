FROM nginx:latest

# Nginx site conf
ADD vhost.conf /etc/nginx/conf.d/default.conf

