<?php
/*
  Template Name: Water Works Operator
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
    <div class="container-fluid main-banner mhB-340 banner">
      <div class="banner-img"
        style="background: url('<?php echo site_url();?>/wp-content/uploads/2020/11/waterwork.png') no-repeat center/ cover;"></div>
      <div class="container">
        <div class="row banner-content mhB-340">
          <div class="page-title-wrap py-4">
            <h1 class="page-title text-white"><?php echo get_the_title();?></h1>
            
          </div>
        </div>
      </div>
    </div><!-- /. Banner -->

    <!-- Breadcrumb -->
    <div class="container-fluid breadcrumb_outer bg-f5 pt-4 pb-3">
      <div class="container">
        <div class="row breadcrumb_wrap d-flex justify-content-start align-items-center">
          <span>You are here :</span>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item bold"><a href="<?php echo site_url(); ?>">WCS</a></li>
              <li class="breadcrumb-item active" aria-current="page"> <?php echo get_the_title();?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div><!-- /. Breadcrumb -->

    <!-- Main Content -->
    <div class="container-fluid bg-f5 py-3">
      <div class="container">
        <div class="row text-grey">
            <?php
            $myposts = get_wwo_landing_page_desc_posts('');
                foreach ($myposts as $post) :
                setup_postdata($post);
            ?>	
                <?php the_excerpt();?>

                <?php endforeach;
            wp_reset_postdata();
            ?>		
        </div>
      </div>
    </div><!-- /. Main Content -->

    <!-- Main Services -->
    <div class="container-fluid bg-eb py-5">
      <div class="container">
        <ul class="row px-0 list-style-none infobox_row row-eq-heigh">
            <?php
                $myposts = get_wwo_landing_page_widget_posts('');
                    foreach ($myposts as $post) :
                    setup_postdata($post);

                    
            ?>	
            <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
            <li class="col-12 col-md-6 col-lg-4 px-2 pt-3 infoboxlist align-items-center">
            <a href="<?php echo get_permalink($post->ID) ?>">
              <div class="infobox_inn d-flex align-items-center bg-white p-4 eq-height" style="height:141px">
                <svg class="svgicon w93px fill-prime" viewBox="0 8 65 52">
                  <!--<use
                    xlink:href="assets/images/water-work-operator/icon-professional-growth-requirement.svg#icon-pgr">
                  </use>
                  <use
                    xlink:href="<?php //echo $img[0]; ?>">
                  </use>-->
                  <img class="img-fluid" src="<?php echo $img[0]; ?>" alt="" style="padding-right:10px">
                </svg>
                 
                <div class="ib_content">
                  <h2 class="ib_title"><?php echo $post->post_title; ?></h2>
                </div>
              </div>
            </a>
          </li>
            <?php 
                endforeach;
                wp_reset_postdata();
            ?>		
        </ul>
        <div class="row px-0 pt-5 list-style-none infobox_row row-eq-heigh">
          <div class="col-12 col-md-12 col-lg-12 px-2 pt-3 infoboxlist align-items-center">
            <!-- <a href="#!"> -->
            <div class="infobox_inn d-flex flex-wrap flex-sm-nowrap align-items-center">
            <?php
                $myposts = wwo_landing_page_whats_new_posts('');
                    foreach ($myposts as $post) :
                    setup_postdata($post);
            ?>	
            <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
              <div class="ib_icon pr-md-5 pr-3 pb-4 pb-sm-1">
                <!--<img class="img-fluid mw-144" src="assets/images/water-work-operator/whats-new-icon.png" alt="">-->
                <img class="img-fluid mw-144" src="<?php echo $img[0]; ?>" alt="">
              </div>
              <div class="ib_content">
                <div class="sec-title-wrap">
                  <h3 class="sec-title c-prime"><?php echo $post->post_title; ?></h3>
                </div>
                <div class="ib-desc">
                  <?php the_content();?>
                </div>
              </div>
              <?php 
                endforeach;
                wp_reset_postdata();
            ?>		
            </div>
            <!-- </a> -->
          </div>
        </div>
      </div>
    </div><!-- /. Main Services -->

    <!-- Page Divider -->
    <div class="container-fluid page-divder bg-f5"></div>
    <!-- /. Page Divider -->

  </div>
<?php
do_action('ecommerce_gem_action_sidebar');

get_footer();
?>