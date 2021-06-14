<?php
error_reporting(0);
include_once 'db.php'; //include the DB config file
//print_r($_POST);
//die;
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/Exception.php';
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require '/wp-content/themes/bento-child/vendor/autoload.php';
// $mail = new PHPMailer(true);

require_once './../wp-content/themes/bento-child/vendor/autoload.php';

$response = array(
    'status' => 'failure',
    'message' => 'Form submission failed, please try again.'
);

// If form is submitted 
if ( isset($_POST['sponsoringOrganization']) || isset($_POST['contactName']) || isset($_POST['company']) || isset($_POST['address1']) || isset($_POST['city']) || isset($_POST['state']) || isset($_POST['zipCode']) || isset($_POST['email']) || isset($_POST['phoneNumber']) || isset($_POST['coursetitle']) || isset($_POST['location']) || isset($_POST['startDate']) || isset($_POST['endDate']) || isset($_POST['evaluatedPreviously']) || isset($_POST['maintenanceOfAWaterSystemBrief']) || isset($_POST['waterworksOperatorsInfluenceBrief']) || isset($_POST['attendanceMonitor']) ) {
    // Get the submitted form data  via $_POST Array
    //print_r("Inside iSet");

    $sponsoringOrganization = $_POST['sponsoringOrganization'];
    $contactName = $_POST['contactName'];
    $company = $_POST['company'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $website = $_POST['website'];
    $coursetitle = $_POST['coursetitle'];
    $location = $_POST['location'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $evaluatedPreviously = $_POST['evaluatedPreviously'];
    $hasTheCourseContentChanged = $_POST['hasTheCourseContentChanged'];
    $maintenanceOfAWaterSystemBrief = $_POST['maintenanceOfAWaterSystemBrief'];
    $waterworksOperatorsInfluenceBrief = $_POST['waterworksOperatorsInfluenceBrief'];
    $attendanceMonitor = $_POST['attendanceMonitor'];
    $skillDemonstrationORProject = $_POST['skillDemonstrationORProject'];
    $skillDemonstrationORProjectBrief = $_POST['skillDemonstrationORProjectBrief'];
    $oral_WrittenReportORExamination = $_POST['oral_WrittenReportORExamination'];
    $oral_WrittenReportORExaminationBrief = $_POST['oral_WrittenReportORExaminationBrief'];
    $satisfactoryProgramCompletionDemoOther = $_POST['satisfactoryProgramCompletionDemoOther'];
    $otherBrief = $_POST['otherBrief'];
    $certificateofCompletion = $_POST['certificateofCompletion'];
    $learningOutcomes = $_POST['learningOutcomes'];
    $timeSchedule = $_POST['timeSchedule'];
    $nameAddressDetails = $_POST['nameAddressDetails'];

    $mpdf = new \Mpdf\Mpdf();

    // Check whether submitted data is not empty 
    if ( !empty($_POST['sponsoringOrganization']) && !empty($_POST['contactName']) && !empty($_POST['company']) && !empty($_POST['address1']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zipCode']) && !empty($_POST['email']) && !empty($_POST['phoneNumber']) && !empty($_POST['coursetitle']) && !empty($_POST['location']) && !empty($_POST['startDate']) && !empty($_POST['endDate']) && !empty($_POST['evaluatedPreviously']) && !empty($_POST['hasTheCourseContentChanged']) && !empty($_POST['maintenanceOfAWaterSystemBrief']) && !empty($_POST['waterworksOperatorsInfluenceBrief']) && !empty($_POST['attendanceMonitor']) && !empty($_POST['skillDemonstrationORProjectBrief']) && !empty($_POST['oral_WrittenReportORExaminationBrief']) && !empty($_POST['otherBrief']) ) {
       // print_r("Inside Condition");
        // Validate email 
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
          //  print_r("Inside If");
        } else {
           // print_r("Inside Else");
             $check_email_exist = $db->query("select * from tcs_request_for_course_evaluation_and_ceu_assignment_form where email = '$email'");
            // print_r('Check Email');
            // die;
            if ($check_email_exist->num_rows > 0) {
                $response = array(
                    'status' => 'failure',
                    'message' => 'Email Already Exists. Please fill up with different Email.'
                );
            } else {

                if ( $skillDemonstrationORProject == 'true' ){
                    $skillDemonstrationORProject = 1;
                }
                else {
                    $skillDemonstrationORProject = 0;
                }

                if ( $oral_WrittenReportORExamination == 'true' ){
                    $oral_WrittenReportORExamination = 1;
                }
                else {
                    $oral_WrittenReportORExamination = 0;
                }

                if ( $satisfactoryProgramCompletionDemoOther == 'true' ){
                    $satisfactoryProgramCompletionDemoOther = 1;
                }
                else {
                    $satisfactoryProgramCompletionDemoOther = 0;
                }

                if ( $certificateofCompletion == 'true' ){
                    $certificateofCompletion = 1;
                }
                else {
                    $certificateofCompletion = 0;
                }

                if ( $learningOutcomes == 'true' ){
                    $learningOutcomes = 1;
                }
                else {
                    $learningOutcomes = 0;
                }

                if ( $timeSchedule == 'true' ){
                    $timeSchedule = 1;
                }
                else {
                    $timeSchedule = 0;
                }

                if ( $nameAddressDetails == 'true' ){
                    $nameAddressDetails = 1;
                }
                else {
                    $nameAddressDetails = 0;
                }
                
                //Insert record
                $insert = $db->query("INSERT INTO tcs_request_for_course_evaluation_and_ceu_assignment_form (sponsoringOrganization, contactName, company, address1, address2, city, state, zipCode, email, phoneNumber, website, coursetitle, location, startDate, endDate, evaluatedPreviously, hasTheCourseContentChanged, maintenanceOfAWaterSystemBrief, waterworksOperatorsInfluenceBrief, attendanceMonitor, skillDemonstrationORProject, skillDemonstrationORProjectBrief, oral_WrittenReportORExamination, oral_WrittenReportORExaminationBrief, satisfactoryProgramCompletionDemoOther, otherBrief, certificateofCompletion, learningOutcomes, timeSchedule, nameAddressDetails)VALUES('" .$sponsoringOrganization. "', '" .$contactName. "', '" .$company. "', '" .$address1. "', '" .$address2. "', '" .$city. "', '" .$state. "', '" .$zipCode. "', '" .$email. "', '" .$phoneNumber. "', '" .$website. "', '" .$coursetitle. "', '" .$location. "', '" .$startDate. "', '" .$endDate. "', '" .$evaluatedPreviously. "', '" .$hasTheCourseContentChanged. "', '" .$maintenanceOfAWaterSystemBrief. "', '" .$waterworksOperatorsInfluenceBrief. "', '" .$attendanceMonitor. "', '" .$skillDemonstrationORProject. "', '" .$skillDemonstrationORProjectBrief. "', '" .$oral_WrittenReportORExamination. "', '" .$oral_WrittenReportORExaminationBrief. "', '" .$satisfactoryProgramCompletionDemoOther. "', '" .$otherBrief. "', '" .$certificateofCompletion. "', '" .$learningOutcomes. "', '" .$timeSchedule. "', '" .$nameAddressDetails. "')");
                        //  print_r($insert);
                        //  die;

                if ($insert) {
                    $formcontent = '';
                    $formcontent .= '<table rules="all" style="border-color: #666; width:100%; border: 1px solid;" cellpadding="10" width="100%" border="1">';
                    $formcontent .= '<tr style="background: #eee;"><td colspan="2"><strong>Washington Certification Services Contact Query</strong></td></tr>';

$formcontent .= '<tr><td><strong>sponsoringOrganization</strong> </td><td>' . $sponsoringOrganization . '</td></tr>';
$formcontent .= '<tr><td><strong>contactName</strong> </td><td>' . $contactName . '</td></tr>';
$formcontent .= '<tr><td><strong>company</strong> </td><td>' . $company . '</td></tr>';
$formcontent .= '<tr><td><strong>address1</strong> </td><td>' . $address1 . '</td></tr>';
$formcontent .= '<tr><td><strong>address2</strong> </td><td>' . $address2 . '</td></tr>';
$formcontent .= '<tr><td><strong>city</strong> </td><td>' . $city . '</td></tr>';
$formcontent .= '<tr><td><strong>state</strong> </td><td>' . $state . '</td></tr>';
$formcontent .= '<tr><td><strong>zipCode</strong> </td><td>' . $zipCode . '</td></tr>';
$formcontent .= '<tr><td><strong>email</strong> </td><td>' . $email . '</td></tr>';
$formcontent .= '<tr><td><strong>phoneNumber</strong> </td><td>' . $phoneNumber . '</td></tr>';
$formcontent .= '<tr><td><strong>website</strong> </td><td>' . $website . '</td></tr>';
$formcontent .= '<tr><td><strong>coursetitle</strong> </td><td>' . $coursetitle . '</td></tr>';
$formcontent .= '<tr><td><strong>location</strong> </td><td>' . $location . '</td></tr>';
$formcontent .= '<tr><td><strong>startDate</strong> </td><td>' . $startDate . '</td></tr>';
$formcontent .= '<tr><td><strong>endDate</strong> </td><td>' . $endDate . '</td></tr>';
$formcontent .= '<tr><td><strong>evaluatedPreviously</strong> </td><td>' . $evaluatedPreviously . '</td></tr>';
$formcontent .= '<tr><td><strong>hasTheCourseContentChanged</strong> </td><td>' . $hasTheCourseContentChanged . '</td></tr>';
$formcontent .= '<tr><td><strong>maintenanceOfAWaterSystemBrief</strong> </td><td>' . $maintenanceOfAWaterSystemBrief . '</td></tr>';
$formcontent .= '<tr><td><strong>waterworksOperatorsInfluenceBrief</strong> </td><td>' . $waterworksOperatorsInfluenceBrief . '</td></tr>';
$formcontent .= '<tr><td><strong>attendanceMonitor</strong> </td><td>' . $attendanceMonitor . '</td></tr>';
$formcontent .= '<tr><td><strong>skillDemonstrationORProject</strong> </td><td>' . $skillDemonstrationORProject . '</td></tr>';
$formcontent .= '<tr><td><strong>skillDemonstrationORProjectBrief</strong> </td><td>' . $skillDemonstrationORProjectBrief . '</td></tr>';
$formcontent .= '<tr><td><strong>oral_WrittenReportORExamination</strong> </td><td>' . $oral_WrittenReportORExamination . '</td></tr>';
$formcontent .= '<tr><td><strong>oral_WrittenReportORExaminationBrief</strong> </td><td>' . $oral_WrittenReportORExaminationBrief . '</td></tr>';
$formcontent .= '<tr><td><strong>satisfactoryProgramCompletionDemoOther</strong> </td><td>' . $satisfactoryProgramCompletionDemoOther . '</td></tr>';
$formcontent .= '<tr><td><strong>otherBrief</strong> </td><td>' . $otherBrief . '</td></tr>';
$formcontent .= '<tr><td><strong>certificateofCompletion</strong> </td><td>' . $certificateofCompletion . '</td></tr>';
$formcontent .= '<tr><td><strong>learningOutcomes</strong> </td><td>' . $learningOutcomes . '</td></tr>';
$formcontent .= '<tr><td><strong>timeSchedule</strong> </td><td>' . $timeSchedule . '</td></tr>';
$formcontent .= '<tr><td><strong>nameAddressDetails</strong> </td><td>' . $nameAddressDetails . '</td></tr>';

                    $formcontent .= '</table>';

                    $mpdf->debug = true;
                    $mpdf->useActiveForms = true;
                    // $mpdf->formUseZapD = false;
                    // $mpdf->form_border_color = '0.6 0.6 0.72';
                    // $mpdf->form_button_border_width = '2';
                    // $mpdf->form_button_border_style = 'S';
                    // $mpdf->form_radio_color = '0.0 0.0 0.4'; 	// radio and checkbox
                    // $mpdf->form_radio_background_color = '0.9 0.9 0.9';
                    $mpdf->WriteHTML($formcontent,2);
                    $formPDF = $mpdf->Output('./../pdfs/tcs-request-for-course-evaluation-and-ceu-assignment-form-pdfs/tcs-request-for-course-evaluation-and-ceu-assignment-form-'.$contactName.'-'.time().'.pdf','F');
    
                    $formPDFMail = $mpdf->Output('tcs-request-for-course-evaluation-and-ceu-assignment-form-'.$contactName.'-'.time().'.pdf','S');

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
        $response['message'] = 'Please fill all the mandatory fields (sponsoringOrganization, contactName, company, address1, city, state, zipCode, email, phoneNumber, coursetitle, location, startDate, endDate, evaluatedPreviously, maintenanceOfAWaterSystemBrief, waterworksOperatorsInfluenceBrief, attendanceMonitor).';
    }
}
// Return response 
echo json_encode($response);
?>