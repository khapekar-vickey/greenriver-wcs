<?php
/*
  Template Name: WWO Declaration of Self-Paced Training Examination Monitoring Forms
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
    <div class="container-fluid main-banner mhB-225 banner">
        <div class="banner-img"
            style="background: url('<?php echo site_url();?>/wp-content/uploads/2020/11/sub-page-banner2k.jpg') no-repeat center/ cover;">
        </div>
        <div class="container">
            <div class="row banner-content mhB-225">
                <div class="page-title-wrap py-4">
                    <?php $category = get_the_category();
            $category_parent_id = $category[0]->category_parent;
            $category_parent = get_category($category_parent_id);
           ?>
                    <h1 class="page-title text-white">
                        <?php //echo $category_parent->name;?><br /><?php echo get_the_title();?> </h1>
                </div>
            </div>
        </div>
    </div><!-- /. Banner -->

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
        <div class="container live-content">
            <div class="row flex-row-reverse text-grey pb-5">
                <!--<div class="right pt-3">-->
                <div class="col-12 col-md-8 col-lg-9">

                    <h3 class="headingAlign col-sm-12">Examination Monitoring Declaration </h3>
                    <p class="para2 col-sm-12">
                        I have read, understand and followed the Department of Health's <a href="/self-paced-training-approval-and-examination-procedure/">Distance Education
                            Approval and Examination Procedure</a>. I certify that I personally monitored the
                        examination/s for the following course on the dates listed, and the student named below
                        completed it whithout assistance from any source except as listed in the procedure.
                    </p>
                    <form class="para form-data col-sm-12">
                        <div class=" form-group ">
                            <label for="studentName" class="col-sm-6 col-form-label labelAlign">Student Name <span
                                    class="printPleaseAlign">(Please Print)</span></label>
                            <input type="text" class="form-control col-sm-10" id="studentName">
                            <span id="studentName-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group">
                            <label for="courseTitle" class="col-sm-6 col-form-label labelAlign">Course Title</label>
                            <input type="text" class="form-control col-sm-10" id="courseTitle">
                            <span id="courseTitle-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group">
                            <label for="Course Sponser" class="col-sm-6 col-form-label labelAlign">Course
                                Sponser</label>
                            <input type="text" class="form-control col-sm-10" id="courseSponser">
                            <span id="courseSponser-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group">
                            <label for="examinationDate" class="col-sm-6 col-form-label labelAlign">Examination Date/s
                            </label>
                            <input type="date" id="date" name="date" class="col-sm-10 form-control" required />
                            <span id="date-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group">
                            <label for="examinationLocation" class="col-sm-6 col-form-label labelAlign">Examination
                                Location</label>
                            <!--<select id="examinationLocation" class="col-sm-10 form-control">
                                  <option value="" disabled selected></option>
                                </select>-->
                            <input type="text" class="form-control col-sm-10 monitorEmployee" id="examinationLocation">
                            <span id="examinationLocation-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group">
                            <label for="examMonitorName" class="col-sm-6 col-form-label labelAlign">Exam Monitor Name
                                <span class="printPleaseAlign">(Please Print)</span></label>
                            <input type="text" class="form-control col-sm-10 monitorEmployee" id="examMonitorName">
                            <span id="examMonitorName-info" class="text-danger float-right"></span>
                        </div>

                        <div class=" form-group">
                            <label for="relationship" class="col-sm-6 col-form-label labelAlign">Relationship to
                                Student</label>
                            <input type="text" class="form-control col-sm-10 monitorEmployee" id="relationship">
                            <span id="courseTitle-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group ">
                            <label for="examMonitorEmployee" class="col-sm-6 col-form-label labelAlign">Exam Monitor's
                                Employer</label>
                            <input type="text" class="form-control col-sm-10 monitorEmployee" id="examMonitorEmployee">
                            <span id="examMonitorEmployee-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group">
                            <label for="employerAddress" class="col-sm-6 col-form-label labelAlign">Employer
                                Address</label>
                            <input type="text" class="form-control col-sm-10" id="employerAddress" />
                            <span id="employerAddress-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group">
                            <label for="city" class="col-sm-6 col-form-label labelAlign">City</label>
                            <!--<select class="form-control col-sm-10" id="examMonitorEmployee">
                                  <option value="" disabled selected></option>
                                </select>-->
                            <input type="text" class="form-control col-sm-10" id="city" />
                            <span id="city-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-sm-6 col-form-label labelAlign">State</label>
                            <!--<select class="form-control col-sm-10">
                                  <option value="" disabled selected></option>
                                </select>-->
                            <input type="text" class="form-control col-sm-10" id="state" />
                            <span id="state-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group">
                            <label for="zipCode" class="col-sm-6 col-form-label labelAlign">Zip Code</label>
                            <input type="tel" class="form-control col-sm-10" id="zipCode" maxlength="6" />
                            <span id="zipCode-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group ">
                            <label for="jobTitle" class="col-sm-6 col-form-label labelAlign">Job Title</label>
                            <input type="text" class="form-control col-sm-10 col-form-label" id="jobTitle" />
                            <span id="jobTitle-info" class="text-danger float-right"></span>
                        </div>
                        <div class="form-group">
                            <label for="businessPhone" class="col-sm-6 col-form-label labelAlign">Business Phone</label>
                            <input type="tel" class="col-sm-10 form-control" id="businessPhone" maxlength="10"
                                required />
                            <span id="businessPhone-info" class="text-danger float-right"></span>
                        </div>
                        <!-- <div class="form-group row signature-date">
                                <label for="examMonitorSignature" class="col-sm-7 col-form-label">Exam Monitor Signature</label>
                                <label for="date" class="col-sm-4 col-form-label date">Date</label>
                              </div>
                              <div class="form-group row">
                                <input type="text" class="col-sm-7 form-control signature" id="signature" />
                                <input type="text" class="col-sm-3 form-control date-input " id="date" />
                              </div> -->

                        <br>
                        <h3> Student Declaration </h3>

                        <!-- <form class="para form-data"> -->
                        <p class="labelAlign col-md-12 para2">I have read, understand, and followed the Department of
                            Health's <a href="/self-paced-training-approval-and-examination-procedure/">
                                Self-Placed Training Approval and Examination Procedure</a>.I certify that I personally
                            completed the course listed above and that my was based solely on my own personal efforts. I
                            also certify that I have personally completed the examination/s in the presence of the
                            examination monitor listed above whitout assitance from any source except as listed in the
                            procedure. </p>

                        <div class="form-group ">
                            <label for="studentDecName" class="col-sm-6 col-form-label labelAlign">Student Name <span
                                    class="printPleaseAlign">(Please Print)</span></label>
                            <input type="text" class="form-control col-sm-10" id="studentDecName">
                            <span id="studentDecName-info" class="text-danger float-right"></span>
                        </div>
                        <div class=" form-group">
                            <label for="wwocertificationNumber" class="col-sm-10 col-form-label labelAlign">Washington
                                Waterworks Operator Certification Number</label>
                            <input type="text" class="form-control col-sm-10" id="wwocertificationNumber">
                            <span id="wwocertificationNumber-info" class="text-danger float-right"></span>
                        </div>
                        <!-- <div class="form-group row signatureDate">
                                <label for="studentSignature" class="col-sm-7 col-form-label ">Student Signature</label>
                                <label for="date" class="col-sm-3 col-form-label date">Date</label>
                              </div>
                              <div class="form-group row">
                                <input type="text" class="col-sm-7 form-control signature" id="signature" />
                                <input type="text" class="col-sm-3 form-control dateInput " id="date" />
                            </div> -->

                        <button type="button" class="btn col-sm-2 button left" id="submit"> Submit</button><br />
                        <span id="loading" class="text-danger"></span>
                        <span id="mail-status"></span>
                    </form>
                </div>

                <div class="col-12 col-md-4 col-lg-3">
                    <ul class="secMenu nav nav-pills nav-fill flex-column">
                        <?php
            $pageUrl = get_page_link();
            $myposts = get_tcs_landing_page_widget_posts('');
             $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );
                foreach ($myposts as $post) :
                setup_postdata($post);
                $class = '';

                 $current_url = get_permalink($post->ID);
                 if($current_url == $pageUrl){
                    $class = 'active';
                    //$src = site_url().'/wp-content/uploads/2020/11/noun_online-video_2485264-2.svg';
                }else{
                    $class = "";
                    //$src = $img[0];
                }
                if($post->ID==272){
                    //$src = site_url().'/wp-content/uploads/2020/11/noun_e-book-reader_2485268-white.svg';
                    $src = site_url().'/wp-content/uploads/2020/11/icon-approved-live-training.svg';
                    $permalink = site_url().'/wwo-approved-live-training' ;
                }else{
                    $src1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );
                    $src = $src1[0];
                    $permalink = get_permalink($post->ID) ;
                }

                if($post->ID==276){
                    $class = 'active';
                    $src = site_url().'/wp-content/uploads/2020/11/noun_form_-1.svg';
                }

                if($post->ID==858){
                    $class = 'active';
                    //$src = site_url().'/wp-content/uploads/2020/11/noun_e-book-reader_2485268-white.svg';
                    $src = site_url().'/wp-content/uploads/2020/11/icon-approved-live-training.svg';
                    $permalink = site_url().'/wwo-approved-live-training' ;
                }
                 if($post->ID==861){
                    $class = 'active';
                    //$src = site_url().'/wp-content/uploads/2020/11/noun_e-book-reader_2485268-white.svg';
                    $src = site_url().'/wp-content/uploads/2020/11/icon-approved-live-training.svg';
                    $permalink = site_url().'/wwo-approved-live-training' ;
                }


                if($post->ID==141){
                $style="margin-left:-15px";
                }else if($post->ID==137){
                $style="margin-left:-10px";
                }else{
                $style='';
                }
            ?>
                        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center <?php echo $class?>"
                                style="padding: 1.9rem 2rem !important" href="<?php echo $permalink ?>">
                                <svg class="svgicon  icon-pgr" viewBox="0 8 65 52">
                                    <!--<use
                      xlink:href="<?php //echo site_url();?>/wp-content/uploads/2020/11/icon-professional-growth-requirement.svg#icon-pgr">
                    </use>-->
                                    <img class="img-fluid" src="<?php echo $src; ?>" alt=""
                                        style="padding-right:10px; <?php echo $style?>">
                                </svg>

                                <span><?php echo get_the_title();?></span>
                            </a>
                        </li>
                        <?php endforeach;
            wp_reset_postdata();
            ?>
                    </ul>
                    <!--<div class="search-box pt-5">
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
            </div>-->
                    <div class="single-info-box d-flex align-items-center pt-4">
                        <?php
            $myposts = wwo_professional_growth_requirement_washington_state_bat_public_list_posts('');
                foreach ($myposts as $post) :
                setup_postdata($post);
            ?>
                        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                        <!--<svg class="svgicon w105px icon-pgr fill-prime" viewBox="0 8 65 52">-->
                        <!--<use xlink:href="<?php echo site_url();?>/wp-content/uploads/2020/11/icon-professional-growth-requirement.svg#icon-pgr">
                </use>-->
                        <img src="<?php echo $img[0]; ?>" class="img-fluid" alt="" style="padding-right:10px">
                        </svg>
                        <span><?php echo get_the_title();?></span>
                        <?php endforeach;
               wp_reset_postdata();
              ?>
                    </div>
                    <div class="batalk-logo-wrap bg-70 mt-5">
                        <?php
            $myposts = wwo_professional_growth_requirement_batalkimg_posts('');
                foreach ($myposts as $post) :
                setup_postdata($post);
            ?>
                        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                        <img src="<?php echo $img[0]; ?>" class="img-fluid" alt="">
                        <?php endforeach;
                wp_reset_postdata();
              ?>
                    </div>
                    <div class="working-hours-box bg-prime text-white p-4 mt-5">
                        <?php
            $myposts = wwo_professional_growth_requirement_working_hours_posts('');
                foreach ($myposts as $post) :
                setup_postdata($post);
            ?>
                        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                        <div class="wh-title d-flex align-items-center pt-4">
                            <!--<img src="<?php echo site_url();?>/wp-content/themes/bento-child/images/clock-img.svg" class="pr-3" alt="" srcset="">-->
                            <img src="<?php echo $img[0]; ?>" class="pr-3" alt="" srcset="">
                            <h3 class="font27 pt-2" style="color:#fff"><?php echo get_the_title();?></h3>
                        </div>
                        <?php echo the_content();?>
                        <?php endforeach;
                wp_reset_postdata();
              ?>
                    </div>
                </div>

            </div>

        </div>
    </div><!-- /. Main Content -->
</div>
<?php
do_action('ecommerce_gem_action_sidebar');

get_footer();
?>