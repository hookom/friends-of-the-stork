<?php
$field_name = $_POST['contact_name'];
$field_email = $_POST['contact_email'];
$field_message = $_POST['contact_message'];

$valid_email = filter_var($field_email, FILTER_VALIDATE_EMAIL);

$mail_to = 'friendsofthestork@gmail.com';

if($valid_email) {
	$subject = 'Message from a site visitor: '.$field_name;
} else {
	$subject = 'ATTEMPTED message from a site visitor with an invalid email';
}

$body_message = 'From: '.$field_name."\n";
$body_message .= 'E-mail: '.$field_email."\n";
$body_message .= 'Message: '.$field_message;

$headers = 'From: '.$field_email."\r\n";
$headers .= 'Reply-To: '.$field_email."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status && $valid_email) { 
?>
	<script language="javascript" type="text/javascript">
		alert('Thank you for the message. If you haven\'t heard back from us within 2 days, please contact us directly at friendsofthestork@gmail.com.');
		window.location = 'contact.html';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Message failed. Please try again with a valid email address or contact us directly at friendsofthestork@gmail.com');
		window.location = 'contact.html';
	</script>
<?php
}
?>