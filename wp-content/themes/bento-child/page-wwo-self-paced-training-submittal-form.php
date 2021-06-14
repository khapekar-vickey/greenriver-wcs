<?php
/*
  Template Name: WWO Self-Paced Training Submittal Form
 */
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bento
 */
get_header();
?>
<div class="site-main">
    <!-- Banner -->
    <?php if( have_rows('hero_banner') ): ?>
    <div class="container-fluid main-banner mhB-225 banner banner-margin">
        <?php while( have_rows('hero_banner') ): the_row(); 
        $heroBannerBGImg = get_sub_field('hero_banner_background_image');
        $heroBannerTitle = get_sub_field('hero_banner_title');
      ?>
        <div class="banner-img"
            style="background: url('<?php echo $heroBannerBGImg['url']; ?>') no-repeat center/ cover;">
        </div>
        <div class="container">
            <div class="row banner-content mhB-225">
                <div class="page-title-wrap py-4">
                    <h1 class="page-title text-white">
                        <?php if($heroBannerTitle): echo $heroBannerTitle; else: echo get_the_title(); endif; ?></h1>
                </div>
            </div>
        </div>

        <?php endwhile; ?>
    </div><!-- /. Banner -->
    <?php endif; ?>
    <?php $category = get_the_category();
            $category_parent_id = $category[0]->category_parent;
            $category_parent = get_category($category_parent_id);
           ?>

    <!-- Breadcrumb -->
    <div class="container-fluid breadcrumb_outer bg-f5 pt-4 pb-3">
        <div class="container">
            <div class="row breadcrumb_wrap d-flex justify-content-start align-items-center">
                <!-- <span>You are here :</span> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item bold"><a href="<?php echo site_url(); ?>">WCS</a></li>
                        <li class="breadcrumb-item bold"><a
                                href="<?php echo site_url(); ?>/<?php echo $category_parent->slug;?>"><?php echo $category_parent->name;?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo get_the_title();?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- /. Breadcrumb -->

    <!-- Main Content -->
    <div class="container-fluid bg-f5 py-3 px-0">
        <div class="container">
            <div class="row flex-row-reverse text-grey pb-5">
                <div class="col-12 col-md-8 col-lg-9">

                    <?php if( have_rows('wwo-layouts') ): ?>
                    <?php while( have_rows('wwo-layouts') ): the_row(); ?>
                    <?php if( get_row_layout() == 'm01-text_content' ): ?>
                    <?php the_sub_field('content'); ?>

                    <?php elseif( get_row_layout() == 'm02-title' ): 
                    $m02TitleWrapClass = get_sub_field('m02-title_wrap_class');
                    $m02Title = get_sub_field('m02-title');
                    ?>
                    <div
                        class="<?php if($m02TitleWrapClass): echo $m02TitleWrapClass; else: echo 'sec-title-wrap'; endif;?>">
                        <?php //echo $m02Title; ?>
                    </div>

                    <?php elseif( get_row_layout() == 'm03-single_image' ): 
                        $m03SingleImage = get_sub_field('m03-single_image');
                        $m03ImageWrapperClass = get_sub_field('m03-image_wrapper_class');
                        $m03ImageClass = get_sub_field('m03-image_class');
                        ?>
                    <?php if($m03ImageWrapperClass): ?>
                    <div class="<?php echo $m03ImageWrapperClass; ?>">
                        <?php endif; ?>
                        <img class="<?php if($m03ImageClass): echo $m03ImageClass; else: echo 'img-fluid'; endif; ?>"
                            src="<?php echo esc_url( $m03SingleImage['url'] ); ?>"
                            alt="<?php echo esc_attr( $m03SingleImage['alt'] ); ?>" />
                        <?php if($m03ImageWrapperClass): ?>
                    </div>
                    <?php endif; ?>

                    <?php elseif( get_row_layout() == 'm04-include_the_content' ): 
                            $m04isTheContentNeeded = get_sub_field('m04-is_the_content_needed');

                            if($m04isTheContentNeeded == 'yes'):
                                if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <?php the_content(); ?>

                    <?php
                                    endwhile; ?>
                    <?php endif; 

                            endif;
                            ?>

                    <?php elseif( get_row_layout() == 'm05-accordion' ): 
                            $m05AccordionID = get_sub_field('m05-accordion_id');
                            ?>
                    <?php if( have_rows('m05-accordion_items') ): ?>
                    <?php $accItemCount = 1; ?>
                    <div class="prime-accordion"
                        id="<?php if($m05AccordionID): echo $m05AccordionID; else: echo 'accordion-renewal'; endif; ?>">
                        <?php while( have_rows('m05-accordion_items') ): the_row(); 
                                    $M05AccordionTitle = get_sub_field('M05-accordion_title');
                                    $m05AccordionContent = get_sub_field('m05-accordion_content');
                                    ?>
                        <div class="card">
                            <div class="card-header"
                                id="<?php echo $m05AccordionID; ?>heading<?php echo $accItemCount; ?>">
                                <h4 class="mb-0">
                                    <button class="btn btn-link" aria-expanded="false" data-toggle="collapse"
                                        data-target="#<?php echo $m05AccordionID; ?>collapse<?php echo $accItemCount; ?>"
                                        aria-expanded="true"
                                        aria-controls="<?php echo $m05AccordionID; ?>collapse<?php echo $accItemCount; ?>">
                                        <?php echo $M05AccordionTitle; ?>
                                    </button>
                                </h4>
                            </div>

                            <div id="<?php echo $m05AccordionID; ?>collapse<?php echo $accItemCount; ?>"
                                class="card-body-wrap collapse"
                                aria-labelledby="<?php echo $m05AccordionID; ?>heading<?php echo $accItemCount; ?>"
                                data-parent="#<?php echo $m05AccordionID; ?>">
                                <div class="card-body">
                                    <?php echo $m05AccordionContent; ?>
                                </div>
                            </div>
                        </div>
                        <?php $accItemCount++; ?>
                        <?php endwhile; ?>
                    </div>
                    <script>
                    (function($) {
                        $(document).ready(function() {
                            $('.prime-accordion .card:first-child .card-header button').attr(
                                'aria-expanded', 'true');
                            $('.prime-accordion .card:first-child .card-body-wrap').addClass('show');
                        });
                    })(jQuery)
                    </script>
                    <?php endif; ?>
                    <?php elseif( get_row_layout() == 'm06-info_grid' ): 
                            ?>
                    <?php if( have_rows('m06-info_grid_row') ): ?>
                    <div class="d-flex flex-wrap align-items-center">
                        <?php while( have_rows('m06-info_grid_row') ): the_row(); 
                                    $m06ColumnMainClass = get_sub_field('m06-column_main_class');
                                    $m06Title = get_sub_field('m06-title');
                                    $m06LeftButton = get_sub_field('m06-left_button');
                                    $m06LeftButtonClass = get_sub_field('m06-left_button_class');
                                    $m06RightButton = get_sub_field('m06-right_button');
                                    $m06RightButtonClass = get_sub_field('m06-right_button_class');
                                    $m06TopRightButton = get_sub_field('m06-top_right_button');
                                    $m06TopRightButtonClass = get_sub_field('m06-top_right_button_class');
                                    ?>
                        <div
                            class="<?php if($m06ColumnMainClass): echo $m06ColumnMainClass; else: echo 'col-md-12 col-lg-6 col-xl-4 px-1 py-2'; endif;?>">
                            <div class="card-default-bg card w-100 bg-form text-white text-center">
                                <div class="card-body">
                                    <?php if($m06TopRightButton): ?>
                                    <div class="top-btn-wrappers">
                                        <br>
                                        <?php if($m06TopRightButton): 
                                                    $m06TopRightButton_url = $m06TopRightButton['url'];
                                                    $m06TopRightButton_title = $m06TopRightButton['title'];
                                                    $m06TopRightButton_target = $m06TopRightButton['target'] ? $m06TopRightButton['target'] : '_self';
                                                    ?>
                                        <a class="<?php if($m06TopRightButtonClass): echo $m06TopRightButtonClass; else: echo 'card-link font18 web-fill-in-btn'; endif;?>"
                                            href="<?php echo esc_url( $m06TopRightButton_url ); ?>"
                                            target="<?php echo esc_attr( $m06TopRightButton_target ); ?>">
                                            <?php echo esc_html( $m06TopRightButton_title ); ?>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>

                                    <div
                                        class="card-text-wrap <?php if(!$m06TopRightButton): echo 'margin-force-center'; endif; ?>">


                                        <?php if($m06Title): echo $m06Title; endif; ?>
                                    </div>

                                    <?php if($m06LeftButton || $m06RightButton):?>
                                    <div class="btn-wrappers">
                                        <?php if($m06LeftButton): 
                                                        $m06LeftButton_url = $m06LeftButton['url'];
                                                        $m06LeftButton_title = $m06LeftButton['title'];
                                                        $m06LeftButton_target = $m06LeftButton['target'] ? $m06LeftButton['target'] : '_self';
                                                        ?>
                                        <a class="<?php if($m06LeftButtonClass): echo $m06LeftButtonClass; else: echo 'card-link font18 fill-in-btn'; endif;?>"
                                            href="<?php echo esc_url( $m06LeftButton_url ); ?>"
                                            target="<?php echo esc_attr( $m06LeftButton_target ); ?>">
                                            <?php echo esc_html( $m06LeftButton_title ); ?>
                                        </a>
                                        <?php endif; ?>

                                        <br>

                                        <?php if($m06RightButton): 
                                                        $m06RightButton_url = $m06RightButton['url'];
                                                        $m06RightButton_title = $m06RightButton['title'];
                                                        $m06RightButton_target = $m06RightButton['target'] ? $m06RightButton['target'] : '_self';
                                                        ?>
                                        <a class="<?php if($m06RightButtonClass): echo $m06RightButtonClass; else: echo 'card-link font18 fill-in-btn'; endif;?>"
                                            href="<?php echo esc_url( $m06RightButton_url ); ?>"
                                            target="<?php echo esc_attr( $m06RightButton_target ); ?>">
                                            <?php echo esc_html( $m06RightButton_title ); ?>
                                        </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>

                    <form class="row" id="wwo-self-paced-training-submittal-form" method="post">
						<div class="col-12 pt-4">
							<div class="sec-title-wrap d-block">
								<h2 class="sec-title c-prime font-segoe-sb">Student Information </h2>
							</div>
						</div>
                        <div class="form-group col-md-4">
							<label for="firstName" class="pl-3 col-form-label labelAlign">First Name</label>
							<input type="text" class="form-control" id="firstName" name="firstName">
							<span id="firstName-info" class="text-danger float-right"></span>
						</div>
						<div class="form-group col-md-4">
							<label for="lastName" class="pl-3 col-form-label labelAlign">Last Name</label>
							<input type="text" class="form-control" id="lastName" name="lastName">
							<span id="lastName-info" class="text-danger float-right"></span>
						</div>
						<div class="form-group col-md-4">
							<label for="mi" class="pl-3 col-form-label labelAlign">MI</label>
							<input type="text" class="form-control" id="mi" name="mi">
							<span id="mi-info" class="text-danger float-right"></span>
						</div>
						<div class="form-group col-md-12">
                            <label for="homeAddress" class="pl-3 col-form-label labelAlign">Home Address </label>
                            <input type="text" class="form-control" id="homeAddress" name="homeAddress">
                            <span id="homeAddress-info" class="text-danger float-right"></span>
                        </div>                        <div class="form-group col-md-4">
                            <label for="city" class="pl-3 col-form-label labelAlign">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                            <span id="city-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state" class="pl-3 col-form-label labelAlign">State</label>
                            <input type="text" class="form-control" id="state" name="state">
                            <span id="state-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zipCode" class="pl-3 col-form-label labelAlign">Zip Code</label>
                            <input type="text" class="form-control" id="zipCode" name="zipCode">
                            <span id="zipCode-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="email" class="pl-3 col-form-label labelAlign">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <span id="email-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="homePhoneNumber" class="pl-3 col-form-label labelAlign">Home Phone
                                Number</label>
                            <input type="text" class="form-control" id="homePhoneNumber" name="homePhoneNumber">
                            <span id="homePhoneNumber-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="operatorCertificationNumber" class="pl-3 col-form-label labelAlign">Washington
                                Waterworks Operator Certification Number <small>(Required to post training to
                                    transcript)</small></label>
                            <input type="text" class="form-control" id="operatorCertificationNumber"
                                name="operatorCertificationNumber">
                            <span id="operatorCertificationNumber-info" class="text-danger float-right"></span>
                        </div>
                        <div class="col-12 pt-4">
                            <div class="sec-title-wrap d-block">
                                <h2 class="sec-title c-prime font-segoe-sb">
                                    Course Information
                                </h2>
                            </div>
                            <h3 class="font18 black33 font-segoe-sb d-block">
                                Please refer to the Self-Paced Training Approved Course List
                            </h3>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="courseTitle" class="pl-3 col-form-label labelAlign">Course Title</label>
                            <input type="text" class="form-control" id="courseTitle" name="courseTitle">
                            <span id="courseTitle-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="courseSponsor" class="pl-3 col-form-label labelAlign">Course Sponsor</label>
                            <input type="text" class="form-control" id="courseSponsor" name="courseSponsor">
                            <span id="courseSponsor-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="courseCompletionDate" class="pl-3 col-form-label labelAlign">Course Completion
                                Date</label>
                            <input type="text" class="form-control" id="courseCompletionDate"
                                name="courseCompletionDate">
                            <span id="courseCompletionDate-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <h3 class="font18 bold">Course Format:</h3>
                            
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="courseFormat" value="Online">Online
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="courseFormat" value="Correspondence Course">Correspondence Course
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="courseFormat" value="Video">Video
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="courseFormat" value="CD-ROM">CD-ROM
                                </label>
                            </div>
                            <div>
                                <label id="courseFormat-info" for="courseFormat" class="text-danger d-none-hide">Please select Course Format.</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-12 pt-4">
                            <div class="sec-title-wrap d-block">
                                <h2 class="sec-title c-prime font-segoe-sb">
                                    Required Attachments
                                </h2>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label" for="declarationSelfPacedTrainingExam">
                                    <input type="radio" class="form-check-input mr-2" id="declarationSelfPacedTrainingExam" name="requiredAttachment" value="">Declaration of Self-Paced Training Exam Monitoring
                                </label>
                            </div>
                                                   
                            <h3 class="bold font18">Check appropriate box below:</h3>
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label" for="certificateCompletion">
                                    <input type="radio" class="form-check-input mr-2" id="certificateCompletion" name="requiredAttachment" value="">Certificate of completion or transcript for course on Self-Paced Training Approved Course List verifying CEU awarded by the sponsor. <strong> CEU accepted in Washington may be different than the CEU awarded by the course sponsor.</strong>
                                </label>
                            </div>
                          
                            <div class="form-check-inline mb-3">
                                <label class="form-check-label" for="transcriptCourseDescription">
                                    <input type="radio" class="form-check-input mr-2" id="transcriptCourseDescription" name="requiredAttachment" value="">Transcript and course description verifying college credit awarded by an accredited college or university for Self-Paced Training that meets DOH relevancy criteria.
                                 </label>
                            </div>
                            <div>
                                <label id="requiredAttachment-info" for="requiredAttachment" class="text-danger d-none-hide">Please select atleast one option.</label>
                            </div>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
                        <div class="w-100 mt-4">
                        <button type="submit" id="contactsubmit"
                            class="mt-4 btn btn-prime btn-bordered btn-sm">Submit</button>
                        </div>
                        <div id="message" class="mt-4"></div>
                    </form>
                    <style>
                    .form-check {
                        display: flex;
                        justify-content: start;
                        align-items: center;
                        padding-bottom: 20px;
                    }

                    .form-check input+label,.form-check input+label+label {
                        padding-left: 30px;
                    }
                    .d-none-hide {
                        display: none;
                    }
                    </style>
                    <script>
                        (function($) {
                            'use strict';
                            $(document).ready(function() {
                                // $.validator.addMethod( "adultsOnly", function( value, element ) {
                                //     if ( $( "#movie .adult:checked" ).val() === "on" ) {
                                //         var now = new Date();
                                //         var dob = $( "#dob" ).datepicker( "getDate" );
                                //         var age = now - dob;
                                //         return Math.floor( age / 31536000000 ) >= 18;
                                //     }
                                //     return true;
                                // } );
                                jQuery.validator.addMethod("lettersonly", function(value, element) {
                                    return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
                                }, "Letters only please");
                               

                                $("#courseCompletionDate").datepicker({
                                    changeMonth: true,
                                    changeYear: true,
                                    dateFormat: 'dd/mm/yy',
                                   // yearRange: "-0:+1",
                                   // minDate: 0,
                                   // maxYear: "+1Y"
                                });
                                $("#wwo-self-paced-training-submittal-form").validate({
                                    errorClass: "text-danger",
                                    rules: {
                                        firstName: {
                                            required: true,
                                            minlength: 3,
                                            maxlength: 63,
                                            lettersonly: true,
                                        },
                                        lastName: {
                                            required: true,
                                            minlength: 3,
                                            maxlength: 63,
                                            lettersonly: true,

                                        },
										mi: {
                                            // required: true,
                                            minlength: 3,
                                            maxlength: 63,
                                            lettersonly: true,

                                        },
                                        homeAddress: {
                                            required: true,
                                            minlength: 3,
                                            maxlength: 123

                                        },
                                        homeAddress1: {
                                            required: true,
                                            minlength: 3,
                                            maxlength: 123

                                        },
                                        homeAddress2: {
                                            minlength: 3,
                                            maxlength: 123

                                        },
                                        city: {
                                            required: true,
                                            minlength: 3,
                                            maxlength: 60

                                        },
                                        state: {
                                            required: true,
                                            minlength: 3,
                                            maxlength: 60

                                        },
                                        zipCode: {
                                            required: true,
                                            digits: true,
                                            maxlength: 6

                                        },
                                        email: {
                                            required: true,
                                            email: true,
                                            maxlength: 124
                                        },
                                        homePhoneNumber: {
                                            required: true,
                                            digits: true,
                                            maxlength: 10

                                        },
                                        operatorCertificationNumber: {
                                            required: true,
                                            digits: true,
                                            maxlength: 20

                                        },
                                        courseTitle: {
                                            required: true,
                                            minlength: 3
                                        },
                                        courseSponsor: {
                                            required: true,
                                            minlength: 3
                                        },
                                        courseCompletionDate: {
                                            required: true,
                                            minlength: 3
                                        },
                                        location: {
                                            required: true,
                                            minlength: 3
                                        },
                                        courseFormat: {
                                            required: true
                                        },
                                        requiredAttachment: { 
                                            required: true, 
                                            minlength: 1
                                        }
                                    },
                                    messages: {
                                        firstName: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters",
                                            maxlength: "Max. 63 Characters",
                                            lettersonly: "Only Letters Please!",
                                        },
                                        lastName: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters",
                                            maxlength: "Max. 63 Characters",
                                            lettersonly: "Only Letters Please!",

                                        },
                                        homeAddress1: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters",
                                            maxlength: "Max. 123 Characters"

                                        },
                                        homeAddress2: {
                                            minlength: "Min. 3 Characters",
                                            maxlength: "Max. 123 Characters"

                                        },
                                        city: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters",
                                            maxlength: "Max. 60 Characters"

                                        },
                                        state: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters",
                                            maxlength: "Max. 60 Characters"

                                        },
                                        zipCode: {
                                            required: "Required",
                                            digits: "Only Digits",
                                            maxlength: "Max. 6 Numbers"

                                        },
                                        email: {
                                            required: "Required",
                                            email: "Please Enter Valid EMail",
                                            maxlength: "Max. 124 Numbers"
                                        },
                                        homePhoneNumber: {
                                            required: "Required",
                                            digits: "Only Digits",
                                            maxlength: "Max. 10 Numbers"

                                        },
                                        operatorCertificationNumber: {
                                            required: "Required",
                                            digits: "Only Digits",
                                            maxlength: "Max. 20 Numbers"

                                        },
                                        courseTitle: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters"
                                        },
                                        courseSponsor: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters",
                                        },
                                        courseCompletionDate: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters",
                                        },
                                        location: {
                                            required: "Required",
                                            minlength: "Min. 3 Characters",
                                        },
                                        courseFormat: {
                                            required: "Required"
                                        },
                                        requiredAttachment: "Please select at least one option"
                                    },
                                    submitHandler: function(form) {
                                        $.ajax({
                                            url: "/ajax/save-wwo-self-paced-training-submittal-form-query.php",
                                            method: "POST",
                                            data: {
                                                firstName: $("#firstName").val(),
                                                lastName: $("#lastName").val(),
                                                homeAddress1: $("#homeAddress1").val(),
                                                homeAddress2: $("#homeAddress2").val(),
                                                city: $("#city").val(),
                                                state: $("#state").val(),
                                                zipCode: $("#zipCode").val(),
                                                email: $("#email").val(),
                                                homePhoneNumber: $("#homePhoneNumber").val(),
                                                operatorCertificationNumber: $("#operatorCertificationNumber").val(),
                                                courseTitle: $("#courseTitle").val(),
                                                courseSponsor: $("#courseSponsor").val(),
                                                courseCompletionDate: $("#courseCompletionDate").val(),
                                                location: $("#location").val(),
                                                courseFormat: $("input[name='courseFormat']").val(),

                                                declarationSelfPacedTrainingExam: $("#declarationSelfPacedTrainingExam")[0].checked,
                                                certificateCompletion: $("#certificateCompletion")[0].checked,
                                                transcriptCourseDescription: $("#transcriptCourseDescription")[0].checked
                                            },
                                            dataType: "json",
                                            beforeSend: function() {
                                                $("#contactsubmit").attr("disabled",
                                                    "disabled");
                                            },
                                            success: function(data) {
                                                if (data.status == "success") {
                                                    $("#wwo-self-paced-training-submittal-form")[0].reset();
                                                    if (data.message) {
                                                        /** Empty and then re-show the element at some point. */
                                                        $("#message").addClass(
                                                            "alert alert-success");
                                                        $("#message")
                                                            .empty()
                                                            .show()
                                                            .html(data.message)
                                                            .delay(3000)
                                                            .fadeOut(2000);
                                                        //location.reload();
                                                    }
                                                    $("#contactsubmit").attr("disabled",
                                                        false);
                                                    
                                                        // $("#message").append('<a href="'+data.formPDF+'" class="hiddenLink" download style="display:none;">Download</a>');
                                                        // $('.hiddenLink').trigger('click');

                                                } else if (data.status == "failure") {
                                                    $("#message").addClass(
                                                        "alert alert-danger");
                                                    $("#message")
                                                        .empty()
                                                        .show()
                                                        .html(data.message)
                                                        .delay(3000)
                                                        .fadeOut(2000);
                                                    $("#contactsubmit").attr("disabled",
                                                        false);
                                                } else {
                                                    $("#message").addClass(
                                                        "alert alert-danger");
                                                    $("#message")
                                                        .empty()
                                                        .show()
                                                        .html(data.message)
                                                        .delay(3000)
                                                        .fadeOut(2000);
                                                    $("#contactsubmit").attr("disabled",
                                                        false);
                                                }
                                                $("#contactsubmit").attr("disabled",
                                                    false);
                                            }
                                        });
                                        return false;
                                    },
                                });
                            });



                        })(jQuery)
                    </script>
                </div>
                <div class="col-12 col-md-4 col-lg-3">
                    <?php if (have_rows('sidebar_components', 'option')):
                while (have_rows('sidebar_components', 'option')): the_row();
                    if (get_row_layout() == 'add_menu_to_sidebar'):
                      $menuSidebar = get_sub_field('add_menu', 'option');
                        $menuVar = array(
                          'menu'                 => $menuSidebar,
                          'container'            => false,
                          // 'container'            => 'div',
                          // 'container_class'      => 'conc',
                          // 'container_id'         => 'conc',
                          'menu_class'           => 'secMenu nav nav-pills nav-fill flex-column',
                          'menu_id'              => $menuSidebar,
                          'echo'                 => true,
                          'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                          'item_spacing'         => 'preserve',
                          'depth'                => 0,
                          // 'add_li_class'  => 'your-class-name1 your-class-name-2',
                          'add_link_class'  => 'nav-link d-flex align-items-center flex-row-reverse justify-content-end',
                          'theme_location'       =>  $menuSidebar,
                          'fallback_cb' => 'bs4navwalker::fallback',
                          'walker' => new bs4navwalker(),
                            );
                        wp_nav_menu( $menuVar );

                        elseif (get_row_layout() == 'search_hire_bat'):
                          $menuSidebar = get_sub_field('is_search_to_hire_a_bat', 'option');?>
                    <?php if($menuSidebar == 'yes'): ?>
                    <div class="search-box pt-5">
                        <div class="sec-title-wrap">
                            <h2 class="sec-title c-prime font-segoe-sb">
                                Search to Hire a BAT
                            </h2>
                        </div>
                        <form class="form-mod">
                            <div class="form-group">
                                <label for="county">By BATs County</label>
                                <select id="county" class="form-control">
                                    <option>Select County</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="searchName">By BAT List by Name</label>
                                <input type="text" class="form-control" id="searchName" placeholder="Search by name">
                            </div>
                            <button type="submit" class="btn btn-prime btn-fw no-border-radius">Search BATs</button>
                        </form>
                    </div>
                    <?php endif; ?>
                    <?php elseif (get_row_layout() == 'single_info_box'):
                          $svgIconTitle = get_sub_field('title', 'option');
                          
                          ?>

                    <div class="single-info-box d-flex align-items-center pt-4">
                        <?php 
                            if( have_rows('svg_icons','option') ): ?>
                        <?php while( have_rows('svg_icons','option') ): the_row(); 
                              $svgIcon = get_sub_field('upload_svg_icon', 'option');
                             
                              $svgIconClass = get_sub_field('svg_icon_class', 'option');
                              $svgIconViewBox = get_sub_field('viewbox_value', 'option');
                              $svgIconHash = get_sub_field('svg_icon_hashvalue', 'option');
                              // append icon
                              //if( $svgIcon ):?>
                        <svg class="<?php echo $svgIconClass; ?>" viewBox="<?php echo $svgIconViewBox; ?>">
                            <use xlink:href="<?php echo esc_url( $svgIcon['url'] ); ?>#<?php echo $svgIconHash; ?>">
                            </use>
                        </svg>
                        <?php //endif;
                              ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                        <span><?php echo $svgIconTitle; ?></span>
                    </div>

                    <?php elseif (get_row_layout() == 'single_image'):
                             $singleImage = get_sub_field('single_image', 'option');
                             $singleImageWrapClass = get_sub_field('single_image_wrap_class', 'option');

                             $addLinkToImage = get_sub_field('add_link_to_image', 'option');

                             if($singleImage):
                              ?>
                    <div
                        class="<?php if($singleImageWrapClass && $singleImage): echo $singleImageWrapClass; else: echo 'batalk-logo-wrap bg-70 mt-5'; endif;?>">
                        <?php  
    $addLinkToImage_url = $addLinkToImage['url'];
    $addLinkToImage_title = $addLinkToImage['title'];
    $addLinkToImage_target = $addLinkToImage['target'] ? $addLinkToImage['target'] : '_self';

    if( $addLinkToImage ):
    ?>
                        <a href="<?php echo esc_url( $addLinkToImage_url ); ?>"
                            target="<?php echo esc_attr( $addLinkToImage_target ); ?>">
                            <?php endif; ?>
                            <img class="img-fluid" src="<?php echo esc_url( $singleImage['url'] ); ?>"
                                alt="<?php echo esc_attr( $singleImage['alt'] ); ?>">
                            <?php if( $addLinkToImage ):
    ?></a><?php endif; ?>
                    </div>
                    <?php
                             endif;
                            ?>
                    <?php elseif (get_row_layout() == 'add_working_hours'):
                          $workingHourTimings = get_sub_field('working_hours_timings', 'option');?>
                    <div class="working-hours-box bg-prime text-white py-4 px-5 mt-5">
                        <?php 
                            if( have_rows('add_title','option') ): ?>
                        <div class="wh-title d-flex align-items-center pt-4">
                            <?php while( have_rows('add_title','option') ): the_row();
                               $addIcon = get_sub_field('add_icon', 'option');
                               $whTitle = get_sub_field('title', 'option');
                              ?>
                            <img class="img-fluid pr-3" src="<?php echo esc_url( $addIcon['url']); ?>"
                                alt="<?php echo esc_attr( $addIcon['alt']); ?>">
                            <h3 class="font16 pt-2 text-white"><?php echo $whTitle; ?></h3>
                            <?php endwhile; ?>
                        </div>
                        <?php endif; ?>
                        <?php if($workingHourTimings): echo $workingHourTimings; else: echo '<div class="timing font16 pt-3">Weekdays : 6:30 – 18:00</div><div class="timing font16 pt-3 pb-4">Weekend : 8.00 - 12:00</div>'; endif; ?>
                    </div>
                    <?php
                 
                        
                    endif;
                endwhile;
            endif;
            ?>

                </div>

            </div>
        </div>
    </div><!-- /. Main Content -->
</div>
<?php
do_action('ecommerce_gem_action_sidebar');

get_footer();
?>