/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $(".demoInputBox").css('background-color', '');
    $(".info").html('');
    $("#Contact_success").hide();
    $("#form").on('submit',(function(e) {
        e.preventDefault();
        if ($("#firstName").val() == '') {
            $("#firstName-info").html("(First Name Required)");
            $("#firstName").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#firstName-info").html("");
        }
        if ($("#lastName").val() == '') {
            $("#lastName-info").html("(Last Name Required)");
            $("#lastName").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#lastName-info").html("");
        }
        if ($("#emailAddress").val() == '') {
            $("#emailAddress-info").html("(Email Address Required)");
            $("#emailAddress").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#emailAddress-info").html("");
        }

        if (!$("#emailAddress").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
            $("#emailAddress-info").html("(Invalid Email. Please Enter Valid Email Address)");
            $("#emailAddress").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#emailAddress-info").html("");
        }


        if (!$("#mobileNumber").val()) {
            $("#mobileNumber-info").html("(Mobile Number Required)");
            $("#mobileNumber").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#mobileNumber-info").html("");
        }
        if (!$("#experience").val()) {
            $("#experience-info").html("(Experience Required)");
            $("#experience").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#experience-info").html("");
        }

        if (!$("#upload").val()) {
            $("#upload-info").html("(Upload Resume Required)");
            $("#upload").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#upload-info").html("");
        }

      
        if (!$("#message").val()) {
            $("#message-info").html("(Message Required)");
            $("#message").css('background-color', '#FFFFDF');
            return false;
        } else {
            $("#message-info").html("");
        }
        jQuery.ajax({
            /*url: "careers_mail.php",
            data: 'firstName=' + $("#firstName").val() + 'lastName=' + $("#lastName").val()  + '&emailAddress=' + $("#emailAddress").val() + '&mobileNumber=' + $("#mobileNumber").val() + '&message=' + $("#message").val(),
            type: "POST",*/
            url: "careers_mail.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function (data) {
                var str1 = data;
                var str2 = "Message was Successfully Sent";
                if (str1.indexOf(str2) != -1) {
                    $("#Contact_success").show();
                    $("#mail-status").addClass('mail-success');
                    $("#mail-status").html(str2);
                    $("#form").hide();
                }else{
                    $("#mail-status").addClass('mail-error');
                    $("#mail-status").html("Error in Sending Email");
                    $("#form").hide();
					$("#Contact_success").show();
                }  
            },
            error: function () {}
        });
    }));

	$("#clear_form_data").click(function(){
        $("#firstName").val('');
        $("#lastName").val('');
        $("#emailAddress").val('');
        $("#mobileNumber").val('');
        $("#experience").val('');
        $("#upload").val('');
		$("#message").val('');
		
	});
	
	$("#back_contact_form").click(function(){
		$("#form").show();
		$("#Contact_success").hide();
        $("#firstName").val('');
        $("#lastName").val('');
        $("#emailAddress").val('');
        $("#mobileNumber").val('');
        $("#experience").val('');
        $("#upload").val('');
		$("#message").val('');
		
	});
    return  false;
});