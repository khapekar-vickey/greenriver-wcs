<?php
error_reporting(E_ALL);
ob_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Retrieve list of latest news posts or posts matching criteria as news.
 *
 * The defaults are as follows:
 *
 * @since 1.2.0
 *
 * @see WP_Query::parse_query()
 *
 * @param array $args {
 *     Optional. Arguments to retrieve posts. See WP_Query::parse_query() for all
 *     available arguments.
 *
 *     @type int        $numberposts      Total number of posts to retrieve. Is an alias of $posts_per_page
 *                                        in WP_Query. Accepts -1 for all. Default 5.
 *     @type int|string $category         Category ID or comma-separated list of IDs (this or any children).
 *                                        Is an alias of $cat in WP_Query. Default 0.
 *     @type array      $include          An array of post IDs to retrieve, sticky posts will be included.
 *                                        Is an alias of $post__in in WP_Query. Default empty array.
 *     @type array      $exclude          An array of post IDs not to retrieve. Default empty array.
 *     @type bool       $suppress_filters Whether to suppress filters. Default true.
 * }
 * @return array List of posts.
 */


/* Loading Frontend Styles and Scripts */

function theme_enqueue_styles() {
	
    wp_enqueue_style('bootstrapcss', trailingslashit(get_stylesheet_directory_uri()) . '/assets/css/bootstrap.min.css', array(), '4.0.0', 'all');
    /*wp_enqueue_script('jquery-slim-min-scripts', get_stylesheet_directory_uri() . '/assets/js/jquery-3.2.1.slim.min.js', false, '1.0.0');*/
    wp_enqueue_script('jquery-min', get_stylesheet_directory_uri() . '/assets/js/jquery.min.js', false, '1.0.0');
    wp_enqueue_script('popper-min-scripts', get_stylesheet_directory_uri() . '/assets/js/popper.min.js', false, '1.0.0');
    wp_enqueue_script('bootstrap-min-scripts', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', false, '1.0.0');
    wp_enqueue_style('childstyles', trailingslashit(get_stylesheet_directory_uri()) . '/style.css', array(), '4.0.0', 'all');
    wp_enqueue_style('custom-childstyles', trailingslashit(get_stylesheet_directory_uri()) . '/assets/css/custom_styles/style.css', array(), '4.0.0', 'all');
    wp_enqueue_style('font-awsome-tyles', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0', 'all');
}

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
/* Loading Frontend Styles and Scripts */

function my_custom_mime_types( $mimes ) {
 
// New allowed mime types.
$mimes['svg'] = 'image/svg+xml';
$mimes['svgz'] = 'image/svg+xml';
$mimes['doc'] = 'application/msword';
 
// Optional. Remove a mime type.
unset( $mimes['exe'] );
 
return $mimes;
}
add_filter( 'upload_mimes', 'my_custom_mime_types' );


function home_page_content() {
    ob_start();
    get_template_part('home-template-body-content');
    return ob_get_clean();   
} 
add_shortcode( 'home-page-content', 'home_page_content' );

function get_home_welcome_message_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'home-wcs-welcome-message', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}


function get_home_widget_first_three_posts($args = null) {
    $defaults = array(
        'numberposts' => 3,
        'category' => 0, 'category_name' => 'home-wcs-widgets', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}
function get_home_widget_last_three_posts($args = null) {
    $defaults = array(
        'numberposts' => 3,
        'category' => 0, 'category_name' => 'home-wcs-widgets', 'orderby' => 'date',
        'order' => 'DESC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function get_greenriver_college_text_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'home-green-river-college-text', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function get_wwo_landing_page_desc_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-landing-page-desc', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function get_wwo_landing_page_widget_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-landing-page-widgets', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function wwo_landing_page_whats_new_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-landing-page-whats-new', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function wwo_professional_growth_requirement_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-professional-growth-requirement', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function wwo_professional_growth_requirement_washington_state_bat_public_list_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-professional-growth-requirement-washington-state-bat-public-list', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function wwo_professional_growth_requirement_batalkimg_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-professional-growth-requirement-batalkimg-hours', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function wwo_professional_growth_requirement_working_hours_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-professional-growth-requirement-working-hours', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}


function wwo_professional_growth_report_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-professional-growth-report', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function wwo_current_professional_growth_report_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-current-professional-growth-reporting-period', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function get_tcs_landing_page_desc_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-landing-page-desc', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function get_tcs_landing_page_widget_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-landing-page-widgets', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function tcs_landing_page_whats_new_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-landing-page-whats-new', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function tcs_live_training_and_conference_evaluation_desc_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-live-training-and-conference-evaluation-desc', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function register_bs4navwalker(){
    require_once( trailingslashit( get_stylesheet_directory() ) . 'inc/bs4navwalker.php' );
}
add_action( 'after_setup_theme', 'register_bs4navwalker' );

/**
 * WCS Theme Options
 */
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug' => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect' => false
	));
}


add_filter('wp_nav_menu_objects', 'sideNav_wp_nav_menu_objects', 10, 2);
function sideNav_wp_nav_menu_objects( $items, $args ) {
	// loop
	foreach( $items as &$item ) {
        $svgIcon = get_field('upload_svg_icon', $item);
        $svgIconClass = get_field('svg_icon_class', $item);
        $svgIconViewBox = get_field('viewbox_co-ordination', $item);
        $svgIconHash = get_field('icon_svg_hash', $item);
        // append icon
        if( $svgIcon ) {
            $item->title .=  '<svg class="'.$svgIconClass.'" viewBox="'.$svgIconViewBox.'">
            <use
            xlink:href="'.$svgIcon['url'].'#'.$svgIconHash.'">
            </use>
            </svg>';
        }
	}
	// return
	return $items;
	
}
// define the wp_nav_menu callback 
function filter_wp_nav_menu( $array, $int ) { 
    // make filter magic happen here... 
    return $array; 
}; 

// add the filter 
add_filter( 'wp_nav_menu', 'filter_wp_nav_menu', 10, 2 ); 

/**
 * Register Custom Navigation
 */
function add_menu(){
    register_nav_menu('waterworkoperatorsmenu', 'Water Work Operators Menu');
 }
 add_action('init','add_menu');

 function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

function add_additional_class_on_li_a_link( $classes, $item, $args ) {
    if(isset($args->add_link_class)) {
        if (in_array('nav-link active', $classes) ){
            $classes['class'] = "active $args->add_link_class";
        }
        else {
            $classes['class'] = $args->add_link_class;
        }
    }
    
    return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_additional_class_on_li_a_link', 10, 3 );
//add_filter('use_block_editor_for_post', '__return_false', 10);




function tcs_live_training_and_conference_evaluation_whats_new_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-live-training-and-conference-evaluation-page-whats-new', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function tcs_approved_live_training_desc_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-approved-live-training-desc', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function tcs_approved_live_training_whats_new_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-approved-live-training-page-whats-new', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}


function tcs_self_paced_training_evaluation_desc_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-self-paced-training-evaluation-desc', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}

function tcs_links_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'tcs-links', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}


function wwo_links_posts($args = null) {
    $defaults = array(
        'numberposts' => 10,
        'category' => 0, 'category_name' => 'wwo-links', 'orderby' => 'date',
        'order' => 'ASC', 'include' => array(),
        'exclude' => array(), 'meta_key' => '',
        'meta_value' => '', 'post_type' => 'post',
        'suppress_filters' => true
    );

    $r = wp_parse_args($args, $defaults);
    if (empty($r['post_status']))
        $r['post_status'] = ( 'attachment' == $r['post_type'] ) ? 'inherit' : 'publish';
    if (!empty($r['numberposts']) && empty($r['posts_per_page']))
        $r['posts_per_page'] = $r['numberposts'];
    if (!empty($r['category']))
        $r['cat'] = $r['category'];
    if (!empty($r['include'])) {
        $incposts = wp_parse_id_list($r['include']);
        $r['posts_per_page'] = count($incposts);  // only the number of posts included
        $r['post__in'] = $incposts;
    } elseif (!empty($r['exclude']))
        $r['post__not_in'] = wp_parse_id_list($r['exclude']);

    $r['ignore_sticky_posts'] = true;
    $r['no_found_rows'] = true;

    $get_posts = new WP_Query;
    return $get_posts->query($r);
}


?>
