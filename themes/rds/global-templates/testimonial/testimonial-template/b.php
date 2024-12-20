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
                        $message = get_post_meta( get_the_ID(), 'testimonial_message', true );
                        $name = get_post_meta( get_the_id(), 'testimonial_name', true );
                        $heading = get_post_meta( get_the_id(), 'testimonial_heading', true );
                          $city = get_post_meta(get_the_id(), 'testimonial_city', true);
                          $state = get_post_meta(get_the_id(), 'testimonial_state', true);
                        ?>
                        <div class="pb-lg-4 pe-lg-2 pt-lg-2 ms-3 mb-5 review_b">
                            <div class="border-left-secondary py-lg-5 py-3 px-lg-0 px-3 shadow position-relative">
                                <div class="review-quote-icon d-flex top-n18 left-n20  w-35 h-35 justify-content-center color_secondary_bg rounded-circle position-absolute align-items-center position-absolute"><i class="p-alt icon-quote-left1   line_height_18 text_18  "></i></div>
                                <div class="row align-items-lg-center">
                                    <div class="col-lg-10 border-lg-right-1">
                                        <p class="pb-3 ps-lg-4 "><?php echo $message;?></p>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="slide-icon  align-items-center pb-lg-0 pb-2 d-flex justify-content-start ps-lg-2">
                                            <i class="icon-star1 stars_color text_12 line_height_12 me-1"></i>
                                            <i class="icon-star1 stars_color text_12 line_height_12 me-1"></i>
                                            <i class="icon-star1 stars_color text_12 line_height_12 me-1"></i>
                                            <i class="icon-star1 stars_color text_12 line_height_12 me-1"></i>
                                            <i class="icon-star1 stars_color text_12 line_height_12 me-0"></i>
                                        </div>
                                        <strong class="d-block text_16 line_height_26_4 px-lg-2 text_bold"><?php echo $name;?></strong>
                                         <strong class="d-block text_16 line_height_26_4 px-lg-2">
                                            <?php if (!empty($city) && !empty($state)) {
                                                echo $city . ', ' . $state;
                                            } elseif (!empty($city)) {
                                                echo $city;
                                            } elseif (!empty($state)) {
                                                echo $state;
                                            } ?>
                                         </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <div class="row ">
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