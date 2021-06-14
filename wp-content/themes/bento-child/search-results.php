<?php // The default template for displaying content ?>

<div id="post-<?php the_ID(); ?>" <?php post_class('mb-5'); ?> > 

	<?php 
	
	//bento_post_date_blog(); 
	
	//bento_post_thumbnail();
	
	bento_post_title();
	echo get_the_excerpt();
	
	//bento_post_content();
	
	//bento_entry_meta();
	
	//bento_author_info();
	
	?>
		
 </div> 