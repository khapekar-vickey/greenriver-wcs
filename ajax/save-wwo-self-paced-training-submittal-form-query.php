<?php
error_reporting(E_ALL);
ini_set('dispay_errors',1);
include_once 'db.php'; //include the DB config file
// print_r($_POST);
// die;
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/Exception.php';
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require '/wp-content/themes/bento-child/vendor/autoload.php';
// $mail = new PHPMailer(true);
//echo 'hjh';exit;
require_once './../wp-content/themes/bento-child/vendor/autoload.php';
//require_once '../wp-content/themes/bento-child/vendor/mpdf/mpdf/src/Mpdf.php';

$response = array(
    'status' => 'failure',
    'message' => 'Form submission failed, please try again.'
);

// If form is submitted 
if ( isset($_POST['firstName']) || isset($_POST['lastName']) || isset($_POST['homeAddress1']) || isset($_POST['homeAddress2']) || isset($_POST['city']) || isset($_POST['state']) || isset($_POST['zipCode']) || isset($_POST['email']) || isset($_POST['homePhoneNumber']) || isset($_POST['operatorCertificationNumber']) || isset($_POST['courseTitle']) || isset($_POST['courseSponsor']) || isset($_POST['courseCompletionDate']) || isset($_POST['location']) || isset($_POST['courseFormat']) || isset($_POST['declarationSelfPacedTrainingExam']) || isset($_POST['certificateCompletion']) || isset($_POST['transcriptCourseDescription']) ) {
    // Get the submitted form data  via $_POST Array
    //print_r("Inside iSet");

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $homeAddress1 = $_POST['homeAddress1'];
    $homeAddress2 = $_POST['homeAddress2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $email = $_POST['email'];
    $homePhoneNumber = $_POST['homePhoneNumber'];
    $operatorCertificationNumber = $_POST['operatorCertificationNumber'];
    $courseTitle = $_POST['courseTitle'];
    $courseSponsor = $_POST['courseSponsor'];
    $courseCompletionDate = $_POST['courseCompletionDate'];
    $location = $_POST['location'];
    $courseFormat = $_POST['courseFormat'];

    $declarationSelfPacedTrainingExam = $_POST['declarationSelfPacedTrainingExam'];
    $certificateCompletion = $_POST['certificateCompletion'];
    $transcriptCourseDescription = $_POST['transcriptCourseDescription'];

    $mpdf = new \Mpdf\Mpdf();

    // Check whether submitted data is not empty 
    if (!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['homeAddress1']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zipCode']) && !empty($_POST['email']) && !empty($_POST['homePhoneNumber']) && !empty($_POST['operatorCertificationNumber']) && !empty($_POST['courseTitle']) && !empty($_POST['courseSponsor']) && !empty($_POST['courseCompletionDate']) && !empty($_POST['location']) && !empty($_POST['courseFormat']) ) {
       // print_r("Inside Condition");
        // Validate email 
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
          //  print_r("Inside If");
        } else {
           // print_r("Inside Else");
             $check_email_exist = $db->query("select * from wwo_self_paced_training_submittal_form where email = '$email'");
            // print_r('Check Email');
            // die;
            if ($check_email_exist->num_rows > 0) {
                $response = array(
                    'status' => 'failure',
                    'message' => 'Email Already Exists. Please fill up with different Email.'
                );
            } else {

                if ( $declarationSelfPacedTrainingExam == 'true' ){
                    $declarationSelfPacedTrainingExam = 1;
                }
                else {
                    $declarationSelfPacedTrainingExam = 0;
                }

                if ( $certificateCompletion == 'true' ){
                    $certificateCompletion = 1;
                }
                else {
                    $certificateCompletion = 0;
                }

                if ( $transcriptCourseDescription == 'true' ){
                    $transcriptCourseDescription = 1;
                }
                else {
                    $transcriptCourseDescription = 0;
                }
                
                //Insert record
                $insert = $db->query("INSERT INTO wwo_self_paced_training_submittal_form (firstName, lastName, homeAddress1, homeAddress2, city, state, zipCode, email, homePhoneNumber, operatorCertificationNumber, courseTitle, courseSponsor, courseCompletionDate, location, courseFormat, declarationSelfPacedTrainingExam, certificateCompletion, transcriptCourseDescription)VALUES(
                    '" .$firstName. "', '" .$lastName. "', '" .$homeAddress1. "', '" .$homeAddress2. "', '" .$city. "', '" .$state. "', '" .$zipCode. "', '" .$email. "', '" .$homePhoneNumber. "', '" .$operatorCertificationNumber. "', '" .$courseTitle. "', '" .$courseSponsor. "', '" .$courseCompletionDate. "', '" .$location. "', '" .$courseFormat. "', '" .$declarationSelfPacedTrainingExam. "', '" .$certificateCompletion. "', '" .$transcriptCourseDescription. "')");
                        //  print_r($insert);
                        //  die;

                if ($insert) {
                    $formcontent = '';
                    $formcontent .= '<table rules="all" style="border-color: #666; width:100%; border: 1px solid;" cellpadding="10" width="100%" border="1">';
                    $formcontent .= '<tr style="background: #eee;"><td colspan="2"><strong>Washington Certification Services Contact Query</strong></td></tr>';
                    $formcontent .= '<tr><td><strong>firstName</strong> </td><td>' . $firstName . '</td></tr>';
                    $formcontent .= '<tr><td><strong>lastName</strong> </td><td>' . $lastName . '</td></tr>';
                    $formcontent .= '<tr><td><strong>homeAddress1</strong> </td><td>' . $homeAddress1 . '</td></tr>';
                    $formcontent .= '<tr><td><strong>homeAddress2</strong> </td><td>' . $homeAddress2 . '</td></tr>';
                    $formcontent .= '<tr><td><strong>city</strong> </td><td>' . $city . '</td></tr>';

                    $formcontent .= '<tr><td><strong>state</strong> </td><td>' . $state . '</td></tr>';
                    $formcontent .= '<tr><td><strong>zipCode</strong> </td><td>' . $zipCode . '</td></tr>';
                    $formcontent .= '<tr><td><strong>email</strong> </td><td>' . $email . '</td></tr>';
                    $formcontent .= '<tr><td><strong>homePhoneNumber</strong> </td><td>' . $homePhoneNumber . '</td></tr>';
                    $formcontent .= '<tr><td><strong>operatorCertificationNumber</strong> </td><td>' . $operatorCertificationNumber . '</td></tr>';

                    $formcontent .= '<tr><td><strong>courseTitle</strong> </td><td>' . $courseTitle . '</td></tr>';
                    $formcontent .= '<tr><td><strong>courseSponsor</strong> </td><td>' . $courseSponsor . '</td></tr>';
                    $formcontent .= '<tr><td><strong>courseCompletionDate</strong> </td><td>' . $courseCompletionDate . '</td></tr>';
                    $formcontent .= '<tr><td><strong>location</strong> </td><td>' . $location . '</td></tr>';
                    $formcontent .= '<tr><td><strong>courseFormat</strong> </td><td>' . $courseFormat . '</td></tr>';

                    $formcontent .= '<tr><td><strong>declarationSelfPacedTrainingExam</strong> </td><td>' . $declarationSelfPacedTrainingExam . '</td></tr>';
                    $formcontent .= '<tr><td><strong>certificateCompletion</strong> </td><td>' . $certificateCompletion . '</td></tr>';
                    $formcontent .= '<tr><td><strong>transcriptCourseDescription</strong> </td><td>' . $transcriptCourseDescription . '</td></tr>';

                    $formcontent .= '</table>';

                    $mpdf->debug = false;
                    $mpdf->useActiveForms = true;
                    // $mpdf->formUseZapD = false;
                    // $mpdf->form_border_color = '0.6 0.6 0.72';
                    // $mpdf->form_button_border_width = '2';
                    // $mpdf->form_button_border_style = 'S';
                    // $mpdf->form_radio_color = '0.0 0.0 0.4'; 	// radio and checkbox
                    // $mpdf->form_radio_background_color = '0.9 0.9 0.9';
                    $mpdf->WriteHTML($formcontent,2);
                    $formPDF = $mpdf->Output('./../pdfs/wwo-self-paced-training-submittal-form-pdfs/wwo-self-paced-training-submittal-form-'.$firstName.'-'.time().'.pdf','F');
    
                    $formPDFMail = $mpdf->Output('wwo-self-paced-training-submittal-form-'.$firstName.'-'.time().'.pdf','S');

                    //standard Mail Function start
                    //$mail = new PHPMailer(true);

                    /*try {
                        //Server settings
                        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                        $mail->SMTPDebug = false;
                        $mail->isSMTP();                                            // Send using SMTP
                        $mail->Host       = 'smtp.example.com';                    // Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                        $mail->Username   = 'user@example.com';                     // SMTP username
                        $mail->Password   = 'secret';                               // SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                        $subject = "Washington Certification Services Contact Query";
                    

              
                    $recipient = "raghuram.joshi@peopletech.com";   // Admin's email

                    //Recipients
                    $mail->setFrom('no-reply@peopletech.com', 'Test Form');
                    $mail->addAddress($recipient, 'Raghuram Joshi');     // Add a recipient
                    // $mail->addAddress('ellen@example.com');               // Name is optional
                  
                    //$mail->addCC('joshi.raghuram@gmail.com');
                
                    // Attachments
                    $mail->addStringAttachment($formPDFMail, 'formData.pdf');         // Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $formcontent;
                    $mail->AltBody = strip_tags($formcontent);

                    

                    // Always set content-type when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "X-Priority: 1" . "\r\n";
                    // More headers
                    $headers .= 'From: Washington Certification Services Enquiry <' . $email . '>' . "\r\n"; // static : coffee@socialpanga.com
                    $headers .= 'Cc: joshi.raghuram@gmail.com ' . "\r\n";  

                    $mail->Header = $headers;

                    // $headers .= 'Bcc: test@peopletech.com' . "\r\n"; 
                    //mail($recipient, $subject, $formcontent, $headers);
                    
                        $mail->send();
                        //echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    */
                    //standard Mail Function end


                    //enduser mailing function
                    /*$recipient_subject = "Washington Certification Services - Thank you for showing interest";
                    $recipient_formcontent = '';
                    $recipient_formcontent .= 'Dear ' . $firstName . ' ' . $lastName;
                    $recipient_formcontent .= '<p>Thank you for reaching out to us. For more updates follow us on</p>';
                    $recipient_formcontent .= 'Team Washington Certification Services';
                    $recipient_to = $email;*/
                    
                    //mail($recipient_to, $recipient_subject, $recipient_formcontent, $headers);

                    $response['status'] = 'success';
                    $response['message'] = 'Contact Request submitted successfully !!';

                }
            }
        }
    } else {
        $response['status'] = 'failure';
        $response['message'] = 'Please fill all the mandatory fields (firstName, lastName, homeAddress1, city, state, zipCode, email, homePhoneNumber, operatorCertificationNumber, courseTitle, courseSponsor, courseCompletionDate, location, courseFormat).';
    }
}
// Return response 
echo json_encode($response);
?>