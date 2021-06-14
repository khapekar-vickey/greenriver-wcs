<!DOCTYPE html>
<?php // The template part for displaying the header of the website ?>

<html <?php language_attributes(); ?>>
	
    <?php // This part includes meta information and functions ?>
    
    <head>
              
    <style>
      ::placeholder{
        font-style: normal !important;
      }
    </style>
    <script type="text/javascript">

</script>
		<?php // Various utilities ?>
    	<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
            	
		<?php // Tag for including header files; should always be the last element inside the <head> section ?>
		<?php wp_head(); ?>
        
    </head>
    
    
    <?php // This encompasses the visible part of the website ?>
    
    <body <?php body_class(); ?>>
	
		<?php do_action('bento_body_top'); ?>
         				
		<div class="site-wrapper clear">
      <a class="skip-main" href="#skip-main">Skip to main content</a>
			<!--<header class="site-header no-fixed-header">
            	<div class="bnt-container">-->
      
			<header role="banner">

        <!-- *************** Hide Show Banner Start - Date 11-01-2021 *************** -->
        <?php
          $page_id = get_queried_object_id();
           if ( $page_id == 49 || $page_id == 413 || $page_id == 881 || $page_id == 992 || $page_id == 1041 || $page_id == 1046) { 
            $bannershowhide = get_field('top_banner_show_hide_button', $page_id);
          ?>
          <div class="top-header-banner <?php echo $bannershowhide; ?>">
            <button type="button" class="close TB_close" id="TB_close" style="color: #fff; font-size: 2rem;margin: 0 5px; opacity: unset;" aria-label="close">&times;</button>
            <div class="container-fluid " style="background-color: #1B5F2B;">
              <div class="text-white text-center">
                <h2 style="font-size: 1.8rem;"><?php echo get_field('top_banner_title', $page_id); ?></h2>
                <p class="mb-0" style="font-size: 1.7rem;padding:0 0 10px 0;"><?php echo get_field('top_banner_description', $page_id); ?></p>
                <!-- <a href="<?php echo $readmore_btn_url;?>">Read More</a> -->
              </div>
            </div>
          </div>
        <?php 
           }
        ?>
        <!-- *************** Hide Show Banner End - Date 11-01-2021 (Vickey)*************** -->
				<div class="container-fluid">
					<div class="row topbar-1">
						<!--<div class="container d-flex flex-row justify-content-around align-items-center flex-wrap">-->
						<!--<div class="d-flex justify-content-around align-items-center flex-wrap">-->
<!-- 						<div class="d-flex justify-content-around align-items-center flex-wrap"> -->
						<div class="d-flex container-fluid  justify-content-between align-items-center flex-wrap">
							<?php bento_mobile_menu(); ?>

							<?php bento_logo(); ?>

							<?php bento_primary_menu(); ?>

						</div>
					</div>
				</div>
				<div class="row topbar-2 mr-0">
              <div class="container-fluid text-center d-flex justify-content-between align-items-center flex-wrap con" style="width: 100%; margin-bottom:-22px;margin-top: 5px;">
                <div class="d-flex justify-content-around align-items-center flex-wrap spe-sec mob-view">
                  <!-- <div class="contact mt-2">
                    <img src="<?php echo site_url();?>/wp-content/uploads/2020/11/Phone.svg"  alt="phone"/>
                    <span class="ml-2 bold">:</span>
                    <a class="ml-2" href="tel:234-564-678">234-564-678</a>
                  </div>
                  <div class="contact mt-2">
                    <img src="<?php echo site_url();?>/wp-content/uploads/2020/11/Email.svg"  alt="email"/>
                    <span class="ml-2 bold">:</span>
                    <a class="ml-2" href="mailto:wcs@greenriver">wcs@greenriver.edu</a>
                  </div> -->
                  <?php
                    if (have_rows('sidebar_components_general_setting', 'option')):
                      while (have_rows('sidebar_components_general_setting', 'option')): the_row();
                        if (get_row_layout() == 'haeader_phone_no_and_email'):
                  ?>  
                          <div class="contact mt-2">
                          <?php
                            $phoneno = get_sub_field('header_phone_no', 'option');
                            $phonenoImgurl = get_sub_field('header_phone_image', 'option');
                          ?>
                            <img src="<?php echo $phonenoImgurl;?>"  alt="phone"/>
                            <span class="ml-2 bold">:</span>
                            <a class="ml-2" href="tel:'<?php echo $phoneno;?>'"><?php echo $phoneno;?></a>
                          </div>
                          <div class="contact mt-2">
                          <?php
                            $email = get_sub_field('header_email', 'option');
                            $emailImgurl = get_sub_field('header_email_image', 'option');
                          ?>
                            <img src="<?php echo $emailImgurl;?>"  alt="email"/>
                            <span class="ml-2 bold">:</span>
                            <a class="ml-2" href="mailto:'<?php echo $email;?>'"><?php echo $email;?></a>
                          </div>
                  <?php
                        endif;
                      endwhile;
                    endif;
                  ?>
                </div>
                <div class=" d-flex top-form flex-wrap align-items-center justify-content-center spe-sec mob-view">
                  <!-- <input
                    type="text"
                    class="form-control m-3"
                    style="width: 300px; border-radius: 1px !important; font-size: 12px !important; height: 33px; margin-bottom: 14px !important; font-weight: 400; font-family: 'Roboto', sans-serif;" placeholder="Search here..."
                  /> -->
                  <!--<button type="submit" class="btn login-btn m-3">
                    Employee Login
                  </button>-->
                  <?php echo get_search_form(); ?>
                </div>
              </div>
            </div>
            </header>		
	
			<!-- .site-header -->
						
			<?php bento_post_header(); ?>
				        
        	<div class="site-content">
            