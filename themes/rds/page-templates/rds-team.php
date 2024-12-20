<?php
/**
 * Template Name: Team Template
 */
// Exit if accessed directly.
defined('ABSPATH') || exit;
global $post;
$title = $post->post_title;
get_header();
?>
    <main>
        <!-- Team banner starts -->
        <?php get_template_part( 'global-templates/subpage-hero/subpage-banner-section' );?>
        <!-- Team banner ends -->

        <div class="container-fluid py-lg-5 py-4">
            <div class="container px-lg-3 px-0">
                <div class="row">
                    <div class="col-lg-12 mb-lg-5 pb-4">
                        <h1><?php echo $title; ?></h1>
                        <h2 class=""><?php
                                    $content = get_post_field('post_content', $post->ID);
                                    echo do_shortcode($content);
                                    ?></h2>
                    </div>

                          <?php $team_args  = array( 'post_type' => 'bc_teams', 'posts_per_page' => -1, 'order'=> 'DESC','post_status'  => 'publish');

                          $query = new WP_Query( $team_args );
                          if ( $query->have_posts() ) :

                            while($query->have_posts()) : $query->the_post();
                                $image_full=  get_the_post_thumbnail_url(get_the_ID(),'full');
                               if (empty($image_full)) {
                                 $image_full = get_site_url(null, '/wp-content/themes/rds-child/img/meet-the-team/team_placeholder.png',);
                                   
                               }

                              ?>
                        <div class="col-lg-4 team_card [ is-collapsed ] border-0 ">
                        <div class="card__inner [ js-expander ] mb-4">
                            <div class="team_img"><img src="<?php echo $image_full; ?>" class="img-fluid w-100" alt="team image" width="350" height="220"></div>
                            <div class="row pt-3">
                                <div class="col-8">
                                    <h3 class=""><?php the_title() ?></h3>
                                    <span class="h7"><?php echo get_post_meta(get_the_ID(), 'team_position', true);  ?></span>
                                </div>
                                <div class="col-4 pt-1">
                                    <span class="d-block text-end text-uppercase  text_18 line_height_23 font_default text_semibold">bio <i class="icon-plus1 text_18 line_height_18"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="card__expander pb-4">
                            <?php the_content(); ?>
                        </div>
                    </div>
                          <?php 
                       endwhile; 
                       wp_reset_query();  
                    endif;   
                     ?> 
                </div>
            </div>
        </div>
    </main>



<?php get_footer(); ?>
