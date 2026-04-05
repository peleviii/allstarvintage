FROM nginx:alpine

COPY index.html /usr/share/nginx/html/index.html
COPY rules.html /usr/share/nginx/html/rules.html
COPY fonts/ /usr/share/nginx/html/fonts/
COPY img/ /usr/share/nginx/html/img/
COPY nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]