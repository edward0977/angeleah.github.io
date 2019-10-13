<?php
//config
$sendto = 'edwardbanag09@gmail.com';
$subject = 'New Quote Request';

if (!empty($_POST)) {
$name = $_POST['name'];
$form = $_POST['email'];
$message = $_POST['message'];
$honeypot = $_POST['url'];

// chk honeypot

if (!empty($honeypot)) {
			echo JSON_encode(array('status'=> 0,'message'=>'There was a problem'));
die();
}

if ( empty($name) || empty($form) || empty($message)) {
	echo json_encode(array('status'=>0, 'message' => 'A required field is missing'));
	die();
}

$from = filter_var($from, FILTER_VALIDATE_EMAIL);

if ( !$form) {
		echo json_encode(array('status'=>0, 'message' => 'Not a valid email'));
			die();
}

$headers = sprintf('From: %s' , $from) ."\r\n";
$headers .= sprintf('Reply-To: %s', $from) ."\r\n";
$headers .= sprintf('X-Mailer: PHP/%s', phpversion());

if ( mail($sendto, $subject, $message, $headers)) {
	echo json_encode(array('status'=>1, 'message' => 'Email Sent'));
			die();
}
echo json_encode(array('status'=>0, 'message' => 'Email NOT sent successfully. Please try again'));
	
} 
//else 
//{echo 'No data';}
?>