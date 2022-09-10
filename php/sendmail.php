<?php
/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$to = 'your@email.com'; /* enter your email (receiver email)

if ( isset( $_POST['submit'] ) && 'contact' === $_POST['submit'] ) {
	$firstname = $_POST['firstname'];
	$lastname  = $_POST['lastname'];
	$email     = $_POST['email'];
	$message   = $_POST['message'];
	$phone     = $_POST['phone'];

	$text = "FirstName : ".$firstname."\r\n". "Lastname : ".$lastname."\r\n". "Email : ".$email."\r\n". "Phone No. : ".$phone."\r\n". "Message :".$message;
	$subject = "You have receive message from " . ucfirst( $firstname ) . ' ' . ucfirst( $lastname );
	$txt = $text;
	$headers = "From: " . $email . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text\r\n";
	$mail = mail( $to, $subject, $txt, $headers );
	
	if( $mail ) {
		$json['success'] = true;
		$json['message'] = 'Your message submitted successfully!';
	} else {
		$json['success'] = false;

		$json['message'] = 'Oops! Something went wrong';
	}
	echo json_encode( $json );
	exit();
} */

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_POST['name'])  && isset($_POST['email'])&& isset($_POST['phone'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$body = $_POST['body'];

	require_once "PHPMailer/PHPMailer.php";
	require_once "PHPMailer/SMTP.php";
	require_once "PHPMailer/Exception.php";

	$mail = new PHPMailer();

	//smtp settings

	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->Username = "emmanuel01ayodeji@gmail.com";
	$mail->Password = "Fiddler@kaladin001.";
	$mail->Port = 465;
	$mail->SMTPSecure = "ssl";

	//email settings
	$mail->isHTML(true);
	$mail->setFrom($email, $firstname);
	$mail->addAddress("youremail@gmail.com");
	$mail->Subject = $subject;

	if($mail->send()){
		$status = "success";
		$response = "Email is sent!";
	}
	else
	{
		$status = "failed";
		$response = "Something is wrong: <br>" . $mail->ErrorInfo;
	}
	exit(json_encode(array("status" => $status, "response" => $response)));
}

?>