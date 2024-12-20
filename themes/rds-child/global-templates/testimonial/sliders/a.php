<?php 
$widget_id = 32453;
$category_name = $args['category_taxonomy'];
if (empty($category_name) || in_array('all', $category_name)) {
    $testimonial = array(
        'post_type'      => 'bc_testimonials',
        'posts_per_page' => 5,
        'order'          => 'ASC',
        'post_status'    => 'publish',
        
    );
} else {
    $testimonial = array(
        'post_type'      => 'bc_testimonials',
        'posts_per_page' => 5,
        'order'          => 'ASC',
        'post_status'    => 'publish',
        'tax_query' => [
            'relation' => 'OR', 
            [
                'taxonomy' => 'bc_testimonial_category',
                'field'    => 'name',
                'terms' => $category_name,
                'operator' => 'IN', 
            ],
        ],
    );
}

// $testimonial = array('post_type' => 'bc_testimonials', 'posts_per_page' => 5, 'order' => 'DESC', 'post_status' => 'publish');
        $query = new WP_Query($testimonial);
        if ($query->have_posts()) {
           $heading_tag = isset($args['globals']['testimonial']['heading_tag']) ? $args['globals']['testimonial']['heading_tag'] : "h5";
            $subheading_tag = isset($args['globals']['testimonial']['subheading_tag']) ? $args['globals']['testimonial']['subheading_tag'] : "h4";
            ?>
            <!-- use this order class order-7 order-lg-7-->
            <div class="d-block  px-0">
                <div class="reviews-bg container-fluid mt-lg-5 mb-lg-0 my-3  px-0 px-lg-3 pb-0 overflow-hidden">
                    <div class="container py-lg-5 pb-5 pt-1 mb-lg-5">
                        <div class="">
                       <div class="row">
                            <div class="col-lg-4 px-0 px-lg-3 custom-padding our-reviews">
                                <div class="position-lg-absolute position-relative mr-xl-0 mr-lg-4 mr-0">
                                    <img class="mt-lg-4  position-relative index-1"  src="<?php echo get_stylesheet_directory_uri().'/img/hero/ribbon.png'; ?>" alt="50+ years of experience ribbon with stars">
                                    
                                   <div class="left-content position-relative box-lg-shadow   true_white_bg text-lg-start text-md-center text-center py-4 ps-lg-5 ps-md-0 ps-0 mt-n4 d-block m-auto" id="counter">
                                      <div class="mb-lg-4 mb-3 mt-lg-0 mt-n2">
                                         <div class="d-flex justify-content-center justify-content-lg-start"><span class="d-block color_secondary  default_font_family_c text_40 line_height_45 text_heavy pt-4 counter-value" data-count="85000"></span><i class="icon-plus-large2 pt-3 mt-3 ml-2 color_secondary bc_text_20"></i></div>
                                         <span class="d-block true_black text_normal font_default text_23 line_height_28 pt-3">Satisfied Customers</span>
                                      </div>
                                      <div class="mb-lg-4 mb-3">
                                      <div class="d-flex justify-content-center justify-content-lg-start"><span class="d-block color_secondary  default_font_family_c text_40 line_height_45 text_heavy pt-4  counter-value" data-count="4500"></span><i class="icon-plus-large2 pt-3 mt-3 ml-2 color_secondary bc_text_20"></i></div>
                                         <span class="d-block  true_black text_normal font_default text_23 line_height_28 pt-3">Total Reviews</span>
                                      </div>
                                      <div class="mb-lg-4 mb-3">
                                         <span class="d-block color_secondary  default_font_family_c text_40 line_height_45 text_heavy pt-4  pt-4">4.6</span>
                                         <span class="d-block  true_black text_normal font_default text_23 line_height_28 pt-3">Google Rating</span>
                                      </div>
                                      <div class="my-lg-5 mt-5 mb-4 pb-lg-3">
                                         <?php if (!empty($args['globals']['testimonial']['button_text'])) : ?>
                                    <a href="<?php echo get_home_url() . $args['globals']['testimonial']['button_link']; ?>" class="btn btn-primary mw-206" target="<?php echo isset($args['globals']['testimonial']['is_external']) ? $args['globals']['testimonial']['is_external'] : false; ?>"><?php echo $args['globals']['testimonial']['button_text']; ?></a> <?php endif; ?>
                                      </div>
                                   </div>
                                </div>
                             </div>
                            <div class="col-lg-8 ps-lg-5">                               
                                <div class="slide-icon d-none d-lg-flex align-items-center pb-2 justify-content-center">
                                    <i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
                                    <i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
                                    <i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
                                    <i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
                                    <i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
                                </div>
                                <<?= $heading_tag ?> class="d-none"><?php echo $args['globals']['testimonial']['heading']; ?></<?= $heading_tag ?>>
                                <<?= $subheading_tag ?> class="text-center px-lg-5 h1 pb-4 mt-5 mt-lg-0 mx-lg-4 mb-0"><?php echo $args['globals']['testimonial']['subheading']; ?></<?= $subheading_tag ?>>
                                <div class="row">
                                    <div class="col-lg-1 position-relative">
                                            <div class="swiper-button-prev left-30 d-none d-lg-block review_prev review_prev_a">
                                                <i class="icon-chevron-left2  text_14 line_height_16 alt_color_3_c  transform_lg"></i>
                                            </div>
                                        </div>

                                        
                                    <div class="col-lg-10 ">
                                        <div class="px-lg-1 mx-lg-1">
                                            <div class="swiper review-swiper-a review-swiper-a-<?= $widget_id; ?> pt-3 pb-6  px-2 text-center testimonials-elementor-widget-slider-a ">
                                                <div class="swiper-wrapper align-items-center">
                                                    <?php
                                                     $i = 1;
                                                    while ($query->have_posts()) : $query->the_post();
                                                        $name = get_post_meta(get_the_ID(), 'testimonial_name', true);
                                                        $city = get_post_meta(get_the_id(), 'testimonial_city', true);
                                                        $logo = get_exist_image_url('testimonial', 'reviews_img' . $i . '');
                                                        $image = get_post_meta( $post->ID, 'testimonial_custom_image', true );
                                                        $state = get_post_meta(get_the_id(), 'testimonial_state', true);
                                                        $message = get_post_meta(get_the_ID(), 'testimonial_message', true);
                                                        ?>
                                                        <div class="swiper-slide remove-before-after position-relative ">
                                                            <div class="reviews-base true_white_bg mx-auto py-5 d-block">
                                                                <img class="mb-2 mt-md-n3 mt-n4 photo rounded-circle entered lazyloaded" src="<?php echo $logo; ?>" alt="testimonial_image" width="95" height="95">
                                                            <p class="d-block px-lg-5 px-3 pt-4 mt-3">
                                                                <?php
                                                                $my_content = wp_strip_all_tags($message);
                                                                echo wp_trim_words($my_content, 56);
                                                                ?>
                                                            </p>
                                                            <div class="d-lg-block d-none">
                                                                <strong class="d-block d-lg-none"><?php echo $name; ?></strong>
                                                                <p class="mb-0 position-relative top_n2 d-lg-none text_14"><?php echo $city; ?><?php if (!empty($state)) {
                                            echo ','.$state;
                                        }  ?></p>
                                                            </div>
                                                        </div>
                                                        
                                                        </div>
                                                    <?php 
                                                  $i++;
                                                endwhile; ?>	
                                                </div>
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <div class="col-lg-1 position-relative">
                                            <div class="swiper-button-next d-none d-lg-block review_next review_next_a">
                                                <i class="icon-chevron-right2 text_14 line_height_16 alt_color_3_c transform_lg"></i>
                                            </div>
                                        </div>
                                    
                                </div>
                                <?php
                                global $template;
                                if (!empty($template) && basename($template) == 'rds-landing.php') {
                                    ?>
                                    <div data-dark-color="color_primary" data-light-color="true_white" class="apply-conditional-color swiper-pagination testimonial-pagination d-lg-none position-relative  review-pagination-a-<?= $widget_id; ?> landing_pagination_a pagination-variation-a text-center pt-lg-0 pb-lg-4 py-4 "></div>
                                <?php } else { ?>
                                    <div data-dark-color="color_primary" data-light-color="true_white" class="swiper-pagination position-relative testimonial-pagination d-lg-none review-pagination-a-<?= $widget_id; ?> pagination-variation-a text-center pt-lg-0 pb-lg-4 py-4"></div>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    var swiper = new Swiper(".review-swiper-a-<?= $widget_id; ?>", {
                        spaceBetween: 70,
                        slidesPerView: 1,
                        loop: true,
                        autoplay: {
                            delay: 8000,
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: ".review-pagination-a-<?= $widget_id; ?>",
                            clickable: true
                        },
                        navigation: {
                            nextEl: ".review_next",
                            prevEl: ".review_prev"
                        },
                    });
                })
            </script>
           <script type="text/javascript">
              jQuery(window).on('scroll',function() {
                if (checkVisible(jQuery('.our-reviews'))) {
                 // console.log('hi');
                    jQuery(".counter-value").each(function () {
                        var $this = jQuery(this),
                            countTo = $this.attr("data-count");
                        jQuery({
                            countNum: $this.text()
                        }).animate(
                            {
                                countNum: countTo
                            },

                            {
                                duration: 6000,
                                easing: 'linear',
                                step: function () {
                                    //$this.text(Math.ceil(this.countNum));
                                    $this.text(
                                        Math.ceil(this.countNum).toLocaleString("en")
                                    );
                                },
                                complete: function () {
                                    $this.text(
                                        Math.ceil(this.countNum).toLocaleString("en")
                                    );
                                    //alert('finished');
                                }
                            }
                        );
                    });
                    jQuery(window).off('scroll');
                } else {
                    // do nothing
                }
            });
            function checkVisible( elm, eval ) {
                eval = eval || "object visible";
                var viewportHeight = jQuery(window).height(), // Viewport Height
                    scrolltop = jQuery(window).scrollTop(), // Scroll Top
                    y = jQuery(elm).offset().top,
                    elementHeight = jQuery(elm).height();

                if (eval == "object visible") return ((y < (viewportHeight + scrolltop)) && (y > (scrolltop - elementHeight)));
                if (eval == "above") return ((y < (viewportHeight + scrolltop)));
            }

            </script>
            <?php
        }