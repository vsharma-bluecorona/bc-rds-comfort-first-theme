<div class="d-block ">
    <div class="container-fluid pt-5 pt-lg-2 text-center ">
        <div class="container pt-lg-2 py-2">
            <div class="row align-items-center py-lg-2">
                <div class="col-lg-12 px-0 bc_homepage text-center">
                    <h1 class=""><?php echo $args['page_templates']['homepage']['seo_section']['heading']; ?></h1>
                    <h2 class="pb-lg-5"><?php echo $args['page_templates']['homepage']['seo_section']['subheading']; ?> </h2>
                     <p ><?php echo $args['page_templates']['homepage']['seo_section']['before_read_more_content']; ?></p>
 <div class="collapse bg-transparent border-0" id="read_more">
            <div class="card card-body bg-transparent border-0">
                <p><?php echo $args['page_templates']['homepage']['seo_section']['after_read_more_content']; ?></p>
            </div>
        </div>
<?php
            if (!empty($args['page_templates']['homepage']['seo_section']['after_read_more_content'])) {
         echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); } ?>                
                </div>
            </div>
        </div>
    </div>
</div>