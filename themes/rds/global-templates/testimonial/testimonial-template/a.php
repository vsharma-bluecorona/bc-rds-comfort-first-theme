<?php
$get_rds_template_data_array = rds_template();
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : -1;
            $category_name = $args['category_taxonomy'];
            if (empty($category_name) || in_array('all', $category_name)) {
                query_posts(array(
                    'post_type' => 'bc_testimonials',
                    'posts_per_page' => 5,
                    'paged' => $paged,
                    'order' => 'DESC',
                    'post_status' => 'publish',
                ));
            } else {
                query_posts(array(
                    'post_type' => 'bc_testimonials',
                    'posts_per_page' => 5,
                    'paged' => $paged,
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'tax_query' => [
                        'relation' => 'OR', 
                        [
                            'taxonomy' => 'bc_testimonial_category',
                            'field'    => 'name',
                            'terms' => $category_name,
                            'operator' => 'IN', 
                        ],
                    ],
                ));
            }
            

            
            ?>
           <div class="w-100 d-block">
            <div class="d-flex flex-column">
                <div class="d-block order-1 order-lg-1">
                    <div class="container-fluid pt-4 pt-lg-4 pb-lg-2 pb-2 my-1 px-lg-3 px-0">
                        <div class="container subpage_full_content review_page_content pb-lg-0">
                            <div class="row pb-lg-2">
                                <div class="col-12">
                                    <h1><?php echo the_title(); ?></h1>
                                    <h2 class="mb-5 text-capitalize"><?php echo $args['page_templates']['testimonial_page']['subheading']; ?></h2>
                                    <?php if (have_posts()) : ?>
                                        <?php while (have_posts()) : the_post(); ?>
                                            <?php
                                            $message = get_post_meta(get_the_ID(), 'testimonial_message', true);
                                            $heading = get_post_meta(get_the_id(), 'testimonial_heading', true);
                                            ?>
                                            <div class="shadow position-relative review_a px-lg-4 py-lg-2 mb-5">
                                                <p class="p-lg-4 p-3 mx-lg-4 text-center"><?php echo $message; ?></p>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                    <div class="row mb-lg-4 mb-2">
                                        <div class="col-md-12 d-flex align-items-center justify-content-center mt-4">
                                            <?php understrap_pagination(['prev_text' => '<i class="icon-angles-left4"></i>', 'next_text' => '<i class="icon-angles-right4"></i>']); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
         wp_reset_query(); // Reset the custom query
         ?>