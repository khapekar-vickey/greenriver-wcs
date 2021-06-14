<?php
error_reporting(0);
include_once 'db.php'; //include the DB config file
// print_r($_POST);
// die;
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/Exception.php';
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require '/wp-content/themes/bento-child/vendor/autoload.php';
// $mail = new PHPMailer(true);
//print_r('before mpdf');
require_once './../wp-content/themes/bento-child/vendor/autoload.php';
//print_r('after mpdf');
$response = array(
    'status' => 'failure',
    'message' => 'Form submission failed, please try again.'
);
//print_r('after fail msg');
// If form is submitted
if ( isset($_POST['coursetitle']) || isset($_POST['locationOfTrainingCity']) || isset($_POST['attachAddressProof']) || isset($_POST['dateOfTraining']) || isset($_POST['ceuIdNumber']) || isset($_POST['dateOfceuAssignment']) || isset($_POST['ceuAssigned']) || isset($_POST['sponsoringOrganization']) || isset($_POST['contactName']) || isset($_POST['company']) || isset($_POST['address1']) || isset($_POST['address2']) || isset($_POST['city']) || isset($_POST['state']) || isset($_POST['zipCode']) || isset($_POST['email']) || isset($_POST['phoneNumber']) ) {



    // Get the submitted form data  via $_POST Array
    //print_r("Inside iSet");

        $coursetitle = $_POST['coursetitle'];
        $locationOfTrainingCity = $_POST['locationOfTrainingCity'];
        $attachAddressProof = $_POST['attachAddressProof'];
        $dateOfTraining = $_POST['dateOfTraining'];
        $ceuIdNumber = $_POST['ceuIdNumber'];
        $dateOfceuAssignment = $_POST['dateOfceuAssignment'];
        $ceuAssigned = $_POST['ceuAssigned'];
        $sponsoringOrganization = $_POST['sponsoringOrganization'];
        $contactName = $_POST['contactName'];
        $company = $_POST['company'];
        $address1 = $_POST['address1'];
        $address2 = $_POST['address2'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipCode = $_POST['zipCode'];
        $email = $_POST['email'];
        $phoneNumber =$_POST['phoneNumber'];
        $participantsFirstName1 = $_POST['participantsFirstName1'];
        $participantsLastName1 = $_POST['participantsLastName1'];
        $participantsWaterCertificationNumber1 = $_POST['participantsWaterCertificationNumber1'];
        $participantsCEUAwarded1 = $_POST['participantsCEUAwarded1'];
        $participantsFirstName2 = $_POST['participantsFirstName2'];
        $participantsLastName2 = $_POST['participantsLastName2'];
        $participantsWaterCertificationNumber2 = $_POST['participantsWaterCertificationNumber2'];
        $participantsCEUAwarded2 = $_POST['participantsCEUAwarded2'];
        $participantsFirstName3 = $_POST['participantsFirstName3'];
        $participantsLastName3 = $_POST['participantsLastName3'];
        $participantsWaterCertificationNumber3 = $_POST['participantsWaterCertificationNumber3'];
        $participantsCEUAwarded3 = $_POST['participantsCEUAwarded3'];
        $participantsFirstName4 = $_POST['participantsFirstName4'];
        $participantsLastName4 = $_POST['participantsLastName4'];
        $participantsWaterCertificationNumber4 = $_POST['participantsWaterCertificationNumber4'];
        $participantsCEUAwarded4 = $_POST['participantsCEUAwarded4'];
        $participantsFirstName5 = $_POST['participantsFirstName5'];
        $participantsLastName5 = $_POST['participantsLastName5'];
        $participantsWaterCertificationNumber5 = $_POST['participantsWaterCertificationNumber5'];
        $participantsCEUAwarded5 = $_POST['participantsCEUAwarded5'];
        $participantsFirstName6 = $_POST['participantsFirstName6'];
        $participantsLastName6 = $_POST['participantsLastName6'];
        $participantsWaterCertificationNumber6 = $_POST['participantsWaterCertificationNumber6'];
        $participantsCEUAwarded6 = $_POST['participantsCEUAwarded6'];
        $participantsFirstName7 = $_POST['participantsFirstName7'];
        $participantsLastName7 = $_POST['participantsLastName7'];
        $participantsWaterCertificationNumber7 = $_POST['participantsWaterCertificationNumber7'];
        $participantsCEUAwarded7 = $_POST['participantsCEUAwarded7'];
        $participantsFirstName8 = $_POST['participantsFirstName8'];
        $participantsLastName8 = $_POST['participantsLastName8'];
        $participantsWaterCertificationNumber8 = $_POST['participantsWaterCertificationNumber8'];
        $participantsCEUAwarded8 = $_POST['participantsCEUAwarded8'];
        $participantsFirstName9 = $_POST['participantsFirstName9'];
        $participantsLastName9 = $_POST['participantsLastName9'];
        $participantsWaterCertificationNumber9 = $_POST['participantsWaterCertificationNumber9'];
        $participantsCEUAwarded9 = $_POST['participantsCEUAwarded9'];
        $participantsFirstName10 = $_POST['participantsFirstName10'];
        $participantsLastName10 = $_POST['participantsLastName10'];
        $participantsWaterCertificationNumber10 = $_POST['participantsWaterCertificationNumber10'];
        $participantsCEUAwarded10 = $_POST['participantsCEUAwarded10'];
        $participantsFirstName11 = $_POST['participantsFirstName11'];
        $participantsLastName11 = $_POST['participantsLastName11'];
        $participantsWaterCertificationNumber11 = $_POST['participantsWaterCertificationNumber11'];
        $participantsCEUAwarded11 = $_POST['participantsCEUAwarded11'];
        $participantsFirstName12 = $_POST['participantsFirstName12'];
        $participantsLastName12 = $_POST['participantsLastName12'];
        $participantsWaterCertificationNumber12 = $_POST['participantsWaterCertificationNumber12'];
        $participantsCEUAwarded12 = $_POST['participantsCEUAwarded12'];


    $mpdf = new \Mpdf\Mpdf();

    // Check whether submitted data is not empty 
    if (!empty($_POST['coursetitle']) && !empty($_POST['locationOfTrainingCity']) && !empty($_POST['attachAddressProof']) && !empty($_POST['dateOfTraining']) && !empty($_POST['ceuIdNumber']) && !empty($_POST['dateOfceuAssignment']) && !empty($_POST['ceuAssigned']) && !empty($_POST['sponsoringOrganization']) && !empty($_POST['contactName']) && !empty($_POST['company']) && !empty($_POST['address1']) && !empty($_POST['city']) && !empty($_POST['state']) && !empty($_POST['zipCode']) && !empty($_POST['email']) && !empty($_POST['phoneNumber'])) {
       //print_r("Inside Condition");
        // Validate email 
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $response['message'] = 'Please enter a valid email.';
          //print_r("Inside If");
        } else {
           // print_r("Inside Else");
             $check_email_exist = $db->query("select * from tcs_professional_growth_training_roster_form where email = '$email'");
            //print_r('Check Email');
            // die;
            if ($check_email_exist->num_rows > 0) {
                $response = array(
                    'status' => 'failure',
                    'message' => 'Email Already Exists. Please fill up with different Email.'
                );
            } else {

                if ( $attachAddressProof == 'true' ){
                    $attachAddressProof = 1;
                }
                else {
                    $attachAddressProof = 0;
                }
                
                //Insert record
                $insert = $db->query("INSERT INTO tcs_professional_growth_training_roster_form (coursetitle, locationOfTrainingCity, attachAddressProof, dateOfTraining, ceuIdNumber, dateOfceuAssignment, ceuAssigned, sponsoringOrganization, contactName, company, address1, address2, city, state, zipCode, email, phoneNumber, participantsFirstName1,  participantsLastName1,  participantsWaterCertificationNumber1,  participantsCEUAwarded1,  participantsFirstName2,  participantsLastName2,  participantsWaterCertificationNumber2,  participantsCEUAwarded2,  participantsFirstName3,  participantsLastName3,  participantsWaterCertificationNumber3,  participantsCEUAwarded3,  participantsFirstName4,  participantsLastName4,  participantsWaterCertificationNumber4,  participantsCEUAwarded4,  participantsFirstName5,  participantsLastName5,  participantsWaterCertificationNumber5,  participantsCEUAwarded5,  participantsFirstName6,  participantsLastName6,  participantsWaterCertificationNumber6,  participantsCEUAwarded6,  participantsFirstName7,  participantsLastName7,  participantsWaterCertificationNumber7,  participantsCEUAwarded7,  participantsFirstName8,  participantsLastName8,  participantsWaterCertificationNumber8,  participantsCEUAwarded8,  participantsFirstName9,  participantsLastName9,  participantsWaterCertificationNumber9,  participantsCEUAwarded9,  participantsFirstName10,  participantsLastName10,  participantsWaterCertificationNumber10,  participantsCEUAwarded10,  participantsFirstName11,  participantsLastName11,  participantsWaterCertificationNumber11,  participantsCEUAwarded11,  participantsFirstName12,  participantsLastName12,  participantsWaterCertificationNumber12,  participantsCEUAwarded12)VALUES(
                    '" .$coursetitle. "', '" .$locationOfTrainingCity. "', '" .$attachAddressProof. "', '" .$dateOfTraining. "', '" .$ceuIdNumber. "', '" .$dateOfceuAssignment. "', '" .$ceuAssigned. "', '" .$sponsoringOrganization. "', '" .$contactName. "', '" .$company. "', '" .$address1. "', '" .$address2. "', '" .$city. "', '" .$state. "', '" .$zipCode. "', '" .$email. "', '" .$phoneNumber. "', '" .$participantsFirstName1. "', '" .$participantsLastName1. "', '" .$participantsWaterCertificationNumber1. "', '" .$participantsCEUAwarded1. "', '" .$participantsFirstName2. "', '" .$participantsLastName2. "', '" .$participantsWaterCertificationNumber2. "', '" .$participantsCEUAwarded2. "', '" .$participantsFirstName3. "', '" .$participantsLastName3. "', '" .$participantsWaterCertificationNumber3. "', '" .$participantsCEUAwarded3. "', '" .$participantsFirstName4. "', '" .$participantsLastName4. "', '" .$participantsWaterCertificationNumber4. "', '" .$participantsCEUAwarded4. "', '" .$participantsFirstName5. "', '" .$participantsLastName5. "', '" .$participantsWaterCertificationNumber5. "', '" .$participantsCEUAwarded5. "', '" .$participantsFirstName6. "', '" .$participantsLastName6. "', '" .$participantsWaterCertificationNumber6. "', '" .$participantsCEUAwarded6. "', '" .$participantsFirstName7. "', '" .$participantsLastName7. "', '" .$participantsWaterCertificationNumber7. "', '" .$participantsCEUAwarded7. "', '" .$participantsFirstName8. "', '" .$participantsLastName8. "', '" .$participantsWaterCertificationNumber8. "', '" .$participantsCEUAwarded8. "', '" .$participantsFirstName9. "', '" .$participantsLastName9. "', '" .$participantsWaterCertificationNumber9. "', '" .$participantsCEUAwarded9. "', '" .$participantsFirstName10. "', '" .$participantsLastName10. "', '" .$participantsWaterCertificationNumber10. "', '" .$participantsCEUAwarded10. "', '" .$participantsFirstName11. "', '" .$participantsLastName11. "', '" .$participantsWaterCertificationNumber11. "', '" .$participantsCEUAwarded11. "', '" .$participantsFirstName12. "', '" .$participantsLastName12. "', '" .$participantsWaterCertificationNumber12. "', '" .$participantsCEUAwarded12. "')");

             
                        //print_r($insert);
                        //  die;

                if ($insert) {
                    $formcontent = '';
                    $formcontent .= '<table rules="all" style="border-color: #666; width:100%; border: 1px solid;" cellpadding="10" width="100%" border="1">';
                    $formcontent .= '<tr style="background: #eee;"><td colspan="2"><strong>Washington Certification Services Contact Query</strong></td></tr>';
                    $formcontent .= '<tr><td><strong>coursetitle</strong> </td><td>' . $coursetitle . '</td></tr>';
                    $formcontent .= '<tr><td><strong>locationOfTrainingCity</strong> </td><td>' . $locationOfTrainingCity . '</td></tr>';
                    $formcontent .= '<tr><td><strong>attachAddressProof</strong> </td><td>' . $attachAddressProof . '</td></tr>';
                    $formcontent .= '<tr><td><strong>dateOfTraining</strong> </td><td>' . $dateOfTraining . '</td></tr>';
                    $formcontent .= '<tr><td><strong>ceuIdNumber</strong> </td><td>' . $ceuIdNumber . '</td></tr>';

                    $formcontent .= '<tr><td><strong>dateOfceuAssignment</strong> </td><td>' . $dateOfceuAssignment . '</td></tr>';
                    $formcontent .= '<tr><td><strong>ceuAssigned</strong> </td><td>' . $ceuAssigned . '</td></tr>';
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


                    $formcontent .= '<tr><td><strong>participantsFirstName1</strong> </td><td>' . $participantsFirstName1 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName1</strong> </td><td>' . $participantsLastName1 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber1</strong> </td><td>' . $participantsWaterCertificationNumber1 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded1</strong> </td><td>' . $participantsCEUAwarded1 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName2</strong> </td><td>' . $participantsFirstName2 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName2</strong> </td><td>' . $participantsLastName2 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber2</strong> </td><td>' . $participantsWaterCertificationNumber2 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded2</strong> </td><td>' . $participantsCEUAwarded2 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName3</strong> </td><td>' . $participantsFirstName3 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName3</strong> </td><td>' . $participantsLastName3 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber3</strong> </td><td>' . $participantsWaterCertificationNumber3 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded3</strong> </td><td>' . $participantsCEUAwarded3 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName4</strong> </td><td>' . $participantsFirstName4 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName4</strong> </td><td>' . $participantsLastName4 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber4</strong> </td><td>' . $participantsWaterCertificationNumber4 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded4</strong> </td><td>' . $participantsCEUAwarded4 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName5</strong> </td><td>' . $participantsFirstName5 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName5</strong> </td><td>' . $participantsLastName5 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber5</strong> </td><td>' . $participantsWaterCertificationNumber5 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded5</strong> </td><td>' . $participantsCEUAwarded5 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName6</strong> </td><td>' . $participantsFirstName6 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName6</strong> </td><td>' . $participantsLastName6 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber6</strong> </td><td>' . $participantsWaterCertificationNumber6 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded6</strong> </td><td>' . $participantsCEUAwarded6 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName7</strong> </td><td>' . $participantsFirstName7 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName7</strong> </td><td>' . $participantsLastName7 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber7</strong> </td><td>' . $participantsWaterCertificationNumber7 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded7</strong> </td><td>' . $participantsCEUAwarded7 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName8</strong> </td><td>' . $participantsFirstName8 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName8</strong> </td><td>' . $participantsLastName8 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber8</strong> </td><td>' . $participantsWaterCertificationNumber8 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded8</strong> </td><td>' . $participantsCEUAwarded8 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName9</strong> </td><td>' . $participantsFirstName9 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName9</strong> </td><td>' . $participantsLastName9 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber9</strong> </td><td>' . $participantsWaterCertificationNumber9 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded9</strong> </td><td>' . $participantsCEUAwarded9 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName10</strong> </td><td>' . $participantsFirstName10 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName10</strong> </td><td>' . $participantsLastName10 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber10</strong> </td><td>' . $participantsWaterCertificationNumber10 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded10</strong> </td><td>' . $participantsCEUAwarded10 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName11</strong> </td><td>' . $participantsFirstName11 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName11</strong> </td><td>' . $participantsLastName11 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber11</strong> </td><td>' . $participantsWaterCertificationNumber11 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded11</strong> </td><td>' . $participantsCEUAwarded11 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsFirstName12</strong> </td><td>' . $participantsFirstName12 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsLastName12</strong> </td><td>' . $participantsLastName12 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsWaterCertificationNumber12</strong> </td><td>' . $participantsWaterCertificationNumber12 . '</td></tr>'; 
                    $formcontent .= '<tr><td><strong>participantsCEUAwarded12</strong> </td><td>' . $participantsCEUAwarded12 . '</td></tr>'; 
              

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
                    $formPDF = $mpdf->Output('./../pdfs/tcs-professional-growth-training-roster-form-pdfs/tcs-professional-growth-training-roster-form-'.$contactName.'-'.time().'.pdf','F');
    
                    $formPDFMail = $mpdf->Output('tcs-professional-growth-training-roster-form-'.$contactName.'-'.time().'.pdf','S');

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
        $response['message'] = 'Please fill all the mandatory fields (coursetitle, locationOfTrainingCity, attachAddressProof, dateOfTraining, ceuIdNumber, dateOfceuAssignment, ceuAssigned, sponsoringOrganization, contactName, company, address1, city, state, zipCode, email, phoneNumber).';
    }
}
// Return response 
echo json_encode($response);
?>