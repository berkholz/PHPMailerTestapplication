<?php

$MAILSERVER_TEMPLATE = "localhost";
$TO_TEMPLATE = "root@localhost";
$FROM_TEMPLATE = "root@localhost";
$SUBJECT_TEMPLATE = "Testnachricht von " . $_SERVER['SERVER_NAME'];
$MESSAGE_TEMPLATE = "Dies ist eine Testnachricht um " . date(DATE_RFC822);

// set to true to accept self signed certificates, otherwise false
$SSL_NOVERIFY_CHECKED = "true";

?>
