<?php

$heading = $args['heading'];
$subheading = $args['subheading'];
$content = $args['content'];

?>
<section>
  <div class="text-lg-end text-center container  d-none px-0">
               <span class="d-block color_primary default_font_family_c text_bold text_64 line_height_60 sm_text_28 sm_line_height_35 text_bold mb-n7-px ">Comfort You Can Count On</span>
            </div>
<div class="container-fluid my-lg-5-7 my-6 py-lg-5 py-4 maintenance-bg">
   <div class="container">
      <div class="row">
         <div class="col-lg-12  pb-lg-0 pb-5">
            
             <span class="pb-lg-4 h1 d-block text-center text-lg-start px-5 px-lg-0 text-sm-uppercase"><?php echo esc_html($heading); ?></span>            
             <?php echo $content; ?>
         </div>
      </div>
   </div>
</div>     
</section>    
<div class="container-fluid px-0 px-lg-3">
   <div class="container custom-padding">
      <div class="row">
         <div class="offset-xl-6 offset-lg-6 col-xl-6 col-lg-6 mt-lg-n17 mt-n8">
            <div class="box-lg-shadow box-sm-shadow img-border-8 border-radius-8 true_white_bg mascot_2 position-relative">
               <div class="my-auto px-4 mx-lg-2 pt-4 pt-lg-2 pb-2">
                  <span class="d-block text_28 line_height_28 text_normal pb-0 mb-0 sm_text_20  default_font_family_c true_black">Plans That Fit Your Budget</span>
                  <p class="mt-0"><?php echo esc_html($subheading); ?></p>
                  <div class="mt-4 pb-4">
                    <?php
                  $blogid = get_current_blog_id();
                  $class_pop = ''; // Initializing $class_pop outside the conditional block
                  $href = ''; // Initializing $href outside the conditional block
                  if ($blogid == 1) {
                      $class_pop = "openModalBtn";
                      $href = "javascript:void(0);"; // Assigning a JavaScript void function for blog ID 1
                  } else {
                      $href = get_home_url() . '/maintenance-agreement/'; // Concatenating the home URL with the path
                  }
                  ?>
                  <a class="<?php echo $class_pop;?> d-none d-lg-block" href="<?php echo $href?>">
                      <button class="btn btn-primary mw-206">Learn More</button>
                  </a>
                  <a class="<?php echo $class_pop;?>  d-lg-none " href="<?php echo $href?>">
                      <button class="btn btn-primary mw-170">Learn More</button>
                  </a>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>