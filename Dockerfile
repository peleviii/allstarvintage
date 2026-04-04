FROM nginx:alpine
 
COPY index.html /usr/share/nginx/html/index.html
COPY fonts/ /usr/share/nginx/html/fonts/
COPY nginx.conf /etc/nginx/conf.d/default.conf
 # Dockerfile - πρόσθεσε:
COPY img/ /usr/share/nginx/html/img/

EXPOSE 80
 
CMD ["nginx", "-g", "daemon off;"]
 