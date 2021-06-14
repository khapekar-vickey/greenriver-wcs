<?php // The template for displaying grid items ?>

<?php
// Define variables
global $bento_parent_page_id; 
$bento_tile_size = 'tile-'.get_post_meta( get_the_ID(), 'bento_tile_size', true );
$bento_tile_hide_overlay = '';
if ( get_post_meta( get_the_ID(), 'bento_hide_tile_overlays', true) != 'on' ) {
	$bento_tile_hide_overlay = 'hide-overlay';
}
$bento_class_array = array( $bento_tile_size, $bento_tile_hide_overlay, 'grid-item' );
?>

<!-- <article id="post-<?php the_ID(); ?>" <?php post_class( $bento_class_array ); ?>> -->

<?php 
	// Masonry layout elements
	if ( get_post_meta( $bento_parent_page_id, 'bento_page_grid_mode', true ) == 'masonry' ) {
	?>

<div class="masonry-item-before" id="post-<?php the_ID(); ?>" <?php post_class( $bento_class_array ); ?>>
</div>

<div class="masonry-item-inner grid-item-inner">
    <div class="masonry-item-box grid-item-box">
        <a class="masonry-item-link" href="<?php echo esc_url( get_permalink() ); ?>">
            <?php bento_masonry_item_content(); ?>
        </a>
    </div>
</div>

<?php 	
	// Column and row layout elements
	} else {
	?>

<!--<div class="grid-item-inner">
        	<div class="grid-item-box">-->

<!-- blog code starts -->
<div class="col-sm-6 col-md-6 col-lg-4 col-xl-4 blog-container-each">
    <div class="blog-container-post">
        <div class="blog-container-post-img">
            <!-- blog code ends -->

            <?php //bento_post_thumbnail(); ?>
            <?php if (class_exists('MultiPostThumbnails')) :
                                                        MultiPostThumbnails::the_post_thumbnail(
                                                            get_post_type(),
                                                            'secondary-image'
                                                        );
                                                endif; ?>

            <!-- blog code starts -->
        </div>
        <!-- post img -->

        <!-- blog code ends -->

        <?php if ( ! in_array(get_post_format(), array('link','aside','status','quote'), true ) ) { ?>
        <!-- <header class="entry-header grid-item-header"> -->

        <!-- blog code starts -->

        <div class="blog-container-post-content">
            <h2>

                <!-- blog code ends -->
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                <!-- </header> -->

                <!-- blog code starts -->


            </h2>
            <!-- blog code end  -->
            <?php } ?>

            <p><?php the_excerpt(); ?></p>

            <?php //bento_entry_meta(); ?>
            <!--  
            </div>
        </div>
				-->

            <!-- blog code starts -->

        </div>
        <!-- post content -->
    </div>
    <!-- post -->
</div>
<!-- col 6 -->


<!-- blog code ends -->
<?php } ?>

<!-- </article> -->
