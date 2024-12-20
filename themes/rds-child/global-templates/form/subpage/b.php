

<div class="form-margin pt-1 pb-2 d-lg-block d-none text-center px-3">
			<div class="text-start">
				<img src="<?php echo get_exist_image_url('subpage-sidebar','ribbon'); ?>"  alt="ribbon" class="bmt-n5" style="max-width: 333px;" width="333" height="89">
			</div>
			<div class="entry-content color_tertiary_bg py-4 mt-n4 sidebar-form">
				 <span class="d-block  pt-3 footer-popup-heading"><?php echo $args['page_templates']['subpage']['sidebar']['request_service']['heading']; ?></span>
    <span class="d-block mb-4 pb-1 footer-popup-subheading"><?php echo $args['page_templates']['subpage']['sidebar']['request_service']['subheading']; ?></span>
					<div class="px-2 pb-3">
						<div class="px-2">
						
						<?php 
                                    $form_id = $args['page_templates']['subpage']['sidebar']['request_service']['gravity_form_id']; 
                                    echo do_shortcode('[gravityforms id='.$form_id.' ajax=true]');?> 
                                </div>
					</div>
				</div>
			</div>



