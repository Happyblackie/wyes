<?php

// error_reporting(1);
// error_reporting(-1);
// ini_set('display_errors', 'On');
// require_once('../../../../wp-load.php');
// require('contact-form-process.php');


//error_reporting(0);
define('AJAX_REQUEST', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

if(!AJAX_REQUEST) {die();}

require_once('../../../../wp-load.php');


$src=clean_value($_REQUEST['c_src']);
$fname=clean_value($_REQUEST['name']);


$username=$fname;
$email=clean_value($_REQUEST['email']);
$phone=clean_value($_REQUEST['phone']);
$message=clean_value($_REQUEST['message']);
$subject=clean_value($_REQUEST['subject']);

$response=array();
if(empty($fname)){ 
	$response['status']=0;
	$response['field']='#name';
	$response['message']='<div class="alert alert-danger">Enter your name</div>';
	echo json_encode($response); exit;
}

if(!is_email($email)){
	$response['status']=0;
	$response['field']='#email';
	$response['message']='<div class="alert alert-danger">Enter a valid email address</div>';
	echo json_encode($response); exit;
}
if(!is_phone($phone)){
	$response['status']=0;
	$response['field']='#phone';
	$response['message']='<div class="alert alert-danger">Enter a valid phone number.</div>';
	echo json_encode($response); exit;
}

if(empty($subject)){ 
	$response['status']=0;
	$response['field']='#subject';
	$response['message']='<div class="alert alert-danger">Enter your subject</div>';
	echo json_encode($response); exit;
}

if(empty($message)){ 
	$response['status']=0;
	$response['field']='#message';
	$response['message']='<div class="alert alert-danger">Enter your message</div>';
	echo json_encode($response); exit;
} 




else {
//send a curl request with the data entered
global $wpdb;
$wpdb->insert( 
	'wpms_contact', 
	array( 
		'fullname' => $username, 
		'phone' => $phone,
		'email' => $email,
		'subject' => $subject,
		'message' => $message
	
	), 
	array('%s','%s','%s','%s', '%s' )
);

$formcontent=" From: $username  <br/>  
Phone: $phone  <br/> 
Email: $email  <br/> 
Subject: $subject   <br/>
Message: $message   <br/>
";



//   Send Mail
		// When we unzipped PHPMailer, it unzipped to
		// public_html/PHPMailer_5.2.0
		require("PHPMailer-master/src/PHPMailer.php");
		require("PHPMailer-master/src/SMTP.php");
		require("PHPMailer-master/src/Exception.php");

		$mail = new PHPMailer\PHPMailer\PHPMailer();

		// set mailer to use SMTP
		$mail->IsSMTP();

		$mail->CharSet="UTF-8";
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPDebug = 0; 
		$mail->Port = 587 ; //465 or 587

		$mail->SMTPSecure = 'tls';  
		$mail->SMTPAuth = true; 
		$mail->IsHTML(true);

		//Authentication
		$mail->Username = "web@rizikisource.org";
		$mail->Password = "nwfi ucdm cvmf jndo";
		
		//Set Params
		$mail->SetFrom('web@rizikisource.org');
		$mail->AddAddress('info@rizikisource.org');
		$mail->Subject = 'Website Contact Form ';
		$mail->Body = $formcontent;

		if(!$mail->send()) {

		$response['status']=0;
// 		return json_encode($response); 
// 			echo 'Message could not be sent.';
// 			echo 'Mailer Error: ' . $mail->ErrorInfo;
			$response['message']='<div class="alert alert-danger">Oops! sorry our servers could not deliver your email, please report the problem to our official number or drop us an email</div>';
			echo json_encode($response); exit;
		} else {


			// echo 'Message has been sent';
			// return json_encode($response); 
//   Send Mail



$response['message']='<div class="alert alert-success">Thank you for contacting us! Our customer care representative will contact you shortly</div>';

$response['status']=1;
$response['field']='';
echo json_encode($response); exit;

}

}



?>