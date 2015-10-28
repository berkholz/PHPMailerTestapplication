<?php

include 'class.phpmailer.php';

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "localhost";  
$mail->SMTPAuth = false;   

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
   echo "Message could not be sent. <br />";
   echo "Mailer Error: " . $mail->ErrorInfo;
}else {
	echo "Message has been sent";
}
?>
		<form method="post" action="mail-form.php">
			<input name="MAILSERVER" size="60" id="MAILSERVER" type="hidden" value="<?php echo $_REQUEST['MAILSERVER']; ?>" /br>
			<input name="FROM" id="FROM" type="hidden" value="<?php echo $_REQUEST['FROM']; ?>" /><br />
			<input name="TO" id="TO" type="hidden" value="<?php echo $_REQUEST['TO']; ?>" /><br />
	                <input name="SUBJECT" size="60" id="SUBJECT" type="hidden" value="<?php echo $_REQUEST['SUBJECT']; ?>" /><br />
			<input name="MESSAGE" id="MESSAGE" type="hidden" value="<?php echo $_REQUEST['MESSAGE']; ?>"><br />
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
	</body>
</html>

