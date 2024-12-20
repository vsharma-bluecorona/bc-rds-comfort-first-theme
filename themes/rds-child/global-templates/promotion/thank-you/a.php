<?php
if (function_exists('get_promotion_query')) {
    $query = get_promotion_query(1);
    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            $promotion_type = get_post_meta(get_the_ID(), 'promotion_type', TRUE);
            $noexpiry = get_post_meta(get_the_ID(), 'promotion_noexpiry', true);
            $colorCode = get_post_meta(get_the_ID(), 'promotion_color', true);
            $date = get_post_meta(get_the_ID(), 'promotion_expiry_date1', true);

            if (strtotime($date) >= strtotime(current_time('m/d/Y')) || $noexpiry == 1) {
                $title = get_post_meta(get_the_ID(), 'promotion_title1', true);
                $color = get_post_meta(get_the_ID(), 'promotion_color', true);
                $subheading = get_post_meta(get_the_ID(), 'promotion_subheading', true);
                $heading = get_post_meta(get_the_ID(), 'promotion_heading', true);
                $footer_heading = get_post_meta(get_the_ID(), 'promotion_footer_heading', true);
                ?>
                <div class="col-lg-6 px-0 px-lg-3">
                    <div class="ps-lg-4 ms-lg-3">
                        <div class="h-auto color_primary_bg border-radius-10 p-lg-3 p-3" style="background-color: <?php echo $colorCode; ?>;">
                            <div class="coupon_name border-dashed-3 border-lg-dashed-5 h-100 py-4 p-4 px-lg-4 text-center">
                                <span class="d-block text-center px-lg-0 px-3 coupon_heading coupon_subtitle"><?php echo $heading; ?></span>
                                <span class="d-block text-center pb-0 px-lg-0 px-2 pt-3 coupon_sub_heading"><?php echo $subheading; ?></span>
                                <h4 class="mb-0 pt-1 pb-4 coupon_title coupon_offer"><?php echo $title; ?></h4>
                                <a data-bs-toggle="modal" data-bs-target="#request_coupon_form" onclick="couponButtonClick(this);" class="btn btn-primary mw-206">Redeem Offer <i class="icon-chevron-right1 text_18 line_height_18 ms-2 me-0"></i></a>
                                <span class="pt-4 pb-4 pb-lg-4 mb-2 d-block coupon_expiry"><?php if ($noexpiry != 1) {
                                        echo 'Expires ' . $date . '<br>';
                                    } ?><span class="d-block coupon_disclaimer"><?php echo $footer_heading; ?></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        endwhile; ?>
    <?php }
}
?>