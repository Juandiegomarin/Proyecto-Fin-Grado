<?php

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])) {

	$data = array(
		'secret' => "0xE4318d58C894FdDb88c5B7d8Dc5ba141b11A7d64",
		'response' => $_POST['h-captcha-response']
	);

	$verify = curl_init();
	curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
	curl_setopt($verify, CURLOPT_POST, true);
	curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($verify);

	$responseData = json_decode($response);

	if ($responseData->success) {

		$nombre = $_POST["nombre"];
		$email = $_POST["email"];
		$sujeto = $_POST["sujeto"];
		$mensaje = $_POST["mensaje"];

		sendEmail($nombre, $email, $sujeto, $mensaje);
	} else {
		header("Location:index.php?page=contacto&mail=false");
		exit;
	}
} elseif (isset($_POST['h-captcha-response']) && empty($_POST['h-captcha-response'])) {

	header("Location:index.php?page=contacto&mail=false");
	exit;
}

function sendEmail($nombre, $email, $sujeto, $mensaje)
{
	$mail = new PHPMailer(true);

	try {
		// Configure the SMTP server
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; // SMTP Port
		$mail->SMTPAuth = true;
		$mail->Username = EMAIL;
		$mail->Password = PASSWORD;
		$mail->SMTPSecure = 'ssl';

		// Set the sender and recipient
		$mail->setFrom(EMAIL, DOMAIN);
		$mail->addAddress(EMAIL, DOMAIN);

		// Configure mail content
		$mail->isHTML(true);
		$mail->Subject = "Contact " . EMAIL;
		$mail->Body = "<p>Form details below." . "<br>" . "Nombre: " . $nombre . "<br>" . "Email: " . $email . "<br>" . "Sujeto: " . $sujeto . "<br>" . "Mensaje: " . $mensaje . "</p>";

		// Send the mail

		//https://".DOMAIN."/
		$mail->send();

		header("Location:index.php?page=contacto&mail=true");
		exit;
	} catch (Exception $e) {

		header("Location:index.php?page=contacto&mail=false");
		exit;
	}
}
