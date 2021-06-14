<?php // The template part for displaying the footer of the website ?>

            </div><!-- .site-content -->
			
			<?php // Ensure that the floats are cleared for the side-menu website layout ?>
			<div class="after-content">
			</div>
            
            <footer class="site-footer" role="contentinfo">
				
				<?php // Footer widget area ?>
				<?php if ( is_active_sidebar( 'bento_footer' )  ) { ?>
                    <div class="widget-area sidebar-footer clear">
                        <div class="bnt-container">
                            <?php dynamic_sidebar( 'bento_footer' ); ?>
                        </div>
                	</div>
                <?php } ?>
                    
				<?php // Footer menu and copyright area ?>
                <div class="bottom-footer clear">
                	<div class="bnt-container">
					
						<?php bento_footer_menu(); ?>
						
                        <?php //bento_copyright(); ?>
						<div class="copyright container bg-light">
          <div class="container footer-copyright">
            <?php echo do_shortcode('[BATPageFooterLink]')?> 
            <span class="c2">Copyright © <?php echo date("Y"); ?> Washington Certification Services. All Rights Reserved</span>
            <span class="back-to-top"><a href="#">Back To Top</a></span>
          </div>
        </div>
                    </div>
                </div>
                
            </footer><!-- .site-footer -->

		</div><!-- .site-wrapper -->
		
		<?php // Tag for including javascript in the footer; should always be the last element inside the <body> section ?>
		<?php wp_footer(); ?>
        
        <script type="text/javascript">
        // when we click on anchor tag + hash-accordion value then it will redirect to 
        // the respective page and open respective accordion
          if(window.location.hash) {
            var accordVal = window.location.hash.substr(1);
            setTimeout(function(){
              if(document.getElementById(accordVal)){
                document.getElementById(accordVal).click();
                jQuery('.card-body-wrap .prime-accordion .card:first-child .card-header button').attr('aria-expanded','true');
                jQuery('.card-body-wrap .prime-accordion .card:first-child .card-body-wrap').addClass('show');
              }
            }, 1000);
            console.log(accordVal);
            
          }
            jQuery(".skip-main").click(function() {
                jQuery('html, body').animate({
                    scrollTop: jQuery("#skip-main").offset().top - 50
                }, 2000);
            });

            jQuery(".back-to-top a").click(function() {
                jQuery('html, body').animate({
                    scrollTop: jQuery("body").offset().top
                }, 500);
            });
        </script>
        
	</body>
    
</html>