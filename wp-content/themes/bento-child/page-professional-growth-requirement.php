<?php
/*
  Template Name: Professional Growth Requirement
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
            $myposts = wwo_professional_growth_requirement_posts('');
                foreach ($myposts as $post) :
                setup_postdata($post);
            ?>	

              <h2 class="sec-title font-segoe-b">
                <?php echo get_the_title();?>
              </h2>
            </div>
            <?php the_excerpt();?>
            <?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "size" ); ?>
            <img src="<?php echo $img[0]; ?>" class="img-fluid" alt="">
            <div class="sec-title-wrap pt-5">
              <?php the_content();?>
            </div>
            <?php endforeach;
            wp_reset_postdata();
            ?>	

            <div class="sec-title-wrap pt-4">
              <h3 class="sec-title font-segoe-sb">
                Reporting Periods
              </h3>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">

                <tbody>
                  <tr class="bg-prime text-white">
                    <th scope="row">Original Certification Date</th>
                    <td>Meet The Professional GrowthRequirement Between:</td>

                  </tr>
                  <tr>
                    <th scope="row">Before 1/1/2016</th>
                    <td>1/1/2019 and 12/31/2021 and in each 3-year reporting period thereafter</td>

                  </tr>
                  <tr>
                    <th scope="row">Between 1/1/2016 and 12/31/2018</th>
                    <td>Your original certification date and 12/31/2021 and in each 3-year reporting period thereafter
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Between 1/1/2019 and 12/31/2021</th>
                    <td>Your original certification date and 12/31/2024 and in each 3-year reporting period thereafter
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
          <div class="col-12 col-md-5 col-lg-4">
          <?php if (have_rows('sidebar_components', 'option')):
                while (have_rows('sidebar_components', 'option')): the_row();
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
                                  <use
                                  xlink:href="<?php echo esc_url( $svgIcon['url'] ); ?>#<?php echo $svgIconHash; ?>">
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
                             if($singleImage):
                              ?>
                              <div class="<?php if($singleImageWrapClass && $singleImage): echo $singleImageWrapClass; else: echo 'batalk-logo-wrap bg-70 mt-5'; endif;?>">
                                <img class="img-fluid" src="<?php echo esc_url( $singleImage['url'] ); ?>" alt="<?php echo esc_attr( $singleImage['alt'] ); ?>">
                              </div>
                              <?php
                             endif;
                            ?>
                          <?php elseif (get_row_layout() == 'add_working_hours'):
                          $timings = get_sub_field('timings', 'option');?>
                          <div class="working-hours-box bg-prime text-white py-4 px-5 mt-5">
                           <?php 
                            if( have_rows('add_title','option') ): ?>
                            <div class="wh-title d-flex align-items-center pt-4">
                              <?php while( have_rows('add_title','option') ): the_row();
                               $addIcon = get_sub_field('add_icon', 'option');
                               $whTitle = get_sub_field('title', 'option');
                              ?>
                              <img class="img-fluid pr-3" src="<?php echo esc_url( $addIcon['url']); ?>" alt="<?php echo esc_attr( $addIcon['alt']); ?>">
                              <h3 class="font27 pt-2 text-white"><?php echo $whTitle; ?></h3>
                              <?php endwhile; ?>
                            </div>
                            <?php endif; ?>
                            <?php echo $timings; ?>
                            </div>
                          <?php
                 
                        
                    endif;
                endwhile;
            endif;
            ?>
            
          </div>
          
        </div>
      </div>
    </div><!-- /. Main Content -->
 </div>
<?php
do_action('ecommerce_gem_action_sidebar');

get_footer();
?>