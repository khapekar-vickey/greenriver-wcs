<?php
	require 'phpmailer/PHPMailerAutoload.php';
	require 'cred.php';
	$email="moulika.nimmala@ptgindia.com";
	$name="ptg";
	$mail = new PHPMailer();
	$mail->SMTPDebug = 4;
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
	$mail->Username = EMAIL; //add ur gmailid 
    $mail->Password = PASS; //add ur password
	$mail->SMTPSecure = "tls";  
    $mail->Port = "587";
    $mail->setFrom('oubt.org@gmail.com', 'Moulika Nimmala'); //add ur gmailid 
    $mail->AddAddress('himayath.ali@oubt.org', 'oubt');
	$mail->AddAddress('moulika.nimmala@gmail.com', 'gmail');
  $mail->AddCC($email, $name);
     $mail->Subject  =  'Moulika sending to ptg regarding mail task';
    $mail->isHTML(true);
     $mail->Body    = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table><tr><td>Hi Good Afternoon ,
	                  <br />
					  Iam sending the sample mail using PHP code...
					  <br />
					  cheers... :)</td></tr>
</table>
</body>
</html>
";
	if($mail->Send())
	{
		echo "Thank you... <br/> Your message has been received and will be contacting you shortly to follow-up.";
	}
	else
	{
		echo "Mail Error - >".$mail->ErrorInfo;
	}

?>