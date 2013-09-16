## Introduction
A website for a design company. The website is entirely static except for some PHP used to send emails.

## Installation
It is assumed that Apache is already installed.

### PHP
To add PHP support to Apache, run:

```
apt-get update
apt-get install php5 libapache2-mod-php5
```

#### PHPMailer
* Create the directory `/usr/share/php5/PHPMailer` and add it to the `include_path` variable in  `/etc/php5/apache2/php.ini`
* Copy the contents of the latest release of [PHPMailer](https://github.com/PHPMailer/PHPMailer/releases) into this directory such that
there exists a file `/usr/share/php5/PHPMailer/class.phpmailer.php`
