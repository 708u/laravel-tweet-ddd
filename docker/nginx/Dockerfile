FROM nginx:1.17.8-alpine

COPY nginx.conf /etc/nginx/nginx.conf

# Comment in if you use docker network as awsvpc
# RUN sed -i s/app:9000/127.0.0.1:9000/ /etc/nginx/nginx.conf
