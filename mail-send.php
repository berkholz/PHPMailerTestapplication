<?php

include 'class.phpmailer.php';
include 'class.smtp.php';

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "localhost";  
$mail->SMTPAuth = false;   
//$mail->SMTPDebug = 1;

error_reporting(E_ALL);
ini_set("display_errors", "On");

if (isset($_REQUEST['SSL_NOVERIFY'])){
	$mail->SMTPOptions = array(
		'ssl' => array(
			'verify_peer' => false,
			'verify_peer_name' => false,
			'allow_self_signed' => true
		)
	);
}

if ($_REQUEST['MAILSERVER']){
	$mail->Host = $_REQUEST['MAILSERVER'];
}

if ($_REQUEST['FROM']){
	$mail->From = $_REQUEST['FROM'];
}

if ($_REQUEST['TO']){
	$mail->AddAddress($_REQUEST['TO'], "...");
}

if ($_REQUEST['SUBJECT']){
	$mail->Subject = $_REQUEST['SUBJECT'];
}

$mail->WordWrap = 50;                   
$mail->IsHTML(false);                  

if ($_REQUEST['MESSAGE']){
	$mail->Body    = $_REQUEST['MESSAGE'];
	$mail->AltBody = $_REQUEST['MESSAGE'];
}


?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Mail-Tester</title>
	</head>
	<body>
		<?php
		if(!$mail->Send()) {
			echo "<p style=\"border: solid red;\">Message could not be sent. <br />";
			echo "Mailer Error: " . $mail->ErrorInfo . "</p>";
		}else {
			echo "<p style=\"border: solid green;\">Message has been sent</p>";
		}
		?>
		<form method="post" action="mail-form.php">
			<input name="MAILSERVER" size="60" id="MAILSERVER" type="hidden" value="<?php echo $_REQUEST['MAILSERVER']; ?>" /br>
			<input name="FROM" id="FROM" type="hidden" value="<?php echo $_REQUEST['FROM']; ?>" /><br />
			<input name="TO" id="TO" type="hidden" value="<?php echo $_REQUEST['TO']; ?>" /><br />
	                <input name="SUBJECT" size="60" id="SUBJECT" type="hidden" value="<?php echo $_REQUEST['SUBJECT']; ?>" /><br />
			<input name="MESSAGE" id="MESSAGE" type="hidden" value="<?php echo $_REQUEST['MESSAGE']; ?>"><br />
			<input name="SSL_NOVERIFY" id="SSL_NOVERIFY" type="hidden" value="<?php if (isset($_REQUEST['SSL_NOVERIFY'])){echo $_REQUEST['SSL_NOVERIFY'];} ?>"><br />
			<input type="submit" value="Neue Mail versenden" />
		</form>
				
<!-- /*
		<pre>
		<h1>MAIL:</h1>
		<?php print_r($mail); ?>
		</pre>
		<pre>
		<h1>$_REQUEST</h1>
		<?php print_r($_REQUEST); ?>
		</pre>
*/ -->
		<?php 
			ini_set("display_errors", "Off");
		?>
	</body>
</html>
