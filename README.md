# PHPMailerTestapplication 
Little HTML and PHP web application to test sending mails from a webserver without shell access.

You can define the following settings in the form:
* TO - receipient
* FROM - sending from
* MAILSERVER - server to send to 
* SUBJECT - text of the mails subject
* MESSAGE - text of the message
 
You can load default values by clicking the "Load defaults" button. To change these default values you can edit the mail-config.php file.

## Installation
 + You first need the <a href="https://github.com/PHPMailer/PHPMailer">PHPMailer</a>. Download and extract it where you want. 
 + Copy than the *class.phpmailer.php* to the same directory where the PHPMailerTestapplication is and you're done.
