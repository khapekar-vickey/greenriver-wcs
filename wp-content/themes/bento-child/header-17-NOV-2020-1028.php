<?php // The template part for displaying the header of the website ?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	
    <?php // This part includes meta information and functions ?>
    
    <head>
    	        
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

			<!--<header class="site-header no-fixed-header">
            	<div class="bnt-container">-->
			<header>
				<div class="container-fluid">
					<div class="row topbar-1">
						<div class="container d-flex flex-row justify-content-around align-items-center flex-wrap">
							<?php bento_mobile_menu(); ?>

							<?php bento_logo(); ?>

							<?php bento_primary_menu(); ?>

						</div>
					</div>
				</div>
				<div class="row topbar-2">
              <div class="container text-center d-flex flex-row justify-content-around align-items-center flex-wrap" style="margin-bottom:-15px">
                <div class="d-flex justify-content-around align-items-center flex-wrap">
                  <div class="contact m-2">
                    <img src="<?php echo site_url();?>/wp-content/uploads/2020/11/Phone.svg" />
                    <span class="ml-2">: 234-564-678</span>
                  </div>
                  <div class="contact m-2">
                    <img src="<?php echo site_url();?>/wp-content/uploads/2020/11/Email.svg" />
                    <span class="ml-2">: wcs@greenriver.edu</span>
                  </div>
                </div>
                <div class=" d-flex top-form flex-wrap align-items-center justify-content-center">
                  <input
                    type="text"
                    class="form-control m-3"
                    style=" width:300px;padding: 10px 5px !important; font-size: 1.5rem; line-height: 1.0; color: #495057; background-color: #fff; background-clip: padding-box; border: 1px solid #ced4da; border-radius: 5px !important;"
                    placeholder="Search here..."
                  />
                  <button type="submit" class="btn login-btn m-3">
                    Employee Login
                  </button>
                </div>
              </div>
            </div>
            </header>
			
			<!-- .site-header -->
						
			<?php bento_post_header(); ?>
				        
        	<div class="site-content">