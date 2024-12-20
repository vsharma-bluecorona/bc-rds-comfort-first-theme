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
} ?>
<div class="w-100 d-block">
<div class="d-flex flex-column">
<div class="d-block order-1 order-lg-1">
<div class="container-fluid pt-4 pt-lg-4 pb-lg-5 pb-5 my-1 px-lg-3 px-0">
    <div class="container review_page_content pb-lg-0">
        <div class="row pb-lg-2">
            <div class="col-12">
            <h1><?php echo the_title(); ?></h1>
            <h2 class="mb-5 text-capitalize"><?php echo $args['page_templates']['testimonial_page']['subheading']; ?></h2>
          
          
            </div>
                <?php 
                                    
                                $blogid =get_current_blog_id();

                                if ($blogid == 1) { ?>
                                    <div class="col-lg-4 col-md-6 col-12 mb-2"><a target="_blank" class="btn btn-primary btn-review mw-300" href="https://g.page/r/CeVj3nBqsgNvEB0/review">WRITE A REVIEW FOR SANFORD</a></div>
                               <?php  } elseif ($blogid == 3) { ?>
                                    <div class="col-lg-4 col-md-6 col-12 mb-2"><a target="_blank" class="btn btn-primary btn-review mw-300" href="https://g.page/r/CeVj3nBqsgNvEB0/review">WRITE A REVIEW FOR SANFORD</a></div>
                               <?php } elseif ($blogid == 4) { ?>
                                    <div class="col-lg-4 col-md-6 col-12 mb-2"><a target="_blank" class="btn btn-primary btn-review" href="https://www.google.com/maps/place/Comfort+First+Heating+and+Cooling/@35.95104,-80.0312299,15z/data=!4m8!3m7!1s0x88530916263602df:0x466e05be13d510fe!8m2!3d35.95104!4d-80.0312299!9m1!1b1!16s%2Fg%2F11vkpmdz36?entry=ttu">Leave a Review for High Point </a></div>
                               <?php } elseif ($blogid == 5) { ?>
                                    <div class="col-lg-4 col-md-6 col-12 mb-2"><a target="_blank" class="btn btn-primary btn-review mw-300" href="https://g.page/r/CYnB1yeD9_zlEBM/review">WRITE A REVIEW FOR MATTHEWS</a></div>
                                    <div class="col-lg-4 col-md-6 col-12 mb-2"><a target="_blank" class="btn btn-primary btn-review mw-300" href="https://g.page/r/CUeB3I9q0vp1EAI/review">Write a Review for Concord</a></div>
                                    <div class="col-lg-4 col-md-6 col-12 mb-2"><a target="_blank" class="btn btn-primary btn-review mw-300" href="https://g.page/r/CZetAoM0uwlOEAI/review">Write a Review for Conover</a></div>
                               <?php } elseif ($blogid == 6) { ?>
                                    <div class="col-lg-4 col-md-6 col-12 mb-2"><a target="_blank" class="btn btn-primary btn-review mw-300" href="https://www.google.com/search?q=your+comfort+first+jacksonville+nc&amp;rlz=1C1RXQR_enUS982US982&amp;oq=your+comfort+first+jacksonville+nc&amp;aqs=chrome..69i57j33i160l3.3862j0j7&amp;sourceid=chrome&amp;ie=UTF-8#lrd=0x89a913f223938edb:0x1f4797499ed45cd7,3,,,,">Write A Review For Jacksonville</a></div>
                               <?php } elseif ($blogid == 7) { ?>
                                    <div class="col-lg-4 col-md-6 col-12 mb-2"><a target="_blank" class="btn btn-primary btn-review mw-300" href="https://g.page/r/CXhXm4fmlKEsEBM/review">WRITE A REVIEW FOR POWELL’S POINT</a></div>
                               <?php } 
                                ?>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?php
wp_reset_query(); // Reset the custom query