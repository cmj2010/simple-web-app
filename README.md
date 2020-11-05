# simple-web-app

## Start web server by user data
```bash
#!/bin/bash
yum -y update
yum -y install httpd php git php-pdo php-mysql mysql
chkconfig httpd on
git clone https://github.com/cmj2010/simple-web-app.git /var/www/html
service httpd start
```