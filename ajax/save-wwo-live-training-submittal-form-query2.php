<?php
//error_reporting(0);
//include_once 'db.php'; //include the DB config file
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
require_once __DIR__ . './../vendor/autoload.php';
// print_r($_POST);
// die;
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/Exception.php';
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
// require '/wp-content/themes/bento-child/vendor/PHPMailer/PHPMailer/src/SMTP.php';

//Load Composer's autoloader
// require '/wp-content/themes/bento-child/vendor/autoload.php';
// $mail = new PHPMailer(true);

// $response = array(
//     'status' => 0,
//     'message' => 'Form submission failed, please try again.'
// );

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
$creditAwardedCourseSponsor = $_POST['creditAwardedCourseSponsor'];

$certificateofCompletion = $_POST['certificateofCompletion'];
$courseDescriptionOutline = $_POST['courseDescriptionOutline'];
$addressDetails = $_POST['addressDetails'];
$courseTimeSchedule = $_POST['courseTimeSchedule'];
$attendanceMonitoring = $_POST['attendanceMonitoring'];

$mpdf = new \Mpdf\Mpdf();

$formdata = '';
$formdata .= '<table style="border-color: #666; width: 100%; border: 1px solid;" cellpadding="10" width="100%" border="1">';
$formdata .= '<tr style="background: #eee;"><td colspan="2"><strong>Washington Certification Services Contact Query</strong></td></tr>';
$formdata .= '<tr><td><strong>firstName</strong> </td><td>' . $firstName . '</td></tr>';
$formdata .= '<tr><td><strong>lastName</strong> </td><td>' . $lastName . '</td></tr>';
$formdata .= '<tr><td><strong>homeAddress1</strong> </td><td>' . $homeAddress1 . '</td></tr>';
$formdata .= '<tr><td><strong>homeAddress2</strong> </td><td>' . $homeAddress2 . '</td></tr>';
$formdata .= '<tr><td><strong>city</strong> </td><td>' . $city . '</td></tr>';

$formdata .= '<tr><td><strong>state</strong> </td><td>' . $state . '</td></tr>';
$formdata .= '<tr><td><strong>zipCode</strong> </td><td>' . $zipCode . '</td></tr>';
$formdata .= '<tr><td><strong>email</strong> </td><td>' . $email . '</td></tr>';
$formdata .= '<tr><td><strong>homePhoneNumber</strong> </td><td>' . $homePhoneNumber . '</td></tr>';
$formdata .= '<tr><td><strong>operatorCertificationNumber</strong> </td><td>' . $operatorCertificationNumber . '</td></tr>';

$formdata .= '<tr><td><strong>courseTitle</strong> </td><td>' . $courseTitle . '</td></tr>';
$formdata .= '<tr><td><strong>courseSponsor</strong> </td><td>' . $courseSponsor . '</td></tr>';
$formdata .= '<tr><td><strong>courseCompletionDate</strong> </td><td>' . $courseCompletionDate . '</td></tr>';
$formdata .= '<tr><td><strong>location</strong> </td><td>' . $location . '</td></tr>';
$formdata .= '<tr><td><strong>creditAwardedCourseSponsor</strong> </td><td>' . $creditAwardedCourseSponsor . '</td></tr>';

$formdata .= '<tr><td><strong>certificateofCompletion</strong> </td><td>' . $certificateofCompletion . '</td></tr>';
$formdata .= '<tr><td><strong>courseDescriptionOutline</strong> </td><td>' . $courseDescriptionOutline . '</td></tr>';
$formdata .= '<tr><td><strong>addressDetails</strong> </td><td>' . $addressDetails . '</td></tr>';
$formdata .= '<tr><td><strong>courseTimeSchedule</strong> </td><td>' . $courseTimeSchedule . '</td></tr>';
$formdata .= '<tr><td><strong>attendanceMonitoring</strong> </td><td>' . $attendanceMonitoring . '</td></tr>';

$formdata .= '</table>';

$data .= '<h1>Your Details</h1>';
$data .= '<h3>Name: </h3>' . $firstName . ' ' . $lastName;





// $mpdf->WriteHTML('<h1>Hello world!</h1>');
$mpdf->WriteHTML($formdata);

$mpdf->Output('sample.pdf','D');
// $response['status'] = 1;
//                     $response['message'] = 'Contact Request submitted successfully !!';
                    
// echo json_encode($response);
?>