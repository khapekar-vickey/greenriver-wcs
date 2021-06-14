<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$name = $_POST['name'];
$email = $_POST['email'];
//$message = $_POST['message'];
//echo '<pre>';print_r($_POST); exit;
require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
require 'vendor/autoload.php';                            // Passing `true` enables exceptions
$user_mail = new PHPMailer\PHPMailer\PHPMailer(TRUE);                              // Passing `true` enables exceptions
try {
    //Server settings
    $user_mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $user_mail->isSMTP();                                      // Set mailer to use SMTP
    $user_mail->Host = 'smtp.ionos.com';  // Specify main and backup SMTP servers
    $user_mail->SMTPAuth = true;
    $user_mail->Username = 'info@peopletechgroup.com';                 // SMTP username
    //$user_mail->Password = "Welcome@ptg123";                           // SMTP password
    $user_mail->Password = "Welcome@ptg123$%";                           // SMTP password
	$user_mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $user_mail->Port = 587;                                    // TCP port to connect to
    //$user_mail->AddReplyTo('marketing@peopletech.com', 'PTG Marketing');
	$user_mail->setFrom('info@peopletechgroup.com', 'People Tech Group'); //add info@peopletechgroup.com
    $user_mail->AddAddress($email, $name);
    $user_mail->Subject = 'Company Profile Download Request';
    $user_mail->isHTML(true);
    /* font-family: 'Open Sans', sans-serif; */
    $user_mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<meta name='viewport' content='width=device-width, initial-scale=1.0'/>
<title>Fyrsoft </title>
<style type='text/css'>
@import url('https://fonts.googleapis.com/css?family=Oswald:200,300,400,500,600,700|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i');
body {
	width: 100%;
	-webkit-text-size-adjust: 100%;
	-ms-text-size-adjust: 100%;
	margin: 0;
	padding: 0;
	font-family: 'Roboto', sans-serif;
}

/*IPAD STYLES*/

@media only screen and (max-width: 768px) {
.main {
	width: 95% !important;
}
}
@media(max-width:600px) {
.main {
	width: 96% !important;
}
.title1 {
	font-size: 20px !important;}

}
</style>
</head>

<body width: 100%;	-webkit-text-size-adjust: 100%;	-ms-text-size-adjust: 100%;	margin: 0;	padding: 0;	font-family: 'Roboto', sans-serif;'>
<table width='100%' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td align='center' valign='top'>
        <table class='main' width='800' border='0' cellspacing='0' cellpadding='0' style='background-color='#fff'>
        <tr style='background:#fff;'>
          <td align='center' style='padding:10px 20px'>
              <img src='https://peopletech.com/wp-content/uploads/2019/10/logo.png' alt=''/>
            </td>
        </tr>       
       
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
         <table style='border:#e0e0de solid 0px;' width='100%' ><tr> <td width='5%'> </td>
             <td width='90%'>
                    <table class='content'width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                              <td height='40'>&nbsp;</td>
                            </tr>
                           
                                <tr>
                                  <td align='left' class='title1' style=' color:#333; font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: 400;'>Hi ".ucwords($name).",</span>
                                    </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align='left' class='title2' style='color:#333; font-family: Roboto, sans-serif; font-size: 16px;font-weight: 500;'>Thanks for expressing interest in our Remote Work Solutions for your business during these COVID-19 times. </td>
                                </tr> 
								<tr>
                                  <td align='left' class='title2' style='color:#333; font-family: Roboto, sans-serif; font-size: 16px;font-weight: 500;'>One of our Remote Work experts will get in touch with you shortly to take this forward. </td>
                                </tr> 
                            <tr>
                              <td height='30'>&nbsp;</td>
                            </tr> 
		<tr>
          <td style='font-family: 'Roboto', sans-serif; font-size:12px; color:#fff;  background: #A62033; text-align:center; border-top:#d1d1d1 solid 1px; padding:10px;' >Best  Regards, </td>
        </tr>
		<tr>
          <td style='font-family: 'Roboto', sans-serif; font-size:12px; color:#fff;  background: #A62033; text-align:center; border-top:#d1d1d1 solid 1px; padding:10px;' >People Tech Group Inc. </td>
        </tr>		
<tr>
                              <td height='20'>&nbsp;</td>
                            </tr>									
                          </table>     
            </td> 
             
             
             <td width='5%'> </td> </tr> </table>
        </td>
        </tr>
        <tr>
                <td height='50'>&nbsp;</td>
              </tr>  
        <tr>
          <td style='font-family: 'Roboto', sans-serif; font-size:12px; color:#fff;  background: #A62033; text-align:center !important; border-top:#d1d1d1 solid 1px; padding:10px;' >&copy; ".date('Y')." People Tech Group Inc. </td>
        </tr>
        
      </table>
    </td>
  </tr>
</table>
</body>
</html>";
    //$user_mail->AddAttachment($pdffile,$pdffile);
    $user_mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    if ($user_mail->Send()) {
        echo "Message was Successfully Sent";		
        exit;
    } else {
        echo "Failed to send mail Error";
        exit;
    }
	
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $user_mail->ErrorInfo;
}
