
<div class="hero_banner_form_background">
    <div class="container-fluid px-lg-3 px-0">
        <div class="container mt-lg-n5 ">
            <div class="row">
                <div class="col-lg-12 mt-lg-n5 px-0 px-lg-3 home-form">
                    <div class=" py-4 px-lg-5 px-4 shadow-1 elementor-form-c">
                        <h3 class="pb-4 text-center mb-0"><?php echo  $args['globals']['hero']['form_heading']; ?></h2>
                        <div class="border_form bg_form">
                        <?php $form_id = $args['globals']['hero']['mobile_gravity_form_id']; 
                       echo do_shortcode('[gravityforms id='.$form_id.' ajax=true]');?> 
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>