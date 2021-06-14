<?php
//if "email" variable is filled out, send email
  
  //Email information
 /* $admin_email = "moulika.kolusu@gmail.com";
  $email = "moulika.nimmala@ptgindia.com";
  $subject = "hi";
  $comment = "sdgfdsg";
  
  //send email
  mail($admin_email, "$subject", $comment, "From:" . $email);
  
  //Email response
  echo "Thank you for contacting us!";*/
  
  //if "email" variable is not filled out, display the form
  
 
 
?> <?php     
/*$to_email = 'moulika.nimmala@ptgindia.com';
$subject = 'Testing PHP Mail';
$message = 'This mail is sent using the PHP mail function';
$headers = 'From: noreply @ company . com';
mail($to_email,$subject,$message,$headers);*/


	//require_once('phpmailer/class.phpmailer.php');
	require 'phpmailer/PHPMailerAutoload.php';
	//require 'cred.php';
	$mail = new PHPMailer();
	$mail->SMTPDebug = 4;
	$mail->IsSMTP();
	$mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = 'oubt.org@gmail.com'; //add ur gmailid 
   $mail->Password = 'Welcome@oubt'; //add ur password
	$mail->SMTPSecure = "tls";  
   
    $mail->Port = "587";
 
    $mail->setFrom('oubt.org@gmail.com', 'Moulika Nimmala'); //add ur gmailid 
    $mail->AddAddress('himayath.ali@oubt.org', ' Solutions');
 
     $mail->Subject  =  'Moulika sending to ptg regarding mail task';
    $mail->isHTML(true);
    $mail->Body    = 'Hi Good Afternoon ,
	                  <br />
					  Iam sending the sample mail using PHP code...
					  <br />
					  cheers... :)';
		
	if($mail->Send())
	{
		echo "Message was Successfully Send :)";
	}
	else
	{
		echo "Mail Error - >".$mail->ErrorInfo;
	}
		

?>