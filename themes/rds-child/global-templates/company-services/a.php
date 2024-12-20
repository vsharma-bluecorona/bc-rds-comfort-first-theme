<!--order-9 order-lg-9-->
<?php $get_alt_text = rds_alt_text();
$alt = "";   
foreach ($get_alt_text as $value) {

if (in_array("company-services-img.webp", $value))
   $alt =  'alt="'.$value[3].'"'; 

}
 ?>  
<div class="d-block ">
             <div class="container-fluid bg-white px-0 px-lg-2 pb-3 pb-lg-3 pt-lg-0 mb-4  mt-lg-0">
                        <div class="container px-lg-3 px-0">
                         <div class="row">                   
                           </div>          
                            <div class="d-lg-flex  mx-0  mt-lg-5 px-3 px-lg-0">
                                <div class="text-md-right px-lg-3 px-md-5  mt-lg-0 mb-4 mb-lg-0 col-lg-6 ">
                                    <div class="img_section  pt-lg-0 pt-xl-2  mt-lg-0 pl-lg-4 pl-md-3 pe-lg-2">
                                        <div class="">
                                    <img src="<?php echo get_exist_image_url('our-mission', 'mission-img'); ?>" 
                                    srcset="<?php echo get_exist_image_url('our-mission', 'mission-img'); ?> 1x, 
                                            <?php echo get_exist_image_url('our-mission', 'mission-img@2x'); ?> 2x, 
                                            <?php echo get_exist_image_url('our-mission', 'mission-img@3x'); ?> 3x" 
                                    <?php echo $alt; ?> class="img-fluid" width="522" height="327">
                                </div>
                     
                                    </div>
                                </div>
                                <div class="cmpny-content  col-lg-6">
                                <h4 class="text-lg-start text-start ml-lg-5 h1"><?php echo $args['globals']['company_services']['heading']; ?></h4>
                                 <h2 class="mb-lg-0 pb-3 pb-lg-0 text-lg-start text-start ml-lg-5"><?php echo $args['globals']['company_services']['subheading']; ?></h2>
                                    <div class="treat_content mx-lg-0 mx-auto pt-lg-4 ">                                                                       
                                        <?php echo $args['globals']['company_services']['description_html_allowed']; ?>
                                 <?php if (!empty($args['globals']['company_services']['button_text'])) {?>
                                        <div class="text-lg-start text-start pt-3"><a href="<?php echo network_site_url().$args['globals']['company_services']['button_link']; ?>" class="btn btn-primary mw-206 mx-lg-0 mx-auto"><?php echo $args['globals']['company_services']['button_text']; ?></a></div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>