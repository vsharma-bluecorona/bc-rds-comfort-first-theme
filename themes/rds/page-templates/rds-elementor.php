<?php
/**
 * Template Name: Elementor Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;

$bootstrap_version = get_theme_mod('understrap_bootstrap_version', 'bootstrap5');
$navbar_type = get_theme_mod('understrap_navbar_type', 'collapse');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon.ico">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-16x16.png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/favicon-32x32.png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/android-chrome-192x192.png">
        <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon/android-chrome-512x512.png">
        <?php do_action('rds_head_top'); ?>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <meta name="format-detection" content="telephone=no">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php wp_head(); ?>

        <?php // do_action('rds_head_bottom'); ?>
        <?php // do_action('rds_head'); ?>
    </head>

    <body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
        <?php // do_action('rds_body'); ?>
        <?php // do_action('wp_body_open'); ?>
        <?php
//        $get_rds_template_data_array = rds_template();
//        if ($get_rds_template_data_array['globals']['header']['variation'] == 'a') {
//            get_template_part('global-templates/header/a', null, $get_rds_template_data_array);
//        } elseif ($get_rds_template_data_array['globals']['header']['variation'] == 'b') {
//            get_template_part('global-templates/header/b', null, $get_rds_template_data_array);
//        } elseif ($get_rds_template_data_array['globals']['header']['variation'] == 'c') {
//            get_template_part('global-templates/header/c', null, $get_rds_template_data_array);
//        }
$get_rds_template_data_array = rds_template();
?>
<style>
  ul#menu-main-menu li:before {
    display: none;
}
</style>
<main>
    
        <div class="w-100 d-block">
            <div class="d-flex flex-column">
                <?php
                    if (have_posts()) :
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                ?> 
            </div>
        </div>
    </main>

    
<?php get_footer(); ?>
<script>
    jQuery(document).ready(function(){
        
        var swiper = new Swiper(".icon_swiper", {
            spaceBetween: 10,
            pagination: {
              el: ".icon_swiper_pagination",
              clickable: true,
            },
            breakpoints: {
              640: {
                slidesPerView: 1,
                spaceBetween: 40,
                noSwiping: false,
                allowSlidePrev: false,
                allowSlideNext: false,
                autoHeight:true,
              },
              768: {
                slidesPerView: 1,
                spaceBetween: 40,
                noSwiping: false,
                allowSlidePrev: false,
                allowSlideNext: false,
              },
              992: {
                slidesPerView: 4,
                spaceBetween: 0,
                noSwiping: true,
                allowSlidePrev: false,
                allowSlideNext: false,
              },
            },
        });
       
     
    });
</script>