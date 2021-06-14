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
if ( isset($_POST['examinationMonitorDeclarationAgree']) || isset($_POST['studentName']) || isset($_POST['email']) || isset($_POST['courseTitle']) || isset($_POST['courseSponsor']) || isset($_POST['examinationDates']) || isset($_POST['examinationLocation']) || isset($_POST['examMonitorName']) || isset($_POST['relationshipToStudent']) || isset($_POST['examMonitorsEmployer']) || isset($_POST['jobTitle']) || isset($_POST['businessPhone']) || isset($_POST['address1']) || isset($_POST['address2']) || isset($_POST['city']) || isset($_POST['state']) || isset($_POST['zipCode']) || isset($_POST['studentDeclarationAgree']) || isset($_POST['studentName2']) || isset($_POST['wwoperatorCertificationNumber']) ) {
    // Get the submitted form data  via $_POST Array
    //print_r("Inside iSet");
    //print_r($_POST);exit;

    $examinationMonitorDeclarationAgree = $_POST['examinationMonitorDeclarationAgree'];
    $studentName = $_POST['studentName'];
    $email = $_POST['email'];
    $courseTitle = $_POST['courseTitle'];
    $courseSponsor = $_POST['courseSponsor'];
    $examinationDates = $_POST['examinationDates'];
    $examinationLocation = $_POST['examinationLocation'];
    $examMonitorName = $_POST['examMonitorName'];
    $relationshipToStudent = $_POST['relationshipToStudent'];
    $examMonitorsEmployer = $_POST['examMonitorsEmployer'];
    $jobTitle = $_POST['jobTitle'];
    $businessPhone = $_POST['businessPhone'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $studentDeclarationAgree = $_POST['studentDeclarationAgree'];
    $studentName2 = $_POST['studentName2'];
    $wwoperatorCertificationNumber = $_POST['wwoperatorCertificationNumber'];

    $mpdf = new \Mpdf\Mpdf();
//echo 'sasas';exit;
    // Check whether submitted data is not empty 
    if (!empty($_POST['examinationMonitorDeclarationAgree']) && !empty($_POST['studentName']) && !empty($_POST['email']) && !empty($_POST['courseTitle']) && !empty($_POST['courseSponsor']) && !empty($_POST['examinationDates']) && !empty($_POST['examinationLocation']) && !empty($_POST['examMonitorName']) && !empty($_POST['relationshipToStudent']) && !empty($_POST['examMonitorsEmployer']) && !empty($_POST['jobTitle']) && !empty($_POST['businessPhone']) && !empty($_POST['address1']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zipCode']) && !empty($_POST['studentDeclarationAgree']) && !empty($_POST['studentName2']) && !empty($_POST['wwoperatorCertificationNumber']) ) {
       //print_r("Inside Condition");exit;
        // Validate email 
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
           //print_r("Inside If");
        } else {
           //print_r("Inside Else");exit;
             $check_email_exist = $db->query("select * from wwo_declaration_of_self_paced_training_exam_monitoring_form where email = '$email'");
            //print_r('Check Email');
             //die;
            if ($check_email_exist->num_rows > 0) {
                $response = array(
                    'status' => 'failure',
                    'message' => 'Email Already Exists. Please fill up with different Email.'
                );
            } else {

                //print_r("Inside Check Mail Else ");exit;
                
                //Insert record
                $insert = $db->query("INSERT INTO wwo_declaration_of_self_paced_training_exam_monitoring_form (examinationMonitorDeclarationAgree, studentName, email, courseTitle, courseSponsor, examinationDates, examinationLocation, examMonitorName, relationshipToStudent, examMonitorsEmployer, jobTitle, businessPhone, address1, address2, city, state, zipCode, studentDeclarationAgree, studentName2, wwoperatorCertificationNumber)VALUES(
                    '" .$examinationMonitorDeclarationAgree. "', '" .$studentName. "', '" .$email. "', '" .$courseTitle. "', '" .$courseSponsor. "', '" .$examinationDates. "', '" .$examinationLocation. "', '" .$examMonitorName. "', '" .$relationshipToStudent. "', '" .$examMonitorsEmployer. "', '" .$jobTitle. "', '" .$businessPhone. "', '" .$address1. "', '" .$address2. "', '" .$city. "', '" .$state. "', '" .$zipCode. "', '" .$studentDeclarationAgree. "', '" .$studentName2. "', '" .$wwoperatorCertificationNumber. "')");
                         //print_r($insert);
                        //  die;

                if ($insert) {
                    $formcontent = '';
                    $formcontent .= '<table rules="all" style="border-color: #666; width:100%; border: 1px solid;" cellpadding="10" width="100%" border="1">';
                    $formcontent .= '<tr style="background: #eee;"><td colspan="2"><strong>Washington Certification Services Contact Query</strong></td></tr>';
                    $formcontent .= '<tr><td><strong>examinationMonitorDeclarationAgree</strong> </td><td>' . $examinationMonitorDeclarationAgree . '</td></tr>';
                    $formcontent .= '<tr><td><strong>studentName</strong> </td><td>' . $studentName . '</td></tr>';
                    $formcontent .= '<tr><td><strong>email</strong> </td><td>' . $email . '</td></tr>';
                    $formcontent .= '<tr><td><strong>courseTitle</strong> </td><td>' . $courseTitle . '</td></tr>';
                    $formcontent .= '<tr><td><strong>courseSponsor</strong> </td><td>' . $courseSponsor . '</td></tr>';

                    $formcontent .= '<tr><td><strong>examinationDates</strong> </td><td>' . $examinationDates . '</td></tr>';
                    $formcontent .= '<tr><td><strong>examinationLocation</strong> </td><td>' . $examinationLocation . '</td></tr>';
                    $formcontent .= '<tr><td><strong>examMonitorName</strong> </td><td>' . $examMonitorName . '</td></tr>';
                    $formcontent .= '<tr><td><strong>relationshipToStudent</strong> </td><td>' . $relationshipToStudent . '</td></tr>';
                    $formcontent .= '<tr><td><strong>examMonitorsEmployer</strong> </td><td>' . $examMonitorsEmployer . '</td></tr>';
                    $formcontent .= '<tr><td><strong>jobTitle</strong> </td><td>' . $jobTitle . '</td></tr>';

                    $formcontent .= '<tr><td><strong>businessPhone</strong> </td><td>' . $businessPhone . '</td></tr>';
                    $formcontent .= '<tr><td><strong>address1</strong> </td><td>' . $address1 . '</td></tr>';
                    $formcontent .= '<tr><td><strong>address2</strong> </td><td>' . $address2 . '</td></tr>';
                    $formcontent .= '<tr><td><strong>city</strong> </td><td>' . $city . '</td></tr>';
                    $formcontent .= '<tr><td><strong>state</strong> </td><td>' . $state . '</td></tr>';

                    $formcontent .= '<tr><td><strong>zipCode</strong> </td><td>' . $zipCode . '</td></tr>';
                    $formcontent .= '<tr><td><strong>studentDeclarationAgree</strong> </td><td>' . $studentDeclarationAgree . '</td></tr>';
                    $formcontent .= '<tr><td><strong>studentName2</strong> </td><td>' . $studentName2 . '</td></tr>';
                    $formcontent .= '<tr><td><strong>wwoperatorCertificationNumber</strong> </td><td>' . $wwoperatorCertificationNumber . '</td></tr>';

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
                    $formPDF = $mpdf->Output('./../pdfs/wwo-declaration-of-self-paced-training-exam-monitoring-form-pdfs/wwo-declaration-of-self-paced-training-exam-monitoring-form-'.$studentName.'-'.time().'.pdf','F');
    
                    $formPDFMail = $mpdf->Output('wwo-declaration-of-self-paced-training-exam-monitoring-form-'.$studentName.'-'.time().'.pdf','S');

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
        $response['message'] = 'Please fill all the mandatory fields (examinationMonitorDeclarationAgree, studentName, email, courseTitle, courseSponsor, examinationDates, examinationLocation, examMonitorName, relationshipToStudent, examMonitorsEmployer, jobTitle, businessPhone, address1, city, state, zipCode, studentDeclarationAgree, studentName2, wwoperatorCertificationNumber).';
    }
}
// Return response 
echo json_encode($response);
?>