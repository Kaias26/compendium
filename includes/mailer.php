<?php	
	
	require_once( 'phpmailer/PHPMailer.php' );
	require_once( 'phpmailer/SMTP.php' );
	require_once( 'phpmailer/Exception.php' );
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	function smtpMailer($to, $from, $from_name, $subject, $body) {	
		global $mail_username;
		global $mail_password;

		$mail = new PHPMailer(true);  // Cree un nouvel objet PHPMailer
		$mail->IsSMTP(); // active SMTP
		$mail->IsHTML(true);
		$mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
		$mail->SMTPAuth = true;  // Authentification SMTP active
		$mail->SMTPSecure = 'tls'; // Gmail REQUIERT Le transfert securise
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->Username = $mail_username;
		$mail->Password = $mail_password;
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->addAddress($to);
		$mail->setFrom($to, $from_name);

		if(!$mail->Send()) {
			return 'Mail error: '.$mail->ErrorInfo;
		} else {
			return true;
		}
	}

	/*
	$result = smtpmailer('floris.jourdan@gmail.com', 'naheulbeukdb@gmail.com', 'Naheulbeuk DB', 'Votre Message', 'Le sujet de votre message');
	if (true !== $result)
	{
		// erreur -- traiter l'erreur
		echo $result;
	} else {
		echo $result;
		echo "yes !";
	}
	*/
?>