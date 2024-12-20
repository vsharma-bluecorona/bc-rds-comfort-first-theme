<style>
.review-swiper-d{
box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
}
.side_reviews .testimonial-pagination-d span {
opacity: 0.4;
background: #CCC !important;
}
.side_reviews .testimonial-pagination-d span.swiper-pagination-bullet-active{
background: #1A88CA !important;
}
</style>
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
$testimonials = array(
['name'=>'Chelsea S.','message'=>'Knowledgeable & reliable, appreciated the communication reminders and explanation of process, friendly technician.'],
['name'=>'Marin M.','message'=>'Courteous, knowledgeable and very helpful. I’ve used these guys for years and they have always been spot on.'],
['name'=>'Amanda J.','message'=>'I highly recommend Comfort First, everyone I talked to and came in contact with was nice, efficient and very thorough. They were patient and answered all of my questions. Thank you so much for your help!'],
["name"=>"Patrick O.","message"=>"The technician was on time, and resolved the problem with professionalism. It was my first Comfort First experience, but it won't be my last."],
);
// $testimonial = array('post_type' => 'bc_testimonials', 'posts_per_page' => 5, 'order' => 'DESC', 'post_status' => 'publish');
        //$query = new WP_Query($testimonial);
        //if ($query->have_posts()) {
           $heading_tag = isset($args['globals']['testimonial']['heading_tag']) ? $args['globals']['testimonial']['heading_tag'] : "h5";
            $subheading_tag = isset($args['globals']['testimonial']['subheading_tag']) ? $args['globals']['testimonial']['subheading_tag'] : "h4";
            ?>
            <!-- use this order class order-7 order-lg-7-->
           
                <div class="side_reviews container-fluid mt-lg-4 my-3 overflow-hidden px-0">
                     <div class="row">
							<div class="col-lg-1 position-relative">
								<div class="swiper-button-prev left-30 d-none d-lg-block review_prev review_prev_a">
									<i class="icon-chevron-left2 text_16 line_height_16 alt_color_3_c transform_lg"></i>
								</div>
							</div>

							<div class="col-lg-10 ">
								<div class="px-lg-1 mx-2 mb-2">
								
									<div class="color_tertiary_bg  swiper review-swiper-d review-swiper-d p-3 text-left testimonials-elementor-widget-slider-d ">
										
										<div class="swiper-wrapper justify-content-start text-start">
											<?php
											 $i = 1;
											/* while ($query->have_posts()) : $query->the_post();
											
												$name = get_post_meta(get_the_ID(), 'testimonial_name', true);
												$city = get_post_meta(get_the_id(), 'testimonial_city', true);
												$logo = get_exist_image_url('testimonial', 'reviews_img' . $i . '');
												$image = get_post_meta( $post->ID, 'testimonial_custom_image', true );
												$state = get_post_meta(get_the_id(), 'testimonial_state', true);
												$message = get_post_meta(get_the_ID(), 'testimonial_message', true); */
												foreach($testimonials as $testimonial):
												
													$name = $testimonial['name'];
													$message = $testimonial['message'];
												?>
												<div class="swiper-slide remove-before-after position-relative ">
													<div class="reviews-base mx-auto d-block">
													<p class="default_font_family text_xbold text_14 line_height_24 text-start d-block pb-1 m-0 color_secondary"><?php echo $name; ?></p>
														<div class="slide-icon d-none d-lg-flex align-items-center pb-3 justify-content-start">
															<i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
															<i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
															<i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
															<i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
															<i class="icon-star1 sm_text_15 sm_line_height_15 text_20 line_height_20 stars_color mx-1"></i>
														</div>
														<p class="d-block text_15 text_medium line_height_24">
															<?php
															$my_content = wp_strip_all_tags($message);
															echo wp_trim_words($my_content, 56);
															?>
														</p>
														<div class="d-lg-block d-none">
															<strong class="d-block d-lg-none"><?php echo $name; ?></strong>
															<p class="mb-0 position-relative top_n2 d-lg-none text_14"><?php echo isset($city) ? $city : ''; ?>
                                                            <?php if (!empty($state)) { echo ','.$state; }  ?></p>
														</div>
													</div>
												</div>
											<?php 
										  $i++;
										//endwhile; 	
										endforeach; ?>	
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-1 position-relative">
								<div class="swiper-button-next d-none d-lg-block review_next review_next_a">
									<i class="icon-chevron-right2 text_16 line_height_16 alt_color_3_c transform_lg"></i>
								</div>
							</div>
                                    
                                
                                <?php
                                global $template;
                                if (!empty($template) && basename($template) == 'rds-landing.php') {
                                    ?>
                                    <div data-dark-color="color_primary" data-light-color="true_white" class="apply-conditional-color swiper-pagination testimonial-pagination-d d-lg-block position-relative  review-pagination-d landing_pagination_a pagination-variation-a text-center pt-lg-0 pb-lg-4 py-4 "></div>
                                <?php } else { ?>
                                    <div data-dark-color="color_primary" data-light-color="true_white" class="swiper-pagination position-relative testimonial-pagination-d d-lg-block review-pagination-d pagination-variation-a text-center pt-lg-0 pb-lg-4 py-4"></div>
                                <?php } ?>
                            </div>
                        
                   
                </div>
           
            <script type="text/javascript">
                jQuery(document).ready(function () {
                    var swiper = new Swiper(".review-swiper-d", {
                        spaceBetween: 70,
                        slidesPerView: 1,
                        loop: true,
                        autoplay: {
                            delay: 8000,
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: ".review-pagination-d",
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
        //}