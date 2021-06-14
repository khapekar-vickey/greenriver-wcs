 jQuery(document).ready(function ($) {

 	jQuery('.responsive').slick({
 		dots: true,
 		infinite: false,
 		speed: 300,
 		slidesToShow: 5,
 		slidesToScroll: 1,
 		responsive: [{
 				breakpoint: 1024,
 				settings: {
 					slidesToShow: 3,
 					slidesToScroll: 3,
 					infinite: true,
 					dots: true
 				}
 			}, {
 				breakpoint: 600,
 				settings: {
 					slidesToShow: 2,
 					slidesToScroll: 2
 				}
 			}, {
 				breakpoint: 480,
 				settings: {
 					slidesToShow: 1,
 					slidesToScroll: 1
 				}
 			}
 			// You can unslick at a given breakpoint now by adding:
 			// settings: "unslick"
 			// instead of a settings object
 		]
 	});
 	//alert('hi');
 	jQuery("body.home .site-header.no-fixed-header").css("background-color", "transparent");
 	//jQuery("body.home .logo.clear .logo-image-link img").attr("src","http://ptgcms.azurewebsites.net/wp-content/uploads/2019/10/people-tech-logo-white.png");
 	jQuery("body.home .logo.clear .logo-image-link img").attr("src", "wp-content/uploads/2019/10/people-tech-logo-white.png");

 	jQuery("body.home .primary-menu li.menu-item a span").css("color", "#fff");
 	jQuery("body.home .primary-menu li.menu-item .sub-menu li a span").css("color", "#535353");
 	jQuery("body.home .primary-menu > .menu-item-has-children > a:after").css("color", "#fff");
 	jQuery(window).scroll(function (event) {
 		var scroll = jQuery(window).scrollTop();
 		if (scroll >= 187) {
 			jQuery("body.home .site-header.no-fixed-header").css("background-color", "#fff");
 			//jQuery("body.home .logo.clear .logo-image-link img").attr("src","http://ptgcms.azurewebsites.net/wp-content/uploads/2019/10/logo.png");
 			jQuery("body.home .logo.clear .logo-image-link img").attr("src", "wp-content/uploads/2019/10/logo.png");
 			jQuery(".primary-menu li.menu-item a span").css("color", "#535353");
 			jQuery("body.home .primary-menu > .menu-item-has-children > a:after").css("color", "#535353");
 		} else if (scroll < 187) {
 			jQuery("body.home .site-header.no-fixed-header").css("background-color", "transparent");
 			//jQuery("body.home .logo.clear .logo-image-link img").attr("src","http://ptgcms.azurewebsites.net/wp-content/uploads/2019/10/people-tech-logo-white.png");
 			jQuery("body.home .logo.clear .logo-image-link img").attr("src", "wp-content/uploads/2019/10/people-tech-logo-white.png");

 			jQuery("body.home .primary-menu li.menu-item a span").css("color", "#fff");
 			jQuery("body.home .primary-menu li.menu-item .sub-menu li a span").css("color", "#535353");
 			jQuery("body.home .primary-menu > .menu-item-has-children > a:after").css("color", "#fff");
 		}
 		//console.log(scroll);
 		// Do something
 	});

 	jQuery(window).scroll(function (event) {
 		var scroll = jQuery(window).scrollTop();
 		if (scroll >= 3089) {
 			jQuery(".reveal").addClass("show");
 		} //else if (scroll < 3089){
 		//jQuery(".reveal").css("visibility","hidden");
 		//}
 		//console.log(scroll);
 		// Do something
 	});


 	// Scroll to the correct position for hash URLs
 	if (window.location.hash) {
 		var bento_cleanhash = window.location.hash.substr(1);
 		if ($str('#' + bento_cleanhash).length) {
 			var bento_headerHeight = 0;
 			//var bento_headerHeight = 108;
 			if (bentoThemeVars.fixed_menu == 1) {
 				bento_headerHeight = $str('.site-header').outerHeight(true);
 				//bento_headerHeight = 108;
 				alert(bento_headerHeight);
 			}
 			scrollPosition = $str('#' + bento_cleanhash).offset().top - bento_headerHeight - 10;
 			scrollPosition = scrollPosition + 30;
 			$str('html, body').animate({
 				scrollTop: scrollPosition
 			}, 1);
 		}
 	}

 	$("#submitJob").click(function (e) {
 		var postid = $("#jobid").val();

 		if ($("#firstname").val() == '') {
 			$("#firstname-info").html("(First Name Required)");
 			//$("#firstname").css('background-color', '#FFFFDF');
 			return false;
 		} else {
 			$("#firstname-info").html("");
 		}
 		if ($("#lastname").val() == '') {
 			$("#lastname-info").html("(Last Name Required)");
 			//$("#lastname").css('background-color', '#FFFFDF');
 			return false;
 		} else {
 			$("#lastname-info").html("");
 		}
 		if (!$("#email").val()) {
 			$("#email-info").html("(Email Required)");
 			//$("#email").css('background-color', '#FFFFDF');
 			return false;
 		} else {
 			$("#email-info").html("");
 		}
 		if (!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
 			$("#email-info").html("(Please Enter Valid Email)");
 			//$("#email").css('background-color', '#FFFFDF');
 			return false;
 		} else {
 			$("#email-info").html("");
 		}
 		if (!$("#mobile").val()) {
 			$("#mobile-info").html("(Mobile Required)");
 			//$("#mobile").css('background-color', '#FFFFDF');
 			return false;
 		} else {
 			$("#mobile-info").html("");
 		}
 		//var yearvalidation = $("#year");
 		var yearvalidation = $('#year').find(":selected");
 		if (yearvalidation.val() == "") {
 			//if ($("#year").val() == "") {
 			$("#year-info").html("(Year Required)");
 			//$("#year").css('background-color', '#FFFFDF');
 			return false;
 		} else {
 			$("#year-info").html("");
 		}
 		var monthvalidation = $('#month').find(":selected");
 		if (monthvalidation.val() == "") {
 			//if ($("#month").val() == "") {
 			$("#month-info").html("(Month Required)");
 			//$("#month").css('background-color', '#FFFFDF');
 			return false;
 		} else {
 			$("#month-info").html("");
 		}

 		var ext = $('#resume').val().split('.').pop().toLowerCase();
 		var filesize = file_data = jQuery('#resume').prop('files')[0];

 		if (!$("#resume").val()) {
 			$("#resume-info").html("(Resume Required)");
 			//$("#resume").css('background-color', '#FFFFDF');
 			return false;
 		} else if ($.inArray(ext, ['doc', 'docx', 'pdf', 'odt']) == -1) {
 			$("#resume-info").html("(invalid File Type Selected!)");
 			return false;
 		} else if (filesize.size >= 5000000) {
 			$("#resume-info").html("(Filesize must be < 5MB!)");
 			return false;
 		} else {
 			$("#resume-info").html("");
 		}
 		if (!$("#message").val()) {
 			$("#message-info").html("(Message Required)");
 			//$("#message").css('background-color', '#FFFFDF');
 			return false;
 		} else {
 			$("#message-info").html("");
 		}
 		// var resumedata = $("#resume");
 		// console.log(resumedata, 'formData');
 		// return false;

 		//var file = $('#resume')[0].files[0];

 		/*var form = $('#form')[0]; // You need to use standard javascript object here
 		var fd = new FormData(form);
 		var file_data = $('#resume'); // for multiple files
 		fd.append("file_", file_data);
 		console.log(fd, 'fd');
 		return false;
 		var other_data = $('form').serializeArray();
 		$.each(other_data, function (key, input) {
 			fd.append(input.name, input.value);
 		});
 		console.log(fd, 'fd');
 		return false;*/
 		var file_data = jQuery('#resume').prop('files')[0];
 		var form_data = new FormData();
 		form_data.append('file', file_data);
 		form_data.append('jobid', postid);
 		form_data.append('firstname', $("#firstname").val());
 		form_data.append('lastname', $("#lastname").val());
 		form_data.append('email', $("#email").val());
 		form_data.append('mobile', $("#mobile").val());
 		form_data.append('year', $("#year").val());
 		form_data.append('month', $("#month").val());
 		form_data.append('message', $("#message").val());

 		/*	working
		 var file = $('#resume')[0].files[0];
 		console.log(file, 'formData');
		 return false;
		 */


 		/*var fd = new FormData();
 		fd.append('theFile', file);
 		console.log(file, 'formData');
 		return false;*/

 		var image = "../wp-content/uploads/loader.gif";

 		$('#loading-' + postid).html("<img src='" + image + "' style='width:40px;height:40px;'/>");
 		/* Ajax method to save the Job Data into Database and Send an email to the Administrator as well as User regarding the Job Application Status*/
 		jQuery.ajax({
 			url: "../wp-admin/jobapplication.php",
 			//data: 'firstname=' + $("#firstname").val() + '&lastname=' + $("#lastname").val() + '&email=' + $("#email").val() + '&mobile=' + $("#mobile").val() + '&year=' + $("#year").val() + '&month=' + $("#month").val() + '&resume=' + file + '&message=' + $("#message").val() + '&jobid=' + postid,
 			type: 'post',
 			contentType: false,
 			processData: false,
 			data: form_data,
 			success: function (data) {
 				console.log(data, 'data');
 				var str1 = data;
 				var str2 = "Message was Successfully Sent";
 				if (str1.indexOf(str2) != -1) {
 					$('#loading-' + postid).html("").hide();
 					$("#mail-status-" + postid).addClass('text-success');
 					$("#mail-status-" + postid).html(" - Applied Successfully");
 					$("#firstname").val("");
 					$("#lastname").val("");
 					$("#email").val("");
 					$("#mobile").val("");
 					$("#year").val("");
 					$("#month").val("");
 					$("#resume").val("");
 					$("#message").val("");
 				} else {
 					$("#mail-status-" + postid).addClass('text-danger');
 					$('#loading-' + postid).hide();
 					$("#mail-status-" + postid).html("Registration Error");
 				}
 			},
 			error: function () {}
 		});
 		/* Ajax method to save the Job Data into Database and Send an email to the Administrator as well as User regarding the Job Application Status*/

 	});

 	$("#resetbtn").click(function () {
 		$("#firstname-info").html("");
 		$("#lastname-info").html("");
 		$("#email-info").html("");
 		$("#mobile-info").html("");
 		$("#year-info").html("");
 		$("#month-info").html("");
 		$("#resume-info").html("");
 		$("#message-info").html("");
 	});

 	/*On Change Resume*/
 	$("#resume").change(function () {
 		var filesize = (this.files[0].size);
 		var ext = $('#resume').val().split('.').pop().toLowerCase();
 		if ($.inArray(ext, ['doc', 'docx', 'pdf', 'odt']) == -1) {
 			$("#resume-info").html("(invalid File Type Selected!)");
 			return false;
 		} else if (filesize >= 5000000) {
 			$("#resume-info").html("(Filesize must be < 5MB!)");
 			return false;
 		} else {
 			$("#resume-info").html("");
 		}
 	});
 	/*On Change Resume*/


 	/*On Change Country Dropdown*/
 	$("#country-select").change(function () {
 		var countryval = $("#country-select").val();
 		//document.cookie = "var1=" + countryval;
 		/* Filter Redmond Jobs */
 		jQuery.ajax({
 			url: "../wp-admin/filterredmondjobs.php",
 			data: 'countryval=' + countryval,
 			type: 'post',
 			success: function (data) {
 				console.log(data);
 				$("#filterdiv").show();
 				$("#nonfilterdiv").hide();
 				$("#showfilterdata").html(data);

 				// Filter Non Redmond Jobs 
 				// jQuery.ajax({
 				// 	url: "../wp-admin/filternonredmondjobs.php",
 				// 	data: 'countryval=' + countryval,
 				// 	type: 'post',
 				// 	success: function (data) {
 				// 		console.log(data, 'data');
 				// 	},
 				// 	error: function () {}
 				// });
 				// Filter Non Redmond Jobs 

 			},
 			error: function () {}
 		});
 		// Filter Redmond Jobs 
 		//alert(countryval);
 	});
 	/*On Change Country Dropdown*/


 });

 function openpopup(postid) {
 	document.getElementById("jobid").value = postid;
 }