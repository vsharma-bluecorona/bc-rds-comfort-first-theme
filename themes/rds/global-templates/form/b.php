<div class="shadow-xl d-lg-block d-none pt-lg-3 pb-lg-4  shadow-lg border_form border_form_light  order-lg-1 order-1">
    
    <span class="d-block pt-lg-1 p-alt text-center font_default text_normal text_27 line_height_32  "><?php echo $args['page_templates']['subpage']['sidebar']['heading']; ?></span>
    <span class="d-block pb-lg-4 p-alt text-center font_default text_semibold text_28 line_height_33  "><?php echo $args['page_templates']['subpage']['sidebar']['subheading']; ?></span>
     <?php 
                                    $form_id = $args['page_templates']['subpage']['sidebar']['gravity_form_id']; 
                                    echo do_shortcode('[gravityforms id='.$form_id.' ajax=true]');?> 
</div>