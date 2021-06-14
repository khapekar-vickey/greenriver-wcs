<!--<section class=" main">
        <div class="container-fliud BxCnt d-flex justify-content-center align-items-center flex-wrap">
          <div class="Bx">
            <div class="box">
              <img src='<?php echo site_url();?>/wp-content/uploads/2020/11/icon-1.svg' />
              <span class="text-left ml-3">
                <a href="Waterworks.html">WATER WORKS OPERATORS</a>
              </span>
            </div>
          </div>
          <div class="Bx">
            <div class="box">
              <img src="<?php echo site_url();?>/wp-content/uploads/2020/11/icon-3.svg" />
              <span class="text-left ml-3">
                <a href="#">TRAINING COURSE SPONSORS</a>
              </span>
            </div>
          </div>
          <div class="Bx">
            <div class="box">
              <img src="<?php echo site_url();?>/wp-content/uploads/2020/11/icon-2.svg" />
              <span class="text-left ml-3">
                <a href="">BACKFLOW ASSEMBLY TESTERS</a>
              </span>
            </div>
          </div>
        </div>
    </section>-->
    
    <?php 
$welcomemessage = "<section class='container service mt-3'>";
		
		$myposts = get_home_welcome_message_posts('');
	foreach ($myposts as $post) :
		setup_postdata($post);
		$permalink = get_permalink($post->ID);
                    $welcomemessage .= "<h4 class='pt-3'>".$post->post_title."</h4>";
                    //$welcomemessage .="<p class='mb-20'>".get_excerpt_capabilities(500, $post->ID)."</p>";
                    $welcomemessage .="<p class='container mt-2'>". $post->post_excerpt."</p>";
                   
			endforeach;
				wp_reset_postdata();
                

        $get_home_widget_posts = get_home_widget_first_three_posts('');
        $widget='';
        $welcomemessage .="<div class='container d-flex flex-wrap justify-content-center text-center boxCont mt-3'>";
            foreach ($get_home_widget_posts as $post) :
                setup_postdata($post);
                $permalink = get_permalink($post->ID);
                    
                $welcomemessage .="<div class='ImgBx m-1'>";
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); 
                $welcomemessage .="<img alt='' src='".$img['0']."' height='300' width='300'>";
                $welcomemessage .="<span class='ImgTxt'>";
                $welcomemessage .="<a href='". $permalink."'>'".$post->post_title."' </a>";
                $welcomemessage .="</span>";
                $welcomemessage .="</div>";
            endforeach;
            wp_reset_postdata();

            $get_home_widget_posts = get_home_widget_last_three_posts('');
        $widget='';
        $welcomemessage .="<div class='container d-flex flex-wrap justify-content-center text-center boxCont mt-3'>";
            foreach ($get_home_widget_posts as $post) :
                setup_postdata($post);
                $permalink = get_permalink($post->ID);
                    
                $welcomemessage .="<div class='ImgBx m-1'>";
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); 
                $welcomemessage .="<img alt='' src='".$img['0']."' height='300' width='300'>";
                $welcomemessage .="<span class='ImgTxt'>";
                $welcomemessage .="<a href='". $permalink."'>'".$post->post_title."' </a>";
                $welcomemessage .="</span>";
                $welcomemessage .="</div>";
            endforeach;
            wp_reset_postdata();

        $welcomemessage .="</div>";
        $welcomemessage .="</section>";
		echo $welcomemessage;
		echo $widget;



        $greenrivermessage = "<div class='container-fluid d-flex justify-content-around  align-items-center  service-footer'>";
		
		$myposts = get_greenriver_college_text_posts('');
	foreach ($myposts as $post) :
		setup_postdata($post);
		$permalink = get_permalink($post->ID);
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );
            
                $greenrivermessage .="<img alt='' src='".$img['0']."'>";
                $greenrivermessage .="<p class='text-left'>". $post->post_excerpt."</p>";                    
                   endforeach;
				wp_reset_postdata();
        $greenrivermessage .="</div>";
		echo $greenrivermessage;
?>
