<?php
/*
  Template Name: TCS Request For Course Evaluation and CEU Assignment Form
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
                        <?php echo $m02Title; ?>
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

                    <form class="row" id="tcs-request-for-course-evaluation-and-ceu-assignment-form" method="post">

                        <div class="col-12 pt-4">
                            <div class="sec-title-wrap d-block">
                                <h2 class="sec-title c-prime font-segoe-sb">
                                    Sponsor Information
                                </h2>
                            </div>
                        </div>



                        <div class="form-group col-md-12">
                            <label for="sponsoringOrganization" class="pl-3 col-form-label labelAlign">Sponsoring
                                Organization</label>
                            <input type="text" class="form-control" id="sponsoringOrganization"
                                name="sponsoringOrganization">
                            <span id="sponsoringOrganization-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contactName" class="pl-3 col-form-label labelAlign">Contact Name</label>
                            <input type="text" class="form-control" id="contactName" name="contactName">
                            <span id="contactName-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="company" class="pl-3 col-form-label labelAlign">Company</label>
                            <input type="text" class="form-control" id="company" name="company">
                            <span id="company-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address1" class="pl-3 col-form-label labelAlign">Address 1</label>
                            <input type="text" class="form-control" id="address1" name="address1">
                            <span id="address1-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address2" class="pl-3 col-form-label labelAlign">Address 2</label>
                            <input type="text" class="form-control" id="address2" name="address2">
                            <span id="address2-info" class="text-danger float-right"></span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-4">
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
                            <label for="phoneNumber" class="pl-3 col-form-label labelAlign">Phone Number (including area
                                code)</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                            <span id="phoneNumber-info" class="text-danger float-right"></span>
                        </div>
                        <div class="col-md-12">
                            <p class="bold"> Would you like a link to your training to be posted on our website? If so,
                                enter website below:</p>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="website" class="pl-3 col-form-label labelAlign">Website</label>
                            <input type="text" class="form-control" id="website" name="website"
                                placeholder="For Ex. https://example.com">
                            <span id="website-info" class="text-danger float-right"></span>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>

                        <div class="col-12 pt-4">
                            <div class="sec-title-wrap d-block">
                                <h2 class="sec-title c-prime font-segoe-sb">
                                    Course Information
                                </h2>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="coursetitle" class="pl-3 col-form-label labelAlign">Course Title</label>
                            <input type="text" class="form-control" id="coursetitle" name="coursetitle">
                            <span id="coursetitle-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="location" class="pl-3 col-form-label labelAlign">Location</label>
                            <input type="text" class="form-control" id="location" name="location">
                            <span id="location-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="startDate" class="pl-3 col-form-label labelAlign">Start Date</label>
                            <input type="text" class="form-control" id="startDate" name="startDate">
                            <span id="startDate-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endDate" class="pl-3 col-form-label labelAlign">End Date</label>
                            <input type="text" class="form-control" id="endDate" name="endDate">
                            <span id="endDate-info" class="text-danger float-right"></span>
                        </div>
                        <!-- ---------- Date - 04-03-2021 ---------- -->
                            <div class="form-group col-md-12 d-flex flex-wrap flex-column pt-4 "> 
                                <p> Has this course been evaluated previously? </p> 
                                <div class="form-check form-check-inline"> 
                                    <input class="form-check-input evaluatedPreviously" type="radio" name="evaluatedPreviously" id="evaluatedPreviouslyYes" value="Yes">  
                                    <label class="form-check-label pl-3" for="evaluatedPreviouslyYes">Yes</label> 
                                </div> 
                                <div class="form-check form-check-inline"> 
                                    <input class="form-check-input evaluatedPreviously" type="radio" name="evaluatedPreviously" id="evaluatedPreviouslyNo" value="No">
                                    <label class="form-check-label pl-3" for="evaluatedPreviouslyNo">No  </label> 
                                </div> 
                                <label id="evaluatedPreviously-info" class="text-danger d-none-hide" for="evaluatedPreviously">Please select this option.</label>  
                            </div> 
                            <!-- -------------------- -->
                        <!-- <div class="form-group col-md-12 pt-3 d-flex flex-wrap ">
                            Has this course been evaluated previously? - &nbsp; <br>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input evaluatedPreviously" type="radio"
                                    name="evaluatedPreviously" id="evaluatedPreviouslyYes" value="Yes">
                                <label class="form-check-label pl-3" for="evaluatedPreviouslyYes">Yes
                                </label>

                            </div>
                            <div class="form-check form-check-inline ml-4">
                                <input class="form-check-input evaluatedPreviously" type="radio"
                                    name="evaluatedPreviously" id="evaluatedPreviouslyNo" value="No">
                                <label class="form-check-label pl-3" for="evaluatedPreviouslyNo">No
                                </label>

                            </div>
                            <label id="evaluatedPreviously-info" class="text-danger d-none-hide"
                                for="evaluatedPreviously">Please select this option.</label>
                        </div> -->
                        <div class="col-md-12 courseIdentificationNumber d-none">
                            <p>If yes, enter Course Identification Number A</p>
                            <div class="form-group">
                                <label for="courseIdentificationNumber" class="pl-3 col-form-label labelAlign">Course
                                    Identification Number</label>
                                <input type="text" class="form-control" id="courseIdentificationNumber"
                                    name="courseIdentificationNumber">
                                <span id="courseIdentificationNumber-info" class="text-danger float-right"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-12 d-flex flex-wrap flex-column pt-4">
                            <p>Has the course content or length changed since the last evaluation? </p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hasTheCourseContentChanged"
                                    id="hasTheCourseContentChanged1" value="Yes">
                                <label class="form-check-label pl-3" for="hasTheCourseContentChanged1">
                                    Yes
                                </label>
                                <label id="hasTheCourseContentChanged-info" class="text-danger d-none-hide">Please
                                    select this option.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="hasTheCourseContentChanged"
                                    id="hasTheCourseContentChanged2" value="No">
                                <label class="form-check-label pl-3" for="hasTheCourseContentChanged2">
                                    No
                                </label>

                            </div>
                            <label id="hasTheCourseContentChanged-info" for="hasTheCourseContentChanged"
                                class="text-danger d-none-hide">Please select this option.</label>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="maintenanceOfAWaterSystemBrief" class="pl-3 col-form-label labelAlign">How
                                    is this training directly related to the operation or maintenance of a water system,
                                    or to the management of the operation or maintenance of a water system?</label>
                                <textarea type="textarea" class="form-control" id="maintenanceOfAWaterSystemBrief"
                                    name="maintenanceOfAWaterSystemBrief" rows="5"></textarea>
                                <span id="maintenanceOfAWaterSystemBrief-info" class="text-danger float-right"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="waterworksOperatorsInfluenceBrief"
                                    class="pl-3 col-form-label labelAlign">How will waterworks operators use this
                                    training to influence water quality, water supply or public health
                                    protection?</label>
                                <textarea type="textarea" class="form-control" id="waterworksOperatorsInfluenceBrief"
                                    name="waterworksOperatorsInfluenceBrief" rows="5"></textarea>
                                <span id="waterworksOperatorsInfluenceBrief-info"
                                    class="text-danger float-right"></span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="attendanceMonitor" class="pl-3 col-form-label labelAlign">How will attendance be
                                monitored and verified?</label>
                            <input type="text" class="form-control" id="attendanceMonitor" name="attendanceMonitor">
                            <span id="attendanceMonitor-info" class="text-danger float-right"></span>
                        </div>

                        <div class="col-md-12 d-slex flex-wrap flex-column">
                            <p class="bold">Satisfactory program completion demonstrated by (check as appropriate and
                                attach examples):</p>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="skillDemonstrationORProject">
                                <label class="form-check-label" for="skillDemonstrationORProject">
                                    Skill Demonstration or Project
                                </label>
                            </div>
                            <div class="form-group skillDemonstrationORProjectBrief d-none">
                                <label for="skillDemonstrationORProjectBrief"
                                    class="pl-3 col-form-label labelAlign">Skill Demonstration or Project Brief</label>
                                <input type="text" class="form-control" id="skillDemonstrationORProjectBrief"
                                    name="skillDemonstrationORProjectBrief">
                                <span id="skillDemonstrationORProjectBrief-info" class="text-danger float-right"></span>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="oral_WrittenReportORExamination">
                                <label class="form-check-label" for="oral_WrittenReportORExamination">
                                    Oral/Written Report or Examination
                                </label>
                            </div>
                            <div class="form-group oral_WrittenReportORExaminationBrief d-none">
                                <label for="oral_WrittenReportORExaminationBrief"
                                    class="pl-3 col-form-label labelAlign">Oral/Written Report or Examination
                                    Brief</label>
                                <input type="text" class="form-control" id="oral_WrittenReportORExaminationBrief"
                                    name="oral_WrittenReportORExaminationBrief">
                                <span id="oral_WrittenReportORExaminationBrief-info"
                                    class="text-danger float-right"></span>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value=""
                                    id="satisfactoryProgramCompletionDemoOther">
                                <label class="form-check-label" for="satisfactoryProgramCompletionDemoOther">
                                    Other
                                </label>
                            </div>
                            <div class="form-group otherBrief d-none">
                                <label for="otherBrief" class="pl-3 col-form-label labelAlign">Other Brief</label>
                                <input type="text" class="form-control" id="otherBrief" name="otherBrief">
                                <span id="otherBrief-info" class="text-danger float-right"></span>
                            </div>
                        </div>





                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-12 pt-4">
                            <div class="sec-title-wrap d-block">
                                <h2 class="sec-title c-prime font-segoe-sb">
                                    REQUIRED ATTACHMENTS
                                </h2>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="certificateofCompletion"
                                    name="certificateofCompletion">
                                <label class="form-check-label" for="certificateofCompletion">Outline, program or
                                    abstract</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="learningOutcomes"
                                    name="learningOutcomes">
                                <label class="form-check-label" for="learningOutcomes">Learning outcomes that
                                    participants will be expected to demonstrate as a result of this training</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="timeSchedule" name="timeSchedule">
                                <label class="form-check-label" for="timeSchedule">Time schedule including beginning and
                                    ending times, breaks, lunches, etc.</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="nameAddressDetails"
                                    name="nameAddressDetails">
                                <label class="form-check-label" for="nameAddressDetails">Name, address and professional
                                    qualifications of instructor and method of instruction used</label>
                            </div>
                        </div>



                        <!-- <button type="submit" class="btn btn-primary mb-2">Submit</button> -->
                        <div class="w-100">
                            <button type="submit" id="contactsubmit" class="btn btn-prime btn-bordered btn-sm" style="    margin: 1.6rem; ">Submit</button> 
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

                    .form-check input+label,
                    .form-check input+label+label {
                        padding-left: 30px;
                    }

                    .d-none-hide {
                        display: none;
                    }
                    textarea.form-control  {
                        font-size: 14px
                    }
                    </style>
                    <script>
                    (function($) {
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
                            jQuery(".evaluatedPreviously").change(function() {
                                if (jQuery("input[name='evaluatedPreviously']:checked").val() ==
                                    'Yes'){
                                    jQuery('.courseIdentificationNumber').removeClass('d-none');
                                    }
                                else {
                                    jQuery('.courseIdentificationNumber').addClass('d-none');
                                }
                            });
                            jQuery("#skillDemonstrationORProject").change(function() {
                                if (jQuery(this).is(':checked')){
                                    jQuery('.skillDemonstrationORProjectBrief').removeClass(
                                        'd-none');
                                }
                                else{
                                    jQuery('.skillDemonstrationORProjectBrief').addClass('d-none');
                                    jQuery('#skillDemonstrationORProjectBrief').val('');
                                }

                            });

                            jQuery("#oral_WrittenReportORExamination").change(function() {
                                if (jQuery(this).is(':checked')){
                                    jQuery('.oral_WrittenReportORExaminationBrief').removeClass(
                                        'd-none');
                                }
                                else {
                                    jQuery('.oral_WrittenReportORExaminationBrief').addClass(
                                        'd-none');
                                    jQuery('#oral_WrittenReportORExaminationBrief').val('');
                                }
                            });

                            jQuery("#satisfactoryProgramCompletionDemoOther").change(function() {
                                if (jQuery(this).is(':checked')){
                                    jQuery('.otherBrief').removeClass('d-none');
                                }
                                else {
                                    jQuery('.otherBrief').addClass('d-none');
                                    jQuery('#otherBrief').val('');
                                }
                            });

                            // if($("#skillDemonstrationORProject")[0].checked == true){

                            //                 }
                            //                 else {
                            //                     $(".skillDemonstrationORProjectBrief").addClass('d-none');
                            //                 }
                            jQuery.validator.addMethod("lettersonly", function(value, element) {
                                return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
                            }, "Letters only please");

                            jQuery.validator.addMethod("alphanumeric", function(value, element) {
                                return this.optional(element) || /^[\w.]+$/i.test(value);
                            }, "Letters, numbers, and underscores only please");

                            $("#startDate").datepicker({
                                changeMonth: true,
                                changeYear: true,
                                dateFormat: 'dd/mm/yy',
                                yearRange: "-0:+1",
                                minDate: 0,
                                maxYear: "+1Y"
                            });
                            $("#endDate").datepicker({
                                changeMonth: true,
                                changeYear: true,
                                dateFormat: 'dd/mm/yy',
                                yearRange: "-0:+1",
                                minDate: 0,
                                maxYear: "+1Y"
                            });
                            $("#tcs-request-for-course-evaluation-and-ceu-assignment-form").validate({
                                errorClass: "text-danger",
                                rules: {
                                    sponsoringOrganization: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 88,
                                        alphanumeric: true,
                                    },
                                    contactName: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    company: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 63,
                                        alphanumeric: true,
                                    },
                                    address1: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 123

                                    },
                                    address2: {
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
                                        maxlength: 5

                                    },
                                    email: {
                                        required: true,
                                        email: true,
                                        maxlength: 124
                                    },
                                    phoneNumber: {
                                        required: true,
                                        digits: true,
                                        maxlength: 13

                                    },
                                    website: {
                                        maxlength: 255,
                                        url: true

                                    },
                                    coursetitle: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 255,
                                        lettersonly: true,
                                    },
                                    location: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 88,
                                        lettersonly: true,
                                    },
                                    startDate: {
                                        required: true
                                    },
                                    endDate: {
                                        required: true
                                    },
                                    evaluatedPreviously: {
                                        required: true
                                    },
                                    courseIdentificationNumber: {
                                        required: function(element) {
                                            return $(
                                                    "input[name='evaluatedPreviously']:checked")
                                                .val() == "Yes";
                                        }
                                    },
                                    hasTheCourseContentChanged: {
                                        required: true
                                    },
                                    maintenanceOfAWaterSystemBrief: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 380
                                    },
                                    waterworksOperatorsInfluenceBrief: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 380
                                    },
                                    attendanceMonitor: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 63
                                    },
                                    skillDemonstrationORProjectBrief: {
                                        required: function(element) {

                                            return $("#skillDemonstrationORProject")[0].checked;
                                        }
                                    },
                                    oral_WrittenReportORExaminationBrief: {
                                        required: function(element) {
                                            return $("#oral_WrittenReportORExamination")[0]
                                                .checked;
                                        }
                                    },
                                    otherBrief: {
                                        required: function(element) {
                                            return $("#satisfactoryProgramCompletionDemoOther")[
                                                0].checked;
                                        }
                                    }

                                },
                                messages: {
                                    sponsoringOrganization: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 88 Chracters",
                                        alphanumeric: "Only Alphanumeric Please!"
                                    },
                                    contactName: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 63 Chracters",
                                        lettersonly: "Only Letters Please!"
                                    },
                                    company: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 63 Chracters",
                                        alphanumeric: "Only Alphanumeric Please!"
                                    },
                                    address1: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 123 Chracters"

                                    },
                                    address2: {
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 123 Chracters"

                                    },
                                    city: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 60 Chracters"

                                    },
                                    state: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 88 Chracters",
                                        alphanumeric: "Only Alphanumeric Please!"

                                    },
                                    zipCode: {
                                        required: "Required!",
                                        digits: "Only Digitas allowed",
                                        maxlength: "Max 5 Digits"

                                    },
                                    email: {
                                        required: "Required!",
                                        email: "Please Enter valid Email",
                                        maxlength: "Max. 124 Chracters"
                                    },
                                    phoneNumber: {
                                        required: "Required!",
                                        digits: "Only Digitas allowed",
                                        maxlength: "Max 13 Digits, Including Country Code"

                                    },
                                    website: {
                                        maxlength: "Max. 255 Characters",
                                        url: "Please enter Valid URL"

                                    },
                                    coursetitle: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 255 Chracters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    location: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 88 Chracters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    startDate: {
                                        required: "Required!"
                                    },
                                    endDate: {
                                        required: "Required!"
                                    },
                                    evaluatedPreviously: {
                                        required: "Required!"
                                    },
                                    courseIdentificationNumber: {
                                        required: "Required!"
                                    },
                                    hasTheCourseContentChanged: {
                                        required: "Required!"
                                    },
                                    maintenanceOfAWaterSystemBrief: {
                                        required: "Required!",
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 380 Characters"
                                    },
                                    waterworksOperatorsInfluenceBrief: {
                                        required: "Required!",
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 380 Characters"
                                    },
                                    attendanceMonitor: {
                                        required: "Required!",
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters"
                                    },
                                    skillDemonstrationORProjectBrief: {
                                        required: "Required!"
                                    },
                                    oral_WrittenReportORExaminationBrief: {
                                        required: "Required!"
                                    },
                                    otherBrief: {
                                        required: "Required!"
                                    }

                                },
                                submitHandler: function(form) {
                                    $.ajax({
                                        url: "/ajax/save-tcs-request-for-course-evaluation-and-ceu-assignment-form-query.php",
                                        method: "POST",
                                        data: {
                                            sponsoringOrganization: $("#sponsoringOrganization").val(),
                                            contactName: $("#contactName").val(),
                                            company: $("#company").val(),
                                            address1: $("#address1").val(),
                                            address2: $("#address2").val(),
                                            city: $("#city").val(),
                                            state: $("#state").val(),
                                            zipCode: $("#zipCode").val(),
                                            email: $("#email").val(),
                                            phoneNumber: $("#phoneNumber").val(),
                                            website: $("#website").val(),
                                            coursetitle: $("#coursetitle").val(),
                                            location: $("#location").val(),

                                            startDate: $("#startDate").val(),
                                            endDate: $("#endDate").val(),
                                            evaluatedPreviously: $("input[name='evaluatedPreviously']:checked").val(),
                                            hasTheCourseContentChanged: $("input[name='hasTheCourseContentChanged']:checked").val(),
                                            maintenanceOfAWaterSystemBrief: $("#maintenanceOfAWaterSystemBrief").val(),
                                            waterworksOperatorsInfluenceBrief: $("#waterworksOperatorsInfluenceBrief").val(),
                                            attendanceMonitor: $("#attendanceMonitor").val(),
                                            skillDemonstrationORProject: $("#skillDemonstrationORProject")[0].checked,
                                            skillDemonstrationORProjectBrief: $("#skillDemonstrationORProjectBrief").val(),
                                            oral_WrittenReportORExamination: $("#oral_WrittenReportORExamination")[0].checked,
                                            oral_WrittenReportORExaminationBrief: $("#oral_WrittenReportORExaminationBrief").val(),
                                            satisfactoryProgramCompletionDemoOther: $("#satisfactoryProgramCompletionDemoOther")[0].checked,
                                            otherBrief: $("#otherBrief").val(),
                                            certificateofCompletion: $("#certificateofCompletion")[0].checked,
                                            learningOutcomes: $("#learningOutcomes")[0].checked,
                                            timeSchedule: $("#timeSchedule")[0].checked,
                                            nameAddressDetails: $("#nameAddressDetails")[0].checked

                                        },
                                        dataType: "json",
                                        beforeSend: function() {
                                            $("#contactsubmit").attr("disabled",
                                                "disabled");
                                        },
                                        success: function(data) {
                                            if (data.status == "success") {
                                                $("#tcs-request-for-course-evaluation-and-ceu-assignment-form")[
                                                    0].reset();
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
                    <?php if (have_rows('sidebar_components_tcs', 'option')):
                while (have_rows('sidebar_components_tcs', 'option')): the_row();
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