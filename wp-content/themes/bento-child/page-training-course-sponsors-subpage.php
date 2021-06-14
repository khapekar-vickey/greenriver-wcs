<?php
/*
  Template Name: Training Course Sponsors Sub Pages
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
<div class="site-main" role="main">
  <!-- Banner -->
  <?php if( have_rows('hero_banner') ): ?>
    <div class="container-fluid main-banner mhB-225 banner banner-margin" aria-label="container-section-1">
      <?php while( have_rows('hero_banner') ): the_row(); 
        $heroBannerBGImg = get_sub_field('hero_banner_background_image');
        $heroBannerTitle = get_sub_field('hero_banner_title');
      ?>
      <div class="banner-img"
        style="background: url('<?php echo $heroBannerBGImg['url']; ?>') no-repeat center/ cover;">
      </div>
      <div class="container">
        <div class="row banner-content mhB-225">
          <div class="page-title-wrap py-4">
            <h1 class="page-title text-white"><?php if($heroBannerTitle): echo $heroBannerTitle; else: echo get_the_title(); endif; ?></h1>
          </div>
        </div>
      </div>
          
      <?php endwhile; ?>
    </div><!-- /. Banner -->
  <?php endif; ?>
  <?php $category = get_the_category();
            $category_parent_id = $category[0]->category_parent;
            $category_parent = get_category($category_parent_id);
           ?>

    <!-- Breadcrumb -->
    <div id='skip-main' class="container-fluid breadcrumb_outer bg-f5 pt-4 pb-3" aria-label="container-section-2">
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
    <div class="container-fluid bg-f5 py-3 px-0" aria-label="container-section-3">
        <div class="container">
            <!-- <div class="row flex-row-reverse text-grey pb-5"> -->
            <div class="row flex-row text-grey pb-5">
                <?php $page_id = get_queried_object_id();?>
                <div class="col-12 col-md-4 col-lg-3">
                    <?php if (have_rows('sidebar_components_tcs', 'option')):
                        while (have_rows('sidebar_components_tcs', 'option')): the_row();
                            if (get_row_layout() == 'add_menu_to_sidebar'):
                              $menuSidebar = get_sub_field('add_menu', 'option');
                                $menuVar = array(
                                  'menu'                 => $menuSidebar,
                                  'container'            => false,
                                  // 'container'            => 'div',
                                  // 'container_class'      => 'conc',
                                  // 'container_id'         => 'conc',
                                  'menu_class'           => 'secMenu nav nav-pills nav-fill flex-column',
                                  'menu_id'              => $menuSidebar,
                                  'echo'                 => true,
                                  'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                  'item_spacing'         => 'preserve',
                                  'depth'                => 0,
                                  // 'add_li_class'  => 'your-class-name1 your-class-name-2',
                                  'add_link_class'  => 'nav-link d-flex align-items-center flex-row-reverse justify-content-end',
                                  'theme_location'       =>  $menuSidebar,
                                  'fallback_cb' => 'bs4navwalker::fallback',
                                  'walker' => new bs4navwalker(),
                                    );
                                wp_nav_menu( $menuVar );

                                elseif (get_row_layout() == 'search_hire_bat'):
                                  $menuSidebar = get_sub_field('is_search_to_hire_a_bat', 'option');?>
                                  <?php if($menuSidebar == 'yes'): ?>
                                        <div class="search-box pt-5">
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
                                        </div>
                                    <?php endif; ?>
                            <?php elseif (get_row_layout() == 'single_info_box'):
                                  $svgIconTitle = get_sub_field('title', 'option');
                                  
                                  ?>

                            <div class="single-info-box d-flex align-items-center pt-4">
                                <?php 
                                    if( have_rows('svg_icons','option') ): ?>
                                <?php while( have_rows('svg_icons','option') ): the_row(); 
                                      $svgIcon = get_sub_field('upload_svg_icon', 'option');
                                     
                                      $svgIconClass = get_sub_field('svg_icon_class', 'option');
                                      $svgIconViewBox = get_sub_field('viewbox_value', 'option');
                                      $svgIconHash = get_sub_field('svg_icon_hashvalue', 'option');
                                      // append icon
                                      //if( $svgIcon ):?>
                                <svg class="<?php echo $svgIconClass; ?>" viewBox="<?php echo $svgIconViewBox; ?>">
                                    <use xlink:href="<?php echo esc_url( $svgIcon['url'] ); ?>#<?php echo $svgIconHash; ?>">
                                    </use>
                                </svg>
                                <?php //endif;
                                      ?>
                                <?php endwhile; ?>
                                <?php endif; ?>
                                <span><?php echo $svgIconTitle; ?></span>
                            </div>

                            <?php elseif (get_row_layout() == 'single_image'):
                                     $singleImage = get_sub_field('single_image', 'option');
                                     $singleImageWrapClass = get_sub_field('single_image_wrap_class', 'option');

                                     $addLinkToImage = get_sub_field('add_link_to_image', 'option');

                                     if($singleImage):
                                      ?>
                            <!-- 
                            <div
                                class="<?php if($singleImageWrapClass && $singleImage): echo $singleImageWrapClass; else: echo 'batalk-logo-wrap bg-70 mt-5'; endif;?>">
                                <?php  

            if( $addLinkToImage ):
                $addLinkToImage_url = $addLinkToImage['url'];
            $addLinkToImage_title = $addLinkToImage['title'];
            $addLinkToImage_target = $addLinkToImage['target'] ? $addLinkToImage['target'] : '_self';
            ?>
            <a href="<?php echo esc_url( $addLinkToImage_url ); ?>" target="<?php echo esc_attr( $addLinkToImage_target ); ?>">
        <?php endif; ?>
                                <span class="screen-reader-only"> (opens in a new tab)</span>
                                <img class="img-fluid" src="<?php echo esc_url( $singleImage['url'] ); ?>"
                                    alt="<?php echo esc_attr( $singleImage['alt'] ); ?>">
                                    <?php if( $addLinkToImage ):
            ?></a><?php endif; ?>
                            </div>
                            <?php
                                     endif;
                                    ?>
                            <?php elseif (get_row_layout() == 'add_working_hours'):
                                  $workingHourTimings = get_sub_field('working_hours_timings', 'option');?>
                            <div class="working-hours-box bg-prime text-white py-4 px-5 mt-5">
                                <?php 
                                    if( have_rows('add_title','option') ): ?>
                                <div class="wh-title d-flex align-items-center pt-4">
                                    <?php while( have_rows('add_title','option') ): the_row();
                                       $addIcon = get_sub_field('add_icon', 'option');
                                       $whTitle = get_sub_field('title', 'option');
                                      ?>
                                    <img class="img-fluid pr-3" src="<?php echo esc_url( $addIcon['url']); ?>"
                                        alt="<?php echo esc_attr( $addIcon['alt']); ?>">
                                    <h3 class="font16 pt-2 text-white"><?php echo $whTitle; ?></h3>
                                    <?php endwhile; ?>
                                </div>
                                <?php endif; ?>
                                <?php if($workingHourTimings): echo $workingHourTimings; else: echo '<div class="timing font16 pt-3">Weekdays : 6:30 – 18:00</div><div class="timing font16 pt-3 pb-4">Weekend : 8.00 - 12:00</div>'; endif; ?>
                            </div>
                            -->
                            <?php
                         
                                
                            endif;
                        endwhile;
                    endif;
                    ?>

                </div>
                <div class="col-12 col-md-8 col-lg-9" id="<?php echo 'page_'.$page_id; ?>">
                    <?php if( have_rows('wwo-layouts') ): ?>
                    <?php while( have_rows('wwo-layouts') ): the_row(); ?>
                    <?php if( get_row_layout() == 'm01-text_content' ): ?>
                    <?php the_sub_field('content'); ?>

                    <?php elseif( get_row_layout() == 'm02-title' ): 
                    $m02TitleWrapClass = get_sub_field('m02-title_wrap_class');
                    $m02Title = get_sub_field('m02-title');
                    ?>
                    <div
                        class="<?php if($m02TitleWrapClass): echo $m02TitleWrapClass; else: echo 'sec-title-wrap'; endif;?>">
                        <?php echo $m02Title; ?>
                    </div>

                    <?php elseif( get_row_layout() == 'm03-single_image' ): 
                        $m03SingleImage = get_sub_field('m03-single_image');
                        $m03ImageWrapperClass = get_sub_field('m03-image_wrapper_class');
                        $m03ImageClass = get_sub_field('m03-image_class');
                        ?>
                        <?php if($m03ImageWrapperClass): ?>
                        <div class="<?php echo $m03ImageWrapperClass; ?>">
                            <?php endif; ?>
                            <img class="<?php if($m03ImageClass): echo $m03ImageClass; else: echo 'img-fluid'; endif; ?>"
                                src="<?php echo esc_url( $m03SingleImage['url'] ); ?>"
                                alt="<?php echo esc_attr( $m03SingleImage['alt'] ); ?>" />
                            <?php if($m03ImageWrapperClass): ?>
                        </div>
                        <?php endif; ?>

                        <?php elseif( get_row_layout() == 'm04-include_the_content' ): 
                            $m04isTheContentNeeded = get_sub_field('m04-is_the_content_needed');

                            if($m04isTheContentNeeded == 'yes'):
                                if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							
								    <?php the_content(); ?>
							
                                <?php
                                    endwhile; ?>
                                <?php endif; 

                            endif;
                            ?>

                        <?php elseif( get_row_layout() == 'm05-accordion' ): 
                            $m05AccordionID = get_sub_field('m05-accordion_id');
                            ?>
                            <?php if( have_rows('m05-accordion_items') ): ?>
                                <?php $accItemCount = 1; ?>
                            <div class="prime-accordion" id="<?php if($m05AccordionID): echo $m05AccordionID; else: echo 'accordion-renewal'; endif; ?>">
                                <?php while( have_rows('m05-accordion_items') ): the_row(); 
                                    $M05AccordionTitle = get_sub_field('M05-accordion_title');
                                    $m05AccordionContent = get_sub_field('m05-accordion_content');
                                    $accID = preg_replace('/\s+/', '', $M05AccordionTitle);
                                    ?>
                                    <div class="card">
                                        <div class="card-header" id="<?php echo $m05AccordionID; ?>heading<?php echo $accItemCount; ?>">
                                            <h3 class="mb-0">
                                                <button id="<?php echo lcfirst($accID); ?>" class="btn btn-link" aria-expanded="false" data-toggle="collapse" data-target="#<?php echo $m05AccordionID; ?>collapse<?php echo $accItemCount; ?>" aria-expanded="true"
                                                    aria-controls="<?php echo $m05AccordionID; ?>collapse<?php echo $accItemCount; ?>">
                                                    <?php echo $M05AccordionTitle; ?>
                                                </button>
                                            </h3>
                                        </div>

                                        <div id="<?php echo $m05AccordionID; ?>collapse<?php echo $accItemCount; ?>" class="<?php echo lcfirst($accID); ?> card-body-wrap collapse" aria-label="<?php echo $m05AccordionID; ?>heading<?php echo $accItemCount; ?>" data-parent="#<?php echo $m05AccordionID; ?>">
                                            <div class="card-body">
                                                <?php echo $m05AccordionContent; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $accItemCount++; ?>
                                <?php endwhile; ?>
                            </div>
                            <script>
                            (function ($) {
                                $(document).ready(function () {
                                    $('.prime-accordion .card:first-child .card-header button').attr('aria-expanded','false');
                                    // $('.prime-accordion .card:first-child .card-body-wrap').addClass('show'); 
                                });
                            })(jQuery)
                            </script>
                            <?php endif; ?>
                        <?php elseif( get_row_layout() == 'm06-info_grid' ): 
                            ?> 
                             <?php if( have_rows('m06-info_grid_row') ): ?>
                                <div class="d-flex flex-wrap align-items-center">
                                <?php while( have_rows('m06-info_grid_row') ): the_row(); 
                                    $m06ColumnMainClass = get_sub_field('m06-column_main_class');
                                    $m06Title = get_sub_field('m06-title');
                                    $m06LeftButton = get_sub_field('m06-left_button');
                                    $m06LeftButtonClass = get_sub_field('m06-left_button_class');
                                    $m06RightButton = get_sub_field('m06-right_button');
                                    $m06RightButtonClass = get_sub_field('m06-right_button_class');
                                    $m06TopRightButton = get_sub_field('m06-top_right_button');
                                    $m06TopRightButtonClass = get_sub_field('m06-top_right_button_class');
                                    $RST_m06Title = strip_tags($m06Title);
                                    $TDQ_m06Title = str_replace('"',' ',$RST_m06Title);
                                    ?>
                                    <div class="<?php if($m06ColumnMainClass): echo $m06ColumnMainClass; else: echo 'col-md-12 col-lg-6 col-xl-4 px-1 py-2'; endif;?>">
                                        <div class="card-default-bg card w-100 bg-form text-white text-center">
                                            <div class="card-body">
                                            <?php if($m06TopRightButton): ?>
                                            <div class="top-btn-wrappers">
                                                <br>
                                                <?php if($m06TopRightButton): 
                                                    $m06TopRightButton_url = $m06TopRightButton['url'];
                                                    $m06TopRightButton_title = $m06TopRightButton['title'];
                                                    $m06TopRightButton_target = $m06TopRightButton['target'] ? $m06TopRightButton['target'] : '_self';
                                                    ?>
                                                    <a role="button" class="<?php if($m06TopRightButtonClass): echo $m06TopRightButtonClass; else: echo 'card-link font18 web-fill-in-btn'; endif;?>" href="<?php echo esc_url( $m06TopRightButton_url ); ?>" target="<?php echo esc_attr( $m06TopRightButton_target ); ?>" aria-label="Web <?php echo $TDQ_m06Title;?>">
                                                        <?php echo esc_html( $m06TopRightButton_title ); ?><span class="screen-reader-only"> (opens in a new tab)</span>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <?php endif; ?>
                                                    
                                                    <div class="card-text-wrap <?php if(!$m06TopRightButton): echo 'margin-force-center'; endif; ?>">
                                                    
                                                   
                                                <?php if($m06Title): echo $m06Title; endif; ?>
                                                </div>

                                                <?php if($m06LeftButton || $m06RightButton):?>
                                                <div class="btn-wrappers">
                                                    <?php if($m06LeftButton): 
                                                        $m06LeftButton_url = $m06LeftButton['url'];
                                                        $m06LeftButton_title = $m06LeftButton['title'];
                                                        $m06LeftButton_target = $m06LeftButton['target'] ? $m06LeftButton['target'] : '_self';
                                                        ?>
                                                    <a role="button" class="<?php if($m06LeftButtonClass): echo $m06LeftButtonClass; else: echo 'card-link font18 fill-in-btn'; endif;?>"
                                                        href="<?php echo esc_url( $m06LeftButton_url ); ?>" target="<?php echo esc_attr( $m06LeftButton_target ); ?>" aria-label="Fill-In <?php echo $TDQ_m06Title;?>">
                                                        <?php echo esc_html( $m06LeftButton_title ); ?><span class="screen-reader-only"> (opens in a new tab)</span>
                                                    </a>
                                                    <?php endif; ?>

                                                        <br>

                                                        <?php if($m06RightButton): 
                                                        $m06RightButton_url = $m06RightButton['url'];
                                                        $m06RightButton_title = $m06RightButton['title'];
                                                        $m06RightButton_target = $m06RightButton['target'] ? $m06RightButton['target'] : '_self';
                                                        ?>
                                                    <a role="button" class="<?php if($m06RightButtonClass): echo $m06RightButtonClass; else: echo 'card-link font18 fill-in-btn'; endif;?>"
                                                        href="<?php echo esc_url( $m06RightButton_url ); ?>" target="<?php echo esc_attr( $m06RightButton_target ); ?>" aria-label="Download <?php echo $TDQ_m06Title;?>">
                                                        <?php echo esc_html( $m06RightButton_title ); ?><span class="screen-reader-only"> (opens in a new tab)</span>
                                                    </a>
                                                    <?php endif; ?>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                

            </div>
        </div>
    </div><!-- /. Main Content -->
</div>
<?php
do_action('ecommerce_gem_action_sidebar');

get_footer();
?>