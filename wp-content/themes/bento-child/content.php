<?php // The default template for displaying content ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
 $category_name = get_the_category( $post->ID );
 
 /*====================Detailed page HTML for Blogs Category====================*/
 if(isset($category_name[0]) && !empty($category_name[0]) && $category_name[0]->name ==='Blogs'){
	 ?>
    <div class="innermain col-md-12 col-lg-12 col-xl-12 blog-detail">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-12">
                <div class="blog-detail-container wow fadeIn" data-wow-duration="2s" data-wow-delay="1s">
                    <div class="blog-detail-container-div">
                        <?php
	 bento_post_date_blog(); 
	$img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); 
	?>
                        <div class="blog-detail-container-div-post-img">
                            <img src="<?php echo $img[0]; ?>" alt="" class="img-responsive w-100">
                        </div>
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                        <div class="d-flex align-items-center">
                            <span class="pr-3">Share via: </span>
                            <?php echo do_shortcode('[Sassy_Social_Share]') ?>
                        </div>
                        <ul class="blog-detail-container-div-meta-data list-inline">
                        </ul>
                    </div>
                    <div class="blog-detail-container-content">
                        <?php 
	
	bento_post_content();
	?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <aside class="sidebar">
                    <?php get_search_form();?>
                    <h3>Recent Posts</h3>
                    <?php
	$myposts = get_recent_blog_posts('');
	foreach ($myposts as $post) :
		setup_postdata($post);
		?>
                    <ul class="recent-posts mt-4">
                        <li>
                            <div class="recent-posts-img mr-2">
                                <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                                <!-- <img src="<?php echo $img[0]; ?>" alt="" class="img-responsive"> -->
                                <?php if (class_exists('MultiPostThumbnails')) :
                                                        MultiPostThumbnails::the_post_thumbnail(
                                                            get_post_type(),
                                                            'secondary-image'
                                                        );
                                                endif; ?>
                            </div>
                            <a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                    <?php endforeach;
				wp_reset_postdata();
				?>

                    <?php
    $myposts = get_recent_blog_showmore_posts('');
    if(isset($myposts) && !empty($myposts)){
        ?>
                    <div id="demo" class="collapse">
                        <div>
                            <ul class="recent-posts mt-4">
                                <?php                          
	foreach ($myposts as $post) :
		setup_postdata($post);
		?>
                                <li>
                                    <div class="recent-posts-img mr-2">
                                        <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
                                        <!-- <img src="<?php echo $img[0]; ?>" alt="" class="img-responsive"> -->
                                        <?php if (class_exists('MultiPostThumbnails')) :
                                                        MultiPostThumbnails::the_post_thumbnail(
                                                            get_post_type(),
                                                            'secondary-image'
                                                        );
                                                endif; ?>
                                    </div>
                                    <a
                                        href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title; ?></a>
                                    <div class="clearfix"></div>
                                </li>
                                <?php endforeach;
				wp_reset_postdata();
				?>
                            </ul>
                        </div>
                    </div>
                    <a href="#" data-toggle="collapse" data-target="#demo"></a>
                    <?php } ?>
                    <h3>Categories</h3>
                    <?php


	$myposts = get_blog_child_categories();
				?>
                    <h3>Follow Us</h3>
                    <ul class="follow list-inline mb-5">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/peopletechInc" target="_blank"><img
                                    src="<?php echo site_url()?>/wp-content/uploads/2019/10/facebook.png" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com/peopletechinc?lang=en" target="_blank"><img
                                    src="<?php echo site_url()?>/wp-content/uploads/2019/10/twitter.png" alt=""></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://in.linkedin.com/company/people-tech-group-inc"><img
                                    src="<?php echo site_url()?>/wp-content/uploads/2019/10/linkedin-1.png" alt=""></a>
                        </li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
    <?php
	
	bento_entry_meta();
	
	bento_author_info();
	
	}
	/*====================END Detailed page HTML for Blogs Category====================*/
	
	
	/*Detailed page HTML for Client Stories Category*/
	elseif(isset($category_name[0]) && !empty($category_name[0]) && $category_name[0]->name =='Client Stories'){
	
	bento_post_date_blog(); 
	
	bento_post_thumbnail();
	
	//bento_post_title();
	?>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <?php 
	
	bento_post_content();
	
	bento_entry_meta();
	
	bento_author_info();
	
 }
 /*Detailed page HTML for Partners Category*/
 elseif(isset($category_name[0]) && !empty($category_name[0]) && $category_name[0]->name =='Partners'){
	 
 
	bento_post_date_blog(); 
	if($post->ID==178){
		?>
    <div class="banner mt-5"
        style="background-image: url('<?php echo site_url()?>/wp-content/uploads/2019/10/Amazon-HQ.png'); background-size: cover; height: 437px; width: 100%;">
        <div class="banner-overlay">
            <img src="<?php echo site_url()?>/wp-content/uploads/2019/10/Group-941.png" alt="logo" width="225"
                height="62">
            <div class="overlay-content">
                People Tech Group, an AWS Select Consulting Partner, is a leading global professional service company
                with over 1500 professionals and industry specialists. As a full-scale AWS Consulting Partner, we assist
                our clients in turning complex business issues
                into opportunities for competitive advantage and growth.
            </div>
        </div>
    </div>
    <?php
		
	}else{
		 bento_post_thumbnail();
	}
	
	//bento_post_title();
	?>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <?php 
	
	bento_post_content();
	
	bento_entry_meta();
	
	bento_author_info();
	}
	/*Detailed page HTML for Normal pages/posts*/
	else{
		bento_post_date_blog(); 
	
	bento_post_thumbnail();
	
	//bento_post_title();
	?>
    <header class="entry-header">
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <?php 
	
	bento_post_content();
	
	bento_entry_meta();
	
	bento_author_info();
	}
	?>

</article>
