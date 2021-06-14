<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$name = $_POST['name'];
$email = $_POST['email'];
//$message = $_POST['message'];
$cvsData = $name  . "," . $email ."\n";
//echo '<pre>';print_r($_POST); exit;
//then, we open the file:

$fp = fopen("car-hmi.csv","a"); // $fp is now the file pointer to file $filename

//then, we write the form contents to the file:

if($fp){
fwrite($fp,$cvsData); // Write information to the file
fclose($fp); // Close the file
}

//exit;
require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
require 'vendor/autoload.php';

//$toemail = "marketing@peopletech.com";
$toemail = "dixit.vemuganti@peopletech.com";
$name_in_email = "PTG Marketing";
$admin_mail = new PHPMailer\PHPMailer\PHPMailer(TRUE);                              // Passing `true` enables exceptions
try {
    //Server settings
    $admin_mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $admin_mail->isSMTP();                                      // Set mailer to use SMTP
    $admin_mail->Host = 'smtp.ionos.com';  // Specify main and backup SMTP servers
    $admin_mail->SMTPAuth = true;
    $admin_mail->Username = 'info@peopletechgroup.com';                 // SMTP username
    //$admin_mail->Password = "Welcome@ptg123";                           // SMTP password
    $admin_mail->Password = "Welcome@ptg123$%";                           // SMTP password
	$admin_mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $admin_mail->Port = 587;                                    // TCP port to connect to
    //$admin_mail->AddReplyTo('marketing@peopletech.com', 'PTG Marketing');
	$admin_mail->AddCC('Nancy.dinh@peopletech.com','Nancy Dinh');
	$admin_mail->AddCC('mohammad.iqbal@peopletech.com','Mohammad Iqbal');
    $admin_mail->setFrom('info@peopletechgroup.com', 'People Tech Group'); //add info@peopletechgroup.com
    $admin_mail->AddAddress($toemail, $name_in_email);
    $admin_mail->Subject = 'Company Profile Download Request';
    $admin_mail->isHTML(true);
    /* font-family: 'Open Sans', sans-serif; */
    $admin_mail->Body = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
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
          <td style='padding:10px 20px'>
              <img src='https://peopletech.com/wp-content/uploads/2019/10/logo.png' alt=''/>
            </td>
        </tr>
		<tr>
		<td  style='background:#cacaca; height:1px;'></td>
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
                                  <td align='left' class='title1' style=' color:#333; font-family: 'Roboto', sans-serif; font-size: 24px; font-weight: 400;'>You have a new PTG Company Profile Download Request from <span style='color:rgb(0, 60, 53); font-weight: bold;'>".ucwords($name)."</span>
                                    </td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align='left' class='title2' style='color:#333; font-family: Roboto, sans-serif; font-size: 16px;font-weight: 500;'>Name: ".ucwords($name)."</td>
                                </tr>
                                <tr>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td align='left' class='title2' style=' color:#333; font-family: 'Roboto', sans-serif; font-size: 16px;font-weight: 500;'>Email: $email</td>
                                </tr>
								<tr>
                                  <td>&nbsp;</td>
                                </tr>
                          </table>     
            </td> 
             
             
             <td width='5%'> </td> </tr> </table>
        </td>
        </tr>
        <tr>
                <td height='50'>&nbsp;</td>
              </tr>  
          <td style='font-family: 'Roboto', sans-serif; font-size:12px; color:#fff;  background: #A62033; text-align:center !important; border-top:#d1d1d1 solid 1px; padding:10px;' >&copy; ".date('Y')." People Tech Group Inc. </td>
        </tr>
        
      </table>
    </td>
  </tr>
</table>
</body>
</html>";
    //$admin_mail->AddAttachment($pdffile,$pdffile);
    $admin_mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    if ($admin_mail->Send()) {
        echo "Message was Successfully Sent";		
        exit;		
    } else {
        echo "Failed to send mail Error";
        exit;
    }
	
	
	
	
	
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $admin_mail->ErrorInfo;
}
