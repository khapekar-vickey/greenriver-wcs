<?php
/*
  Template Name: TCS Self-Paced Training Evaluation
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
            <h1 class="page-title text-white"><?php //echo $category_parent->name;?><br/><?php echo get_the_title();?> </h1>
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
              <li class="breadcrumb-item bold"><a href="<?php echo site_url(); ?>/<?php echo $category_parent->slug;?>"><?php echo $category_parent->name;?></a></li>
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
          <div class="col-12 col-md-7 col-lg-8">
            <div class="sec-title-wrap">
            <?php
            $myposts = tcs_self_paced_training_evaluation_desc_posts('');
                foreach ($myposts as $post) :
                setup_postdata($post);
            ?>	
            <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
              <h2 class="sec-title font-segoe-b">
                <?php echo get_the_title();?>
              </h2>
            </div>
            <div class="sec-title-wrap pt-5">
              <?php the_excerpt();?>
            </div>
             <img class="img-fluid" src="<?php echo $img[0]; ?>" alt="" style="padding-right:10px;">
            <div class="sec-title-wrap pt-5">
              <?php the_content();?>
            </div>
                <?php endforeach;
                wp_reset_postdata();
                ?>	

          </div>
          <div class="col-12 col-md-5 col-lg-4">
            <ul class="secMenu nav nav-pills nav-fill flex-column">
            <?php
            $pageUrl = get_page_link();
            $myposts = get_tcs_landing_page_widget_posts('');
                foreach ($myposts as $post) :
                setup_postdata($post);
                $class = '';
                 $current_url = get_permalink($post->ID);
                 if($current_url == $pageUrl){
                    $class = 'active';
                }else{
                    $class = "";
                }

                if($post->ID==274){
                    $src = site_url().'/wp-content/uploads/2020/11/noun_online-video-tutorial_2485276-white.svg';
                }else{
                    $src1 = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );
                    $src = $src1[0];
                }

                if($post->ID==272){
                    $permalink = site_url().'/wwo-approved-live-training' ;
                }else{
                    $permalink = get_permalink($post->ID) ;
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
                <a class="nav-link d-flex align-items-center <?php echo $class?>" style="padding: 1.9rem 2rem !important" href="<?php echo $permalink; ?>">
                  <svg class="svgicon  icon-pgr" viewBox="0 8 65 52">
                    <!--<use
                      xlink:href="<?php //echo site_url();?>/wp-content/uploads/2020/11/icon-professional-growth-requirement.svg#icon-pgr">
                    </use>-->
                    <img class="img-fluid" src="<?php echo $src; ?>" alt="" style="padding-right:10px; <?php echo $style?>">
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

            <div class=" container live-content-footer ">
                <div class="container-fluid float-left d-flex   align-items-center flex-wrap">
                <?php
            $myposts = tcs_live_training_and_conference_evaluation_whats_new_posts('');
                foreach ($myposts as $post) :
                setup_postdata($post);
            ?>	
            <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                <img src="<?php echo $img[0]; ?>" height="144" width="116" class="mr-3"/>
                <div class="d-flex flex-column ml-3">
                  <h4>
                   <?php echo get_the_title();?>
                  </h4>
                  <?php the_excerpt(); ?>
                  <a class="btn btn-primary " href="#">Know more</a>
                </div>
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