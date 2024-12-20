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
                $requestButtonLink = get_post_meta($post->ID, 'request_button_link', true);
                $requestButtonTitle = get_post_meta($post->ID, 'request_button_title', true);
                ?>
                <div class="col-lg-6 px-0 px-lg-3">
                    <div class="h-auto color_primary_bg p-lg-3 p-3" style="background-color: <?php echo $colorCode; ?>;">
                        <div class="coupon_name border-dashed-5 border-lg-dashed-5 h-100 py-4 p-4 px-lg-0 text-center">
                            <span class="d-block text-center px-lg-0 px-3 coupon_heading coupon_subtitle"><?php echo $heading; ?></span>
                            <span class="d-block text-center pb-0 px-lg-0 px-2 pt-3 coupon_sub_heading"><?php echo $subheading; ?></span>
                            <h4 class="mb-0 py-3 coupon_title coupon_offer"><?php echo $title; ?></h4>
                            <!-- <a data-bs-toggle="modal" data-bs-target="#request_coupon_form" onclick="couponButtonClick(this);" class="btn btn-secondary mw-226">Request Service <i class="icon-chevron-right text_18 line_height_18 ms-2"></i></a> -->
                            <a data-bs-toggle="<?php echo (empty($requestButtonLink) ? 'modal' : ''); ?>" 
                                data-bs-target="<?php echo (empty($requestButtonLink) ? '#request_coupon_form' : ''); ?>" 
                                <?php echo (empty($requestButtonLink) ? 'onclick="couponButtonClick(this);"' : 'href="' . $requestButtonLink . '"'); ?>
                                <?php echo (empty($requestButtonTitle) ? 'aria-label="Request Service"' : 'aria-label="' . $requestButtonTitle . '"'); ?>
                                class="btn btn-secondary mw-226 request_service_button"
                                <?php echo ($open_new_tab == 1 ? 'target="_blank"' : ''); ?>>
                                <?php echo (empty($requestButtonTitle) ? 'Request Service' : $requestButtonTitle); ?> 
                                <i class="icon-chevron-right text_18 line_height_18 ms-2"></i>
                            </a>
                            <span class="pt-3 d-block coupon_expiry"><?php if ($noexpiry != 1) {
                                    echo 'Expires ' . $date;
                                } ?></span><span class="d-block coupon_disclaimer"><?php echo $footer_heading; ?></span>
                        </div>
                    </div>
                </div>
            <?php }
        endwhile; ?>
    <?php }
}
?> 