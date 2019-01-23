FROM alpine

# install
RUN apk add --no-cache beanstalkd

EXPOSE 11300
CMD ["beanstalkd"]