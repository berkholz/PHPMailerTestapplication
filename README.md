# PHPMailerTestapplication 
Little HTML and PHP web application to test sending mails from a webserver without shell access.

You can define the following settings in the form:
* TO - receipient
* FROM - sending from
* MAILSERVER - server to send to 
* SUBJECT - text of the mails subject
* MESSAGE - text of the message
 
You can load default values by clicking the "Load defaults" button. To change these default values you can edit the mail-config.php file.

## Prerequisite
Because it's a PHP webapplication you need a **webserver with PHP**. 


## Installation
 + You first need the <a href="https://github.com/PHPMailer/PHPMailer">PHPMailer</a>. Clone it where you want(we assume /var/www/):
 
 ```
 cd /var/www/
 git clone https://github.com/PHPMailer/PHPMailer
 ```
 + Clone the <a href="">PHPMailerTestapplication</a>:
 
 ```
 cd /var/www/
 git clone https://github.com/berkholz/PHPMailerTestapplication
 ```
 + Copy the *class.phpmailer.php* and *class.smtp.php* to the same directory where the PHPMailerTestapplication is: 
 
 ```
 cd /var/www/
 cp PHPMailer/class.{smtp,phpmailer}.php PHPMailerTestapplication/
 ```
 + And you're done.

## Troubleshooting
For troubleshooting take a look at you apache's errorlog, e.g. /var/log/apache2/error.log.
