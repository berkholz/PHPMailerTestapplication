<?php
include "mail-config.php";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHPMailerTestapplication</title>
	</head>
	<body>
		<script>
		function clear_inputs () { 
			document.getElementById("MAILSERVER").value = ""; 
			document.getElementById("TO").value = ""; 
			document.getElementById("FROM").value = ""; 
			document.getElementById("MESSAGE").value = ""; 
			document.getElementById("SUBJECT").value = ""; 
			document.getElementById("SSL_NOVERIFY").checked = false; 
		} 

		function default_inputs () { 
			document.getElementById("MAILSERVER").value = "<?php echo $MAILSERVER_TEMPLATE; ?>";
			document.getElementById("TO").value = "<?php echo $TO_TEMPLATE; ?>";
			document.getElementById("FROM").value = "<?php echo $FROM_TEMPLATE; ?>";
			document.getElementById("SUBJECT").value = "<?php echo $SUBJECT_TEMPLATE; ?>";
			document.getElementById("MESSAGE").value = "<?php echo $MESSAGE_TEMPLATE; ?>";
			document.getElementById("SSL_NOVERIFY").checked = <?php echo $SSL_NOVERIFY_CHECKED; ?>;
		} 

		</script>
		<form method="post" action="mail-send.php">
			Mailserver: <br />
			<input name="MAILSERVER" size="60" id="MAILSERVER" type="text" value="<?php echo $_REQUEST['MAILSERVER']; ?>" /><br />
			FROM:<br /> 
			<input name="FROM" id="FROM" size="60" type="email" value="<?php echo $_REQUEST['FROM']; ?>" /><br />
				
			TO:<br /> 
			<input name="TO" id="TO" size="60" type="email" value="<?php echo $_REQUEST['TO']; ?>" /><br />
				
			<p>
			Subject:<br />
			<input name="SUBJECT" size="60" id="SUBJECT" type="TEXT" value="<?php echo $_REQUEST['SUBJECT']; ?>" /><br />
			
			Message:<br />
			<textarea name="MESSAGE" id="MESSAGE" rows="15" cols="46"><?php echo $_REQUEST['MESSAGE']; ?> </textarea><br />
	
			Disable verification of SSL certificates: 
			<input name="SSL_NOVERIFY" id="SSL_NOVERIFY" type="checkbox" value="on" <?php if(isset($_REQUEST['SSL_NOVERIFY'])) { if ($_REQUEST['SSL_NOVERIFY'] == "on") {echo "checked"; }} ?> >

			</p>
			<input type="submit" value="Submit" />
			<button type="reset" >Reset</button>
		</form>
		<button onclick="clear_inputs()">Clear Fields</button>
		<button onclick="default_inputs()">Load defaults</button>
		
		<p>
		To change default values, edit the mail-config.php file.
		</p>
	</body>
</html>

