<?php
if (function_exists('get_promotion_query')) {
    $query = get_promotion_query(1);
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
            $noexpiry = get_post_meta(get_the_ID(), 'promotion_noexpiry', true);
            $colorCode = get_post_meta(get_the_ID(), 'promotion_color', true);
            $date = get_post_meta(get_the_ID(), 'promotion_expiry_date1', true);
            $open_new_tab = get_post_meta(get_the_ID(), 'promotion_open_new_tab', true);
            if (strtotime($date) >= strtotime(current_time('m/d/Y')) || $noexpiry == 1) {
                $title = get_post_meta(get_the_ID(), 'promotion_title1', true);
                $color = get_post_meta(get_the_ID(), 'promotion_color', true);
                $subheading = get_post_meta(get_the_ID(), 'promotion_subheading', true);
                $heading = get_post_meta(get_the_ID(), 'promotion_heading', true);
                $footer_heading = get_post_meta(get_the_ID(), 'promotion_footer_heading', true);
                $more_info = get_post_meta(get_the_ID(), 'promotion_more_info', true);
                $requestButtonLink = get_post_meta($post->ID, 'request_button_link', true);
                $requestButtonTitle = get_post_meta($post->ID, 'request_button_title', true);  
                ?>

                <div class="col-lg-6 px-0 px-lg-3">
                    <div class="h-auto border-quaternary-dashed p-2">
                        <div class="coupon_name promotion_c h-100 text-center p-1">
                            <div class="color_primary_bg mb-2 w-100" style="background-color: <?php echo $color; ?>;">
                                <h4 class="mb-0 pt-lg-3 pt-3 coupon_title coupon_offer"><?php echo $title; ?></h4>
                                <span class="pt-lg-3 pt-2 d-block coupon_expiry"><?php if ($noexpiry != 1) {
                                        echo 'expires ' . $date;
                                    } ?></span>

                                <div class="collapse bg-transparent border-0" id="collapseExample21">
                                    <div class="card card-body bg-transparent border-0">

                                        <span class="d-lg-block d-none text-center py-2 px-lg-0 px-2 pt-2 my-lg-1 coupon_subtitle coupon_heading"><?php echo $heading; ?></span>
                                        <span class="d-block text-center py-2 px-lg-0 px-2 coupon_sub_heading "><?php echo $subheading; ?></span>
                                        <span class="d-block text-center px-lg-0 px-3 pt-lg-0 pt-2 coupon_disclaimer"><?php echo $more_info; ?></span>
                                    </div>
                                </div>
                                <a class="mw-150 text-uppercase font_alt_1 text_18 line_height_23 mh-33 text_semibold text_semibold_hover mb-4 d-inline-flex align-items-center justify-content-center no_hover_underline promotionC_icon" data-bs-toggle="collapse" href="#collapseExample21" role="button" aria-expanded="false" aria-controls="collapseExample21">More info <i class="icon-plus1 ms-4"></i></a>
                            </div>
                            <!-- <a data-bs-toggle="modal" data-bs-target="#request_coupon_form" onclick="couponButtonClick(this);" class="btn btn-secondary w-100 btn-border">Request Service </a> -->
                            <a data-bs-toggle="<?php echo (empty($requestButtonLink) ? 'modal' : ''); ?>" 
                                data-bs-target="<?php echo (empty($requestButtonLink) ? '#request_coupon_form' : ''); ?>" 
                                <?php echo (empty($requestButtonLink) ? 'onclick="couponButtonClick(this);"' : 'href="' . $requestButtonLink . '"'); ?>
                                <?php echo (empty($requestButtonTitle) ? 'aria-label="Request Service"' : 'aria-label="' . $requestButtonTitle . '"'); ?>
                                class="btn btn-secondary w-100 btn-border request_service_button"
                                <?php echo ($open_new_tab == 1 ? 'target="_blank"' : ''); ?>>
                                <?php echo (empty($requestButtonTitle) ? 'Request Service' : $requestButtonTitle); ?> 
                            </a>
                        </div>
                    </div>
                </div>

            <?php }
        endwhile;
    }
}
?> 