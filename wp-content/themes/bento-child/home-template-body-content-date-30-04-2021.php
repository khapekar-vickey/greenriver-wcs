    <?php 
$welcomemessage = "<section id='skip-main' class='container service mt-3 home-page-service-p'>";
		
		$myposts = get_home_welcome_message_posts('');
	foreach ($myposts as $post) :
		setup_postdata($post);
        //echo "<pre>"; print_r($post);exit;
		$permalink = get_permalink($post->ID);
                    $welcomemessage .= "<h2 class='pt-3'>".$post->post_title."</h2><br>";
                    //$welcomemessage .="<p class='mb-20'>".get_excerpt_capabilities(500, $post->ID)."</p>";
                    $welcomemessage .="<p class='container mt-2'>". $post->post_content."</p>";
                   
			endforeach;
				wp_reset_postdata();
                

        $get_home_widget_posts = get_home_widget_first_three_posts('');
        $widget='';
        $welcomemessage .="<ul class='container d-flex flex-wrap justify-content-center text-center boxCont mt-3'>";
        $i = 1;
            foreach ($get_home_widget_posts as $post) :
                setup_postdata($post);
                
                /* if($post->ID == 67){
                    $permalink = site_url().'/wwo-approved-live-training';
                    $target = '';
                }elseif($post->ID == 75){
                    $permalink = site_url().'/forms';
                    $target = '';
                }elseif($post->ID == 77){
                    $permalink = site_url().'/forms';
                    $target = '';
                }else{
                    $permalink = get_permalink($post->ID);
                    $target = '';
                }*/
                // ******** For Dev env *********
                if($post->ID == 2257){
                    $permalink = 'https://grcc.greenriver.edu/wacertservices/bat/cert-program/cert_exam_application.aspx';
                    $target = '_blank';
                }elseif($post->ID == 2255){
                    $permalink = site_url().'/take-a-professional-growth-exam/apply-for-a-bat-professional-growth-examination/';
                }elseif($post->ID == 2253){
                    $permalink = 'http://grcc.greenriver.edu/wacertservices/wwo/waterworks-validation-card/WaterworksValidationCard/validationcard-login.aspx';
                    $target = '_blank';
                }elseif($post->ID == 2251){
                    $permalink = 'http://grcc.greenriver.edu/wacertservices/bat/validation-card/BatValidationCard/';
                    $target = '_blank';
                }else{
                    $permalink = get_permalink($post->ID);
                    $target = '';
                }

                // ******** For QA env *********
                /*if($post->ID == 2192){
                    $permalink = 'https://grcc.greenriver.edu/wacertservices/bat/cert-program/cert_exam_application.aspx';
                    $target = '_blank';
                }elseif($post->ID == 2193){
                    $permalink = site_url().'/take-a-professional-growth-exam/apply-for-a-bat-professional-growth-examination/';
                }elseif($post->ID == 2191){
                    $permalink = 'http://grcc.greenriver.edu/wacertservices/wwo/waterworks-validation-card/WaterworksValidationCard/validationcard-login.aspx';
                    $target = '_blank';
                }elseif($post->ID == 2190){
                    $permalink = 'http://grcc.greenriver.edu/wacertservices/bat/validation-card/BatValidationCard/';
                    $target = '_blank';
                }else{
                    $permalink = get_permalink($post->ID);
                    $target = '';
                }*/
                    
                $welcomemessage .="<li class='ImgBx m-1'>";
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); 
                $welcomemessage .="<img alt='service".$i."' src='".$img['0']."' height='300' width='300'>";
                $welcomemessage .="<span class='ImgTxt ".$post->ID."'>";
                $welcomemessage .="<a href='". $permalink."'>".$post->post_title." </a>";
                $welcomemessage .="</span>";
                $welcomemessage .="</li>";
                $i++;
            endforeach;
            wp_reset_postdata();
            $welcomemessage .="</ul>";

            $get_home_widget_posts = get_home_widget_last_three_posts('');
            //echo "<pre>";print_r($get_home_widget_posts);exit;
        $widget='';
        $welcomemessage .="<div class='container d-flex flex-wrap justify-content-center text-center boxCont mt-3'>";
        $a = 4;
            foreach ($get_home_widget_posts as $post) :
                setup_postdata($post);
                 /* if($post->ID == 67){
                    $permalink = site_url().'/wwo-approved-live-training';
                    $target = '';
                }elseif($post->ID == 75){
                    // $permalink = site_url().'/forms'; // date :- 08-01-2021
                    $permalink = site_url().'/get-certified-as-a-bat/about-the-bat-certification-examination/';
                    $target = '';
                }elseif($post->ID == 77){
                    $permalink = site_url().'/forms';
                    $target = '';
                }else
                */
                // ******** For Dev env *********
                if($post->ID == 2257){
                    $permalink = 'https://grcc.greenriver.edu/wacertservices/bat/cert-program/cert_exam_application.aspx';
                    $target = '_blank';
                }elseif($post->ID == 2255){
                    $permalink = site_url().'/take-a-professional-growth-exam/apply-for-a-bat-professional-growth-examination/';
                }elseif($post->ID == 2253){
                    $permalink = 'http://grcc.greenriver.edu/wacertservices/wwo/waterworks-validation-card/WaterworksValidationCard/validationcard-login.aspx';
                    $target = '_blank';
                }elseif($post->ID == 2251){
                    $permalink = 'http://grcc.greenriver.edu/wacertservices/bat/validation-card/BatValidationCard/';
                    $target = '_blank';
                }else{
                    $permalink = get_permalink($post->ID);
                    $target = '';
                }

                // ******** For QA env *********
                /*if($post->ID == 2192){
                    $permalink = 'https://grcc.greenriver.edu/wacertservices/bat/cert-program/cert_exam_application.aspx';
                    $target = '_blank';
                }elseif($post->ID == 2193){
                    $permalink = site_url().'/take-a-professional-growth-exam/apply-for-a-bat-professional-growth-examination/';
                }elseif($post->ID == 2191){
                    $permalink = 'http://grcc.greenriver.edu/wacertservices/wwo/waterworks-validation-card/WaterworksValidationCard/validationcard-login.aspx';
                    $target = '_blank';
                }elseif($post->ID == 2190){
                    $permalink = 'http://grcc.greenriver.edu/wacertservices/bat/validation-card/BatValidationCard/';
                    $target = '_blank';
                }else{
                    $permalink = get_permalink($post->ID);
                    $target = '';
                }*/
                    
                $welcomemessage .="<div class='ImgBx m-1'>";
                $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); 
                $welcomemessage .="<img alt='service".$a."' src='".$img['0']."' height='300' width='300'>";
                $welcomemessage .="<span class='ImgTxt ".$post->ID."'>";
                $welcomemessage .="<a href='". $permalink."'>".$post->post_title." </a>";
                $welcomemessage .="</span>";
                $welcomemessage .="</div>";
                $a++;
            endforeach;
            wp_reset_postdata();

        $welcomemessage .="</div>";
        $welcomemessage .="</section>";
		
		echo $widget;
        echo $welcomemessage;


        $greenrivermessage = "<div class='container-fluid d-flex justify-content-between  align-items-center  service-footer'>";
		
		$myposts = get_greenriver_college_text_posts('');
	foreach ($myposts as $post) :
		setup_postdata($post);
		$permalink = get_permalink($post->ID);
        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" );
            
                $greenrivermessage .="<img alt='green river college' src='".$img['0']."'>";
                $greenrivermessage .="<p class='text-left'>". $post->post_excerpt."</p>";                    
                   endforeach;
				wp_reset_postdata();
        $greenrivermessage .="</div>";
		echo $greenrivermessage;
?>
