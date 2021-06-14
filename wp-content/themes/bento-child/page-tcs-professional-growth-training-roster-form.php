<?php
/*
  Template Name: TCS Professional Growth Training Roster Form
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

                    <form class="row" id="tcs-professional-growth-training-roster-form" method="post">
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
                            <label for="locationOfTrainingCity" class="pl-3 col-form-label labelAlign">Location of
                                Training (City)</label>
                            <input type="text" class="form-control" id="locationOfTrainingCity"
                                name="locationOfTrainingCity">
                            <span id="locationOfTrainingCity-info" class="text-danger float-right"></span>
                        </div>

                        <div class="form-group col-md-12">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="attachAddressProof"
                                    name="attachAddressProof">
                                <label class="form-check-label">Attach the name, address, phone
                                    number and professional qualifications of each instructor (REQUIRED).</label>
                            </div>
                            <label id="attachAddressProof-info" class="text-danger d-none-hide" for="attachAddressProof">Please select this option.</label>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dateOfTraining" class="pl-3 col-form-label labelAlign">Date of Training</label>
                            <input type="text" class="form-control" id="dateOfTraining" name="dateOfTraining">
                            <span id="dateOfTraining-info" class="text-danger float-right"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ceuIdNumber" class="pl-3 col-form-label labelAlign">CEU ID Number</label>
                            <input type="text" class="form-control" id="ceuIdNumber" name="ceuIdNumber">
                            <span id="ceuIdNumber-info" class="text-danger float-right"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="dateOfceuAssignment" class="pl-3 col-form-label labelAlign">Date of CEU
                                Assignment</label>
                            <input type="text" class="form-control" id="dateOfceuAssignment" name="dateOfceuAssignment">
                            <span id="dateOfceuAssignment-info" class="text-danger float-right"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ceuAssigned" class="pl-3 col-form-label labelAlign">CEU Assigned</label>
                            <input type="text" class="form-control" id="ceuAssigned" name="ceuAssigned">
                            <span id="ceuAssigned-info" class="text-danger float-right"></span>
                        </div>
                        <div class="col-12">
                            <hr>
                        </div>
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

                        <div class="col-md-12 mb-4 p-4 bg-prime font16 text-white">
                            Please list participants in alphabetical order. List everyone who completes the training
                            even if no ID is provided. The waterworks certification number is mandatory in order to
                            record training completion information to the transcripts of certified waterworks operators.
                            If additional space is needed for listing participants, use the Professional Growth Training
                            Roster Attachment form.
                        </div>
                        <div class="col-md-12 p-0">
                            <div class="table-responsive">
                                <table class="table table-striped table-responsive w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" width="20%">First Name</th>
                                            <th scope="col" width="20%">Last Name</th>
                                            <th scope="col" width="40%">Water Certification Number (Mandatory)</th>
                                            <th scope="col" width="25%">CEU Awarded</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName1" class="pl-3 col-form-label labelAlign d-none">Participants First Name 1</label>
                                                    <input type="text" class="form-control" id="participantsFirstName1" name="participantsFirstName1">
                                                    <span id="participantsFirstName1-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName1" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 1</label>
                                                    <input type="text" class="form-control" id="participantsLastName1" name="participantsLastName1">
                                                    <span id="participantsLastName1-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber1" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 1</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber1" name="participantsWaterCertificationNumber1">
                                                    <span id="participantsWaterCertificationNumber1-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded1" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 1</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded1" name="participantsCEUAwarded1">
                                                    <span id="participantsCEUAwarded1-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName2" class="pl-3 col-form-label labelAlign d-none">Participants First Name 2</label>
                                                    <input type="text" class="form-control" id="participantsFirstName2" name="participantsFirstName2">
                                                    <span id="participantsFirstName2-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName2" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 2</label>
                                                    <input type="text" class="form-control" id="participantsLastName2" name="participantsLastName2">
                                                    <span id="participantsLastName2-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber2" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 2</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber2" name="participantsWaterCertificationNumber2">
                                                    <span id="participantsWaterCertificationNumber2-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded2" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 2</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded2" name="participantsCEUAwarded2">
                                                    <span id="participantsCEUAwarded2-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName3" class="pl-3 col-form-label labelAlign d-none">Participants First Name 3</label>
                                                    <input type="text" class="form-control" id="participantsFirstName3" name="participantsFirstName3">
                                                    <span id="participantsFirstName3-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName3" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 3</label>
                                                    <input type="text" class="form-control" id="participantsLastName3" name="participantsLastName3">
                                                    <span id="participantsLastName3-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber3" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 3</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber3" name="participantsWaterCertificationNumber3">
                                                    <span id="participantsWaterCertificationNumber3-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded3" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 3</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded3" name="participantsCEUAwarded3">
                                                    <span id="participantsCEUAwarded3-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName4" class="pl-3 col-form-label labelAlign d-none">Participants First Name 4</label>
                                                    <input type="text" class="form-control" id="participantsFirstName4" name="participantsFirstName4">
                                                    <span id="participantsFirstName4-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName4" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 4</label>
                                                    <input type="text" class="form-control" id="participantsLastName4" name="participantsLastName4">
                                                    <span id="participantsLastName4-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber4" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 4</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber4" name="participantsWaterCertificationNumber4">
                                                    <span id="participantsWaterCertificationNumber4-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded4" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 4</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded4" name="participantsCEUAwarded4">
                                                    <span id="participantsCEUAwarded4-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName5" class="pl-3 col-form-label labelAlign d-none">Participants First Name 5</label>
                                                    <input type="text" class="form-control" id="participantsFirstName5" name="participantsFirstName5">
                                                    <span id="participantsFirstName5-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName5" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 5</label>
                                                    <input type="text" class="form-control" id="participantsLastName5" name="participantsLastName5">
                                                    <span id="participantsLastName5-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber5" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 5</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber5" name="participantsWaterCertificationNumber5">
                                                    <span id="participantsWaterCertificationNumber5-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded5" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 5</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded5" name="participantsCEUAwarded5">
                                                    <span id="participantsCEUAwarded5-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">6</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName6" class="pl-3 col-form-label labelAlign d-none">Participants First Name 6</label>
                                                    <input type="text" class="form-control" id="participantsFirstName6" name="participantsFirstName6">
                                                    <span id="participantsFirstName6-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName6" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 6</label>
                                                    <input type="text" class="form-control" id="participantsLastName6" name="participantsLastName6">
                                                    <span id="participantsLastName6-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber6" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 6</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber6" name="participantsWaterCertificationNumber6">
                                                    <span id="participantsWaterCertificationNumber6-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded6" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 6</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded6" name="participantsCEUAwarded6">
                                                    <span id="participantsCEUAwarded6-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">7</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName7" class="pl-3 col-form-label labelAlign d-none">Participants First Name 7</label>
                                                    <input type="text" class="form-control" id="participantsFirstName7" name="participantsFirstName7">
                                                    <span id="participantsFirstName7-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName7" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 7</label>
                                                    <input type="text" class="form-control" id="participantsLastName7" name="participantsLastName7">
                                                    <span id="participantsLastName7-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber7" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 7</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber7" name="participantsWaterCertificationNumber7">
                                                    <span id="participantsWaterCertificationNumber7-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded7" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 7</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded7" name="participantsCEUAwarded7">
                                                    <span id="participantsCEUAwarded7-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">8</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName8" class="pl-3 col-form-label labelAlign d-none">Participants First Name 8</label>
                                                    <input type="text" class="form-control" id="participantsFirstName8" name="participantsFirstName8">
                                                    <span id="participantsFirstName8-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName8" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 8</label>
                                                    <input type="text" class="form-control" id="participantsLastName8" name="participantsLastName8">
                                                    <span id="participantsLastName8-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber8" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 8</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber8" name="participantsWaterCertificationNumber8">
                                                    <span id="participantsWaterCertificationNumber8-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded8" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 8</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded8" name="participantsCEUAwarded8">
                                                    <span id="participantsCEUAwarded8-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">9</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName9" class="pl-3 col-form-label labelAlign d-none">Participants First Name 9</label>
                                                    <input type="text" class="form-control" id="participantsFirstName9" name="participantsFirstName9">
                                                    <span id="participantsFirstName9-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName9" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 9</label>
                                                    <input type="text" class="form-control" id="participantsLastName9" name="participantsLastName9">
                                                    <span id="participantsLastName9-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber9" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 9</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber9" name="participantsWaterCertificationNumber9">
                                                    <span id="participantsWaterCertificationNumber9-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded9" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 9</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded9" name="participantsCEUAwarded9">
                                                    <span id="participantsCEUAwarded9-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">10</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName10" class="pl-3 col-form-label labelAlign d-none">Participants First Name 10</label>
                                                    <input type="text" class="form-control" id="participantsFirstName10" name="participantsFirstName10">
                                                    <span id="participantsFirstName10-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName10" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 10</label>
                                                    <input type="text" class="form-control" id="participantsLastName10" name="participantsLastName10">
                                                    <span id="participantsLastName10-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber10" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 10</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber10" name="participantsWaterCertificationNumber10">
                                                    <span id="participantsWaterCertificationNumber10-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded10" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 10</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded10" name="participantsCEUAwarded10">
                                                    <span id="participantsCEUAwarded10-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">11</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName11" class="pl-3 col-form-label labelAlign d-none">Participants First Name 11</label>
                                                    <input type="text" class="form-control" id="participantsFirstName11" name="participantsFirstName11">
                                                    <span id="participantsFirstName11-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName11" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 11</label>
                                                    <input type="text" class="form-control" id="participantsLastName11" name="participantsLastName11">
                                                    <span id="participantsLastName11-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber11" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 11</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber11" name="participantsWaterCertificationNumber11">
                                                    <span id="participantsWaterCertificationNumber11-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded11" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 11</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded11" name="participantsCEUAwarded11">
                                                    <span id="participantsCEUAwarded11-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">12</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName12" class="pl-3 col-form-label labelAlign d-none">Participants First Name 12</label>
                                                    <input type="text" class="form-control" id="participantsFirstName12" name="participantsFirstName12">
                                                    <span id="participantsFirstName12-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName12" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 12</label>
                                                    <input type="text" class="form-control" id="participantsLastName12" name="participantsLastName12">
                                                    <span id="participantsLastName12-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber12" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 12</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber12" name="participantsWaterCertificationNumber12">
                                                    <span id="participantsWaterCertificationNumber12-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded12" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 12</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded12" name="participantsCEUAwarded12">
                                                    <span id="participantsCEUAwarded12-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <th scope="row">13</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName13" class="pl-3 col-form-label labelAlign d-none">Participants First Name 13</label>
                                                    <input type="text" class="form-control" id="participantsFirstName13" name="participantsFirstName13">
                                                    <span id="participantsFirstName3-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName13" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 13</label>
                                                    <input type="text" class="form-control" id="participantsLastName13" name="participantsLastName13">
                                                    <span id="participantsLastName13-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber13" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 13</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber13" name="participantsWaterCertificationNumber13">
                                                    <span id="participantsWaterCertificationNumber13-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded13" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 13</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded13" name="participantsCEUAwarded13">
                                                    <span id="participantsCEUAwarded13-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">14</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName14" class="pl-3 col-form-label labelAlign d-none">Participants First Name 14</label>
                                                    <input type="text" class="form-control" id="participantsFirstName14" name="participantsFirstName14">
                                                    <span id="participantsFirstName14-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName14" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 14</label>
                                                    <input type="text" class="form-control" id="participantsLastName14" name="participantsLastName14">
                                                    <span id="participantsLastName14-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber14" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 14</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber14" name="participantsWaterCertificationNumber14">
                                                    <span id="participantsWaterCertificationNumber14-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded14" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 14</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded14" name="participantsCEUAwarded14">
                                                    <span id="participantsCEUAwarded14-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">15</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName15" class="pl-3 col-form-label labelAlign d-none">Participants First Name 15</label>
                                                    <input type="text" class="form-control" id="participantsFirstName15" name="participantsFirstName15">
                                                    <span id="participantsFirstName15-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName15" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 15</label>
                                                    <input type="text" class="form-control" id="participantsLastName15" name="participantsLastName15">
                                                    <span id="participantsLastName15-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber15" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 15</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber15" name="participantsWaterCertificationNumber15">
                                                    <span id="participantsWaterCertificationNumber15-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded15" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 15</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded15" name="participantsCEUAwarded15">
                                                    <span id="participantsCEUAwarded15-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">16</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName16" class="pl-3 col-form-label labelAlign d-none">Participants First Name 16</label>
                                                    <input type="text" class="form-control" id="participantsFirstName16" name="participantsFirstName16">
                                                    <span id="participantsFirstName16-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName16" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 16</label>
                                                    <input type="text" class="form-control" id="participantsLastName16" name="participantsLastName16">
                                                    <span id="participantsLastName16-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber16" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 16</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber16" name="participantsWaterCertificationNumber16">
                                                    <span id="participantsWaterCertificationNumber16-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded16" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 16</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded16" name="participantsCEUAwarded16">
                                                    <span id="participantsCEUAwarded16-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">17</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName17" class="pl-3 col-form-label labelAlign d-none">Participants First Name 17</label>
                                                    <input type="text" class="form-control" id="participantsFirstName17" name="participantsFirstName17">
                                                    <span id="participantsFirstName17-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName17" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 17</label>
                                                    <input type="text" class="form-control" id="participantsLastName17" name="participantsLastName17">
                                                    <span id="participantsLastName17-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber17" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 17</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber17" name="participantsWaterCertificationNumber17">
                                                    <span id="participantsWaterCertificationNumber17-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded17" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 17</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded17" name="participantsCEUAwarded17">
                                                    <span id="participantsCEUAwarded17-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">18</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName18" class="pl-3 col-form-label labelAlign d-none">Participants First Name 18</label>
                                                    <input type="text" class="form-control" id="participantsFirstName18" name="participantsFirstName18">
                                                    <span id="participantsFirstName18-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName18" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 18</label>
                                                    <input type="text" class="form-control" id="participantsLastName18" name="participantsLastName18">
                                                    <span id="participantsLastName18-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber18" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 18</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber18" name="participantsWaterCertificationNumber18">
                                                    <span id="participantsWaterCertificationNumber18-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded18" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 18</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded18" name="participantsCEUAwarded18">
                                                    <span id="participantsCEUAwarded18-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">19</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName19" class="pl-3 col-form-label labelAlign d-none">Participants First Name 19</label>
                                                    <input type="text" class="form-control" id="participantsFirstName19" name="participantsFirstName19">
                                                    <span id="participantsFirstName19-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName19" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 19</label>
                                                    <input type="text" class="form-control" id="participantsLastName19" name="participantsLastName19">
                                                    <span id="participantsLastName19-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber19" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 19</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber19" name="participantsWaterCertificationNumber19">
                                                    <span id="participantsWaterCertificationNumber19-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded19" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 19</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded19" name="participantsCEUAwarded19">
                                                    <span id="participantsCEUAwarded19-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">20</th>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsFirstName20" class="pl-3 col-form-label labelAlign d-none">Participants First Name 20</label>
                                                    <input type="text" class="form-control" id="participantsFirstName20" name="participantsFirstName20">
                                                    <span id="participantsFirstName20-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsLastName20" class="pl-3 col-form-label labelAlign d-none">Participants Last Name 20</label>
                                                    <input type="text" class="form-control" id="participantsLastName20" name="participantsLastName20">
                                                    <span id="participantsLastName20-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsWaterCertificationNumber20" class="pl-3 col-form-label labelAlign d-none">Participants Water Certification Number 20</label>
                                                    <input type="text" class="form-control" id="participantsWaterCertificationNumber20" name="participantsWaterCertificationNumber20">
                                                    <span id="participantsWaterCertificationNumber20-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label for="participantsCEUAwarded20" class="pl-3 col-form-label labelAlign d-none">Participants CEU Awarded 20</label>
                                                    <input type="text" class="form-control" id="participantsCEUAwarded20" name="participantsCEUAwarded20">
                                                    <span id="participantsCEUAwarded20-info" class="text-danger float-right"></span>
                                                </div>
                                            </td>
                                        </tr> -->
                                    </tbody>
                                </table>
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
                            jQuery.validator.addMethod("lettersonly", function(value, element) {
                                return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
                            }, "Letters only please");

                            jQuery.validator.addMethod("alphanumeric", function(value, element) {
                                return this.optional(element) || /^[\w.]+$/i.test(value);
                            }, "Letters, numbers, and underscores only please");

                            $( "#dateOfTraining" ).datepicker( {
                                changeMonth: true,
                                changeYear: true,
                                dateFormat: 'dd/mm/yy',
                                yearRange: "1955:+2",
                                maxDate: "+2Y"
                            } );
                            $( "#dateOfceuAssignment" ).datepicker( {
                                changeMonth: true,
                                changeYear: true,
                                dateFormat: 'dd/mm/yy',
                                yearRange: "1955:+2",
                                maxDate: "+2Y"
                            } );
                            $("#tcs-professional-growth-training-roster-form").validate({
                                errorClass: "text-danger",
                                rules: {
                                    coursetitle: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 255,
                                        lettersonly: true,
                                    },
                                    locationOfTrainingCity: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 88,
                                        lettersonly: true,
                                    },
                                    attachAddressProof: {
                                        required: true
                                    },
                                    dateOfTraining: {
                                        required: true
                                    },
                                    ceuIdNumber: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 88,
                                        alphanumeric: true,
                                    },
                                    dateOfceuAssignment: {
                                        required: true
                                    },
                                    ceuAssigned: {
                                        required: true,
                                        minlength: 3,
                                        maxlength: 88,
                                        alphanumeric: true,
                                    },
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
                                    participantsFirstName1: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName1: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber1: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded1: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName2: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName2: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber2: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded2: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName3: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName3: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber3: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded3: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName4: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName4: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber4: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded4: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName5: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName5: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber5: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded5: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName6: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName6: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber6: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded6: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName7: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName7: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber7: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded7: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName8: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName8: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber8: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded8: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName9: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName9: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber9: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded9: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName10: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName10: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber10: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded10: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    
                                    participantsFirstName11: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName11: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber11: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded11: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsFirstName12: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsLastName12: {
                                        minlength: 3,
                                        maxlength: 63,
                                        lettersonly: true,
                                    },
                                    participantsWaterCertificationNumber12: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    },
                                    participantsCEUAwarded12: {
                                        minlength: 3,
                                        maxlength: 128,
                                        alphanumeric: true,
                                    }
                                },
                                messages: {
                                    coursetitle: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 255 Chracters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    locationOfTrainingCity: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 88 Chracters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    attachAddressProof: {
                                        required: "Required!"
                                    },
                                    dateOfTraining: {
                                        required: "Required!"
                                    },
                                    ceuIdNumber: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 88 Chracters",
                                        alphanumeric: "Only Alphanumeric Please!"
                                    },
                                    dateOfceuAssignment: {
                                        required: "Required!"
                                    },
                                    ceuAssigned: {
                                        required: "Required!",
                                        minlength: "Min. 3 Chracters",
                                        maxlength: "Max. 88 Chracters",
                                        alphanumeric: "Only Alphanumeric Please!"
                                    },
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
                                    participantsFirstName1: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName1: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber1: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded1: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName2: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName2: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber2: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded2: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName3: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName3: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber3: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded3: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName4: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName4: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber4: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded4: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName5: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName5: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber5: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded5: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName6: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName6: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber6: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded6: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName7: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName7: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber7: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded7: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName8: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName8: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber8: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded8: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName9: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName9: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber9: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded9: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName10: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName10: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber10: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded10: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    
                                    participantsFirstName11: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName11: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber11: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded11: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsFirstName12: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsLastName12: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 63 Characters",
                                        lettersonly: "Only Letters Please!",
                                    },
                                    participantsWaterCertificationNumber12: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    },
                                    participantsCEUAwarded12: {
                                        minlength: "Min. 3 Characters",
                                        maxlength: "Max. 128 Characters",
                                        alphanumeric: "Only Alphanumeric Please!",
                                    }
                                },
                                submitHandler: function(form) {
                                    $.ajax({
                                        url: "/ajax/save-tcs-professional-growth-training-roster-form-query.php",
                                        method: "POST",
                                        data: {
                                            coursetitle:  $("#coursetitle").val(),
                                            locationOfTrainingCity:  $("#locationOfTrainingCity").val(),
                                            attachAddressProof:  $("#attachAddressProof")[0].checked,
                                            dateOfTraining:  $("#dateOfTraining").val(),
                                            ceuIdNumber:  $("#ceuIdNumber").val(),
                                            dateOfceuAssignment:  $("#dateOfceuAssignment").val(),
                                            ceuAssigned:  $("#ceuAssigned").val(),
                                            sponsoringOrganization:  $("#sponsoringOrganization").val(),
                                            contactName:  $("#contactName").val(),
                                            company:  $("#company").val(),
                                            address1:  $("#address1").val(),
                                            address2:  $("#address2").val(),
                                            city:  $("#city").val(),
                                            state:  $("#state").val(),
                                            zipCode:  $("#zipCode").val(),
                                            email:  $("#email").val(),
                                            phoneNumber: $("#phoneNumber").val(),
                                            participantsFirstName1:  $("#participantsFirstName1").val(),
                                            participantsLastName1:  $("#participantsLastName1").val(),
                                            participantsWaterCertificationNumber1:  $("#participantsWaterCertificationNumber1").val(),
                                            participantsCEUAwarded1:  $("#participantsCEUAwarded1").val(),
                                            participantsFirstName2:  $("#participantsFirstName2").val(),
                                            participantsLastName2:  $("#participantsLastName2").val(),
                                            participantsWaterCertificationNumber2:  $("#participantsWaterCertificationNumber2").val(),
                                            participantsCEUAwarded2:  $("#participantsCEUAwarded2").val(),
                                            participantsFirstName3:  $("#participantsFirstName3").val(),
                                            participantsLastName3:  $("#participantsLastName3").val(),
                                            participantsWaterCertificationNumber3:  $("#participantsWaterCertificationNumber3").val(),
                                            participantsCEUAwarded3:  $("#participantsCEUAwarded3").val(),
                                            participantsFirstName4:  $("#participantsFirstName4").val(),
                                            participantsLastName4:  $("#participantsLastName4").val(),
                                            participantsWaterCertificationNumber4:  $("#participantsWaterCertificationNumber4").val(),
                                            participantsCEUAwarded4:  $("#participantsCEUAwarded4").val(),
                                            participantsFirstName5:  $("#participantsFirstName5").val(),
                                            participantsLastName5:  $("#participantsLastName5").val(),
                                            participantsWaterCertificationNumber5:  $("#participantsWaterCertificationNumber5").val(),
                                            participantsCEUAwarded5:  $("#participantsCEUAwarded5").val(),
                                            participantsFirstName6:  $("#participantsFirstName6").val(),
                                            participantsLastName6:  $("#participantsLastName6").val(),
                                            participantsWaterCertificationNumber6:  $("#participantsWaterCertificationNumber6").val(),
                                            participantsCEUAwarded6:  $("#participantsCEUAwarded6").val(),
                                            participantsFirstName7:  $("#participantsFirstName7").val(),
                                            participantsLastName7:  $("#participantsLastName7").val(),
                                            participantsWaterCertificationNumber7:  $("#participantsWaterCertificationNumber7").val(),
                                            participantsCEUAwarded7:  $("#participantsCEUAwarded7").val(),
                                            participantsFirstName8:  $("#participantsFirstName8").val(),
                                            participantsLastName8:  $("#participantsLastName8").val(),
                                            participantsWaterCertificationNumber8:  $("#participantsWaterCertificationNumber8").val(),
                                            participantsCEUAwarded8:  $("#participantsCEUAwarded8").val(),
                                            participantsFirstName9:  $("#participantsFirstName9").val(),
                                            participantsLastName9:  $("#participantsLastName9").val(),
                                            participantsWaterCertificationNumber9:  $("#participantsWaterCertificationNumber9").val(),
                                            participantsCEUAwarded9:  $("#participantsCEUAwarded9").val(),
                                            participantsFirstName10:  $("#participantsFirstName10").val(),
                                            participantsLastName10:  $("#participantsLastName10").val(),
                                            participantsWaterCertificationNumber10:  $("#participantsWaterCertificationNumber10").val(),
                                            participantsCEUAwarded10:  $("#participantsCEUAwarded10").val(),
                                            participantsFirstName11:  $("#participantsFirstName11").val(),
                                            participantsLastName11:  $("#participantsLastName11").val(),
                                            participantsWaterCertificationNumber11:  $("#participantsWaterCertificationNumber11").val(),
                                            participantsCEUAwarded11:  $("#participantsCEUAwarded11").val(),
                                            participantsFirstName12:  $("#participantsFirstName12").val(),
                                            participantsLastName12:  $("#participantsLastName12").val(),
                                            participantsWaterCertificationNumber12:  $("#participantsWaterCertificationNumber12").val(),
                                            participantsCEUAwarded12:  $("#participantsCEUAwarded12").val()


                                        },
                                        dataType: "json",
                                        beforeSend: function() {
                                            $("#contactsubmit").attr("disabled",
                                                "disabled");
                                        },
                                        success: function(data) {
                                            if (data.status == "success") {
                                                $("#tcs-professional-growth-training-roster-form")[
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