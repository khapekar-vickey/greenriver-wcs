<?php
/*
  Template Name: Water Works Operators Main Pages
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
    <div class="container-fluid main-banner mhB-340 banner banner-margin" aria-label="container-section-1">
      <?php while( have_rows('hero_banner') ): the_row(); 
        $heroBannerBGImg = get_sub_field('hero_banner_background_image');
        $heroBannerTitle = get_sub_field('hero_banner_title');
      ?>
      <div class="banner-img"
        style="background: url('<?php echo $heroBannerBGImg['url']; ?>') no-repeat center/ cover;">
      </div>
      <div class="container">
        <div class="row banner-content mhB-340">
          <div class="page-title-wrap py-4">
            <h1 class="page-title text-white"><?php if($heroBannerTitle): echo $heroBannerTitle; else: echo get_the_title(); endif; ?></h1>
          </div>
        </div>
      </div>
          
      <?php endwhile; ?>
    </div><!-- /. Banner -->
  <?php endif; ?>
  <?php $category = get_the_category();
            // $category_parent_id = $category[0]->category_parent;
            // $category_parent = get_category($category_parent_id);
           ?>

    <!-- Breadcrumb -->
    <div id='skip-main' class="container-fluid breadcrumb_outer bg-f5 pt-4 pb-3" aria-label="container-section-2">
        <div class="container">
            <div class="row breadcrumb_wrap d-flex justify-content-start align-items-center">
                <!-- <span>You are here :</span> -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item bold"><a href="<?php echo site_url(); ?>">WCS</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo the_title();?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- /. Breadcrumb -->

    <?php if( have_rows('wwo-mainlayouts') ): ?>
        <?php $increment = 3; ?>
        <?php while( have_rows('wwo-mainlayouts') ): the_row(); ?>
            <?php if( get_row_layout() == 'section_main' ): 
                $sectionMainClass = get_sub_field('section_main_class');
                ?>
                <div class="<?php if($sectionMainClass): echo $sectionMainClass; else: echo 'container-fluid py-3 px-0'; endif; ?>" aria-label="container-section-<?php echo $increment; ?>" >
                <?php if( have_rows('container') ): ?>
                <?php while( have_rows('container') ): the_row(); ?>
                <?php if( get_row_layout() == 'container_box' ): 
                $isFullWidth = get_sub_field('is_full_width');
                ?>
                    <div class="<?php if($isFullWidth == 'yes'): echo 'container-fluid'; else: echo 'container'; endif; ?>">
                    <?php if( have_rows('add_rows') ): ?>
                    <?php while( have_rows('add_rows') ): the_row(); ?>
                    <?php if( get_row_layout() == 'row_section' ): 
                        $rowMainClass = get_sub_field('row_main_class');
                        ?>
                        <div class="<?php if($rowMainClass): echo $rowMainClass; else: echo 'row'; endif;?>">
                            <?php if( have_rows('row_items') ): ?>
                            <?php while( have_rows('row_items') ): the_row(); ?>
                            <?php if( get_row_layout() == 'column_items' ): 
                                    $columnMainClass = get_sub_field('column_main_class');
                                    ?>
                                    <div class="<?php if($columnMainClass): echo $columnMainClass; else: echo 'col-12 col-md-6 col-lg-4 px-2 pt-3 infoboxlist align-items-center'; endif; ?>">
                                        <?php if( have_rows('column_item') ): ?>
                                        <?php while( have_rows('column_item') ): the_row(); ?>
                                        <?php if( get_row_layout() == 'm01-text_content_col' ): 
                                            $m01TextContentCol = get_sub_field('m01-text_col_content');
                                          
                                            ?>
                                            <?php echo $m01TextContentCol['m01-text_content']; ?>
                                        <?php endif; ?>
                                        <?php endwhile; ?>
                                        <?php endif; ?>
                                    
                                    </div>
                                <?php elseif ( get_row_layout() == 'm01-text_content_row' ): 
                                    $m01TextContent = get_sub_field('m01-text_content');
                                    ?>
                                    <?php echo $m01TextContent; ?>

                            <?php endif; ?>
                            <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php  $increment++;?>
                    <?php endif; ?>
                    <?php if( have_rows('icon_info_lists') ): ?>
                        <ul class="row px-0 list-style-none infobox_row row-eq-height">
                        <?php while( have_rows('icon_info_lists') ): the_row(); 
                            $svgIconClass= get_sub_field('svg_icon_class');
                            $svgViewboxValue= get_sub_field('svg_viewbox_value');
                            $svgIcon= get_sub_field('svg_icon');
                            $svgIconHash= get_sub_field('svg_icon_hash');
                            $addLink= get_sub_field('add_link');
                            $titleTagType= get_sub_field('title_tag_type');
                            $title= get_sub_field('title');
                            ?>
                            <li class="col-12 col-md-6 col-lg-4 px-2 pt-3 infoboxlist align-items-center">
                                <?php if( $addLink ):?>
                                <a href="<?php echo esc_url( $addLink ); ?>">
                                <?php endif; ?>
                                    <div class="infobox_inn d-flex align-items-center bg-white p-4 eq-height">
                                        <?php if( $svgIcon ):?>
                                        <svg class="<?php if($svgIconClass): echo $svgIconClass; else: echo 'svgicon w93px fill-prime'; endif; ?>" viewBox="<?php if($svgViewboxValue): echo $svgViewboxValue; else: echo '12 10 63 55'; endif; ?>" title="<?php echo $title?>">
                                        <use
                                            xlink:href="<?php echo esc_url($svgIcon['url']);?><?php if($svgIconHash): echo '#'.$svgIconHash; endif; ?>">
                                        </use>
                                        </svg>
                                        <?php endif; ?>

                                        <div class="ib_content">
                                        <<?php if($titleTagType): echo $titleTagType; else: echo 'h2'; endif; ?> class="ib_title sem-bold" role="presentation"><?php if($titleTagType): echo $title; endif; ?></<?php if($titleTagType): echo $titleTagType; else: echo 'h2'; endif; ?> >
                                        </div>
                                    </div>
                                <?php if( $addLink ):?>
                                </a>
                                <?php endif; ?>
                                
                            </li>
                        <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>

                    </div>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div>
<?php
do_action('ecommerce_gem_action_sidebar');

get_footer();
?>