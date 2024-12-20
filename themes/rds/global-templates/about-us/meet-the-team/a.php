    <div class="d-block order-13 order-lg-13 ">
        <div class="container-fluid py-5 py-lg-4 text-center ">
            <div class="container">
                <h3 class="text-center pb-5"><?php echo $args['page_templates']['about_us_page']['meet_the_team']['heading']; ?></h3>
                <div class="row">
                    <?php 
                    $team_args  = array( 'post_type' => 'bc_teams', 'posts_per_page' => 3, 'order'=> 'DESC','post_status'  => 'publish');
                    $query = new WP_Query( $team_args );
                    if ( $query->have_posts() ) :
                        while($query->have_posts()) : $query->the_post();                        
                            $image_full = get_the_post_thumbnail_url(get_the_ID(), 'full');
                    if (empty($image_full)) {
                        $image_full = get_site_url(null, '/wp-content/themes/rds-child/img/meet-the-team/team_placeholder.png');
                    }
                            ?>
                            <div class="col-lg-4 team_card [ is-collapsed ] border-0 mb-4">
                                <div class="card__inner [ js-expander ]">
                                    <div class="team_img"><img src="<?php echo $image_full; ?>" class="img-fluid w-100" alt="team image" width="350" height="220"></div>
                                    <div class="row pt-3 text-start">
                                        <div class="col-12">
                                            <h3 class=""><?php the_title() ?></h3>
                                            <span class="h7"><?php echo get_post_meta(get_the_ID(), 'team_position', true);  ?></span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php 
                        endwhile; 
                        wp_reset_postdata();  
                    endif;   
                    ?> 
                </div>
            </div>
        </div>
    </div>