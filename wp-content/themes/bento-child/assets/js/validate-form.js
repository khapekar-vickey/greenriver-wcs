/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function ($) {
    'use strict';
$(document).ready(function () {
    $("#submit").click(function () {
        
        if ($("#studentName").val() == '') {
            $("#studentName-info").html("(Student Name Required)");
            $("#studentName").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#studentName-info").html("");
        }

        if (!$("#courseTitle").val()) {
            $("#courseTitle-info").html("(Course Title Required)");
            $("#courseTitle").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#courseTitle-info").html("");
        }
        /*if (!$("#emailAddress").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
            $("#emailAddress-info").html("(Invalid Email. Please Enter Valid Email)");
            $("#emailAddress").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#emailAddress-info").html("");
        }*/
        if (!$("#courseSponser").val()) {
            $("#courseSponser-info").html("(Course Sponser Required)");
            $("#courseSponser").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#courseSponser-info").html("");
        }

        //if (!$("#month").val()) {
        //    $("#month-info").html("(Month Required)");
        //    $("#month").css('background-color', '#FFFFDF');
        //    return false;
        //} else {
        //    $("#month-info").html("");
        //} 
        if (!$("#date").val()) {
            $("#date-info").html("(Date Required)");
            $("#date").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#date-info").html("");
        }
        //if (!$("#year").val()) {
        //    $("#year-info").html("(Year Required)");
        //    $("#year").css('background-color', '#FFFFDF');
        //    return false;
        //} else {
        //    $("#year-info").html("");
        //}
        if (!$("#examinationLocation").val()) {
            $("#examinationLocation-info").html("(Examination Location Required)");
            $("#examinationLocation").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#examinationLocation-info").html("");
        }
        if (!$("#examMonitorName").val()) {
            $("#examMonitorName-info").html("(Exam Monitor Name Required)");
            $("#examMonitorName").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#examMonitorName-info").html("");
        }
        if (!$("#relationship").val()) {
            $("#relationship-info").html("(Relationship Required)");
            $("#relationship").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#relationship-info").html("");
        }
        if (!$("#examMonitorEmployee").val()) {
            $("#examMonitorEmployee-info").html("(Exam Monitor's Employee Required)");
            $("#examMonitorEmployee").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#examMonitorEmployee-info").html("");
        }
        if (!$("#employerAddress").val()) {
            $("#employerAddress-info").html("(Employer Address Required)");
            $("#employerAddress").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#employerAddress-info").html("");
        }
        if (!$("#city").val()) {
            $("#city-info").html("(City Required)");
            $("#courseSponser").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#city-info").html("");
        }
        if (!$("#state").val()) {
            $("#state-info").html("(State Required)");
            $("#state").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#state-info").html("");
        }
        if (!$("#zipCode").val()) {
            $("#zipCode-info").html("(Zip Code Required)");
            $("#zipCode").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#zipCode-info").html("");
        }
        if (!$("#jobTitle").val()) {
            $("#jobTitle-info").html("(Job Title Required)");
            $("#jobTitle").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#jobTitle-info").html("");
        }
        if (!$("#businessPhone").val()) {
            $("#businessPhone-info").html("(Business Phone Required)");
            $("#businessPhone").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#businessPhone-info").html("");
        }
        if (!$("#studentDecName").val()) {
            $("#studentDecName-info").html("(Student Name Required)");
            $("#studentDecName").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#studentDecName-info").html("");
        }
        if (!$("#wwocertificationNumber").val()) {
            $("#wwocertificationNumber-info").html("(WWO Certification Number Required)");
            $("#wwocertificationNumber").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#wwocertificationNumber-info").html("");
        }
        //alert('dsaada'); return false;
        /*console.log('studentName', $("#studentName").val());
        console.log('courseTitle', $("#courseTitle").val());
        console.log('courseSponser', $("#courseSponser").val());
        console.log('month', $("#month").val());
        console.log('date', $("#date").val());
        console.log('year', $("#year").val());
        console.log('examinationLocation', $("#examinationLocation").val());
        console.log('examMonitorName', $("#examMonitorName").val());
        console.log('relationship', $("#relationship").val());
        console.log('examMonitorEmployee', $("#examMonitorEmployee").val());
        console.log('employerAddress', $("#employerAddress").val());
        console.log('city', $("#city").val());
        console.log('state', $("#state").val());
        console.log('zipCode', $("#zipCode").val());
        console.log('jobTitle', $("#jobTitle").val());
        console.log('businessPhone', $("#businessPhone").val());
        console.log('studentDecName', $("#studentDecName").val());
        console.log('wwocertificationNumber', $("#wwocertificationNumber").val());*/

        //var file_data = jQuery('#resume').prop('files')[0];
        var form_data = new FormData();
        //form_data.append('file', file_data);
        form_data.append('studentName', $("#studentName").val());
        form_data.append('courseTitle', $("#courseTitle").val());
        form_data.append('courseSponser', $("#courseSponser").val());
        //form_data.append('month', $("#month").val());
        form_data.append('date', $("#date").val());
        //form_data.append('year', $("#year").val());
        form_data.append('examinationLocation', $("#examinationLocation").val());
        form_data.append('relationship', $("#relationship").val());
        form_data.append('examMonitorEmployee', $("#examMonitorEmployee").val());
        form_data.append('employerAddress', $("#employerAddress").val());
        form_data.append('city', $("#city").val());
        form_data.append('state', $("#state").val());
        form_data.append('zipCode', $("#zipCode").val());
        form_data.append('jobTitle', $("#jobTitle").val());
        form_data.append('businessPhone', $("#businessPhone").val());
        form_data.append('studentDecName', $("#studentDecName").val());
        form_data.append('wwocertificationNumber', $("#wwocertificationNumber").val());

        var image = "../wp-content/uploads/loader.gif";
        $('#loading').html("<img src='" + image + "' style='width:40px;height:40px;'/>");

        jQuery.ajax({
            url: "../wp-admin/wwo-declaration-of-self-paced-training-examination-monitoring-forms.php",
            //data: 'firstname=' + $("#firstname").val() + '&lastname=' + $("#lastname").val() + '&email=' + $("#email").val() + '&mobile=' + $("#mobile").val() + '&year=' + $("#year").val() + '&month=' + $("#month").val() + '&resume=' + file + '&message=' + $("#message").val() + '&jobid=' + postid,
            type: 'post',
            contentType: false,
            processData: false,
            data: form_data,
            success: function (data) {
                console.log(data, 'data');
                var str1 = data;
                var str2 = "Success";
                //console.log(str1.indexOf(str2), 'str1.indexOf(str2)');
                if (str1.indexOf(str2) == -1) {
                    $('#loading').html("").hide();
                    $("#mail-status").addClass('text-success');
                    $("#mail-status").html("Details Submitted Successfully");
                    $("#studentName").val("");
                    $("#courseTitle").val("");
                    $("#courseSponser").val("");
                    $("#month").val("");
                    $("#date").val("");
                    $("#year").val("");
                    $("#examinationLocation").val("");
                    $("#examMonitorName").val("");
                    $("#employerAddress").val("");
                    $("#city").val("");
                    $("#state").val("");
                    $("#zipcode").val("");
                    $("#jobTitle").val("");
                    $("#businessPhone").val("");
                    $("#studentDecName").val("");
                    $("#wwocertificationNumber").val("");
                } else {
                    $("#mail-status").addClass('text-danger');
                    $('#loading').hide();
                    $("#mail-status").html("Error in submitting your details");
                }
            },
            error: function () { }
        });
    });

	$("#clear_form_data").click(function(){
		$("#fullName").val('');
		$("#emailAddress").val('');
		$("#message").val('');
		
	});
	
	$("#back_contact_form").click(function(){
		$("#Contact-form").show();
		$("#Contact_success").hide();
        $("#fullName").val('');
		$("#emailAddress").val('');
		$("#message").val('');
		
	});
    return  false;
});

})(jQuery)