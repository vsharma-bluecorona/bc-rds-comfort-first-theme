<?php  $siteid = get_current_blog_id();?> 
<div class="container-fluid color_pink_bg p-0" style="background-color: #ea17a7;"> 
            <!-- Hide this section if announcement bar is disabled--> 
            <div class="container "> 
                <div class="row text-center text-lg-start announcement_bar_text anc-bar-text-md"> 
                    <!-- announcement bar content--> 
                <div class="col-12 text-end d-flex justify-content-center"> 
                        <span class="announcment_bar_text no_hover_underline d-inline-flex align-items-center   "> 
                        <a <?php if($siteid==1){?> href="javascript:void(0)" class="openModalBtn no_hover_underline d-inline-flex align-items-center text_bold text-black font_14" <?php }else{ ?> class="no_hover_underline d-inline-flex align-items-center text_bold text-black font_14" href="<?php echo get_home_url();?>/toys-for-tots/" <?php } ?> >Toys for Tots - Donate & Save!</a> 
                        </span> 
                    </div> 
                </div> 
            </div> 
        </div>
<div class="container-fluid color_tertiary_bg p-0  d-none d-lg-block hide-on-touch"> 
            <!-- Hide this section if announcement bar is disabled--> 
            <div class="container "> 
                <div class="row text-center text-lg-start announcement_bar_text anc-bar-text-md py-2"> 
                    <!-- announcement bar content--> 
                   
                    <div class="col-lg-6 text-center d-flex justify-content-center ps-0"> 
                        <span class="announcment_bar_text no_hover_underline d-inline-flex align-items-center"> 
                            <i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i> 
                            <i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i> 
                            <i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i> 
                            <i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i> 
                            <i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i> 
                            <a class="announcment_bar_text h6 anc-bar-text-md no_hover_underline d-inline-flex align-items-center    ms-1 text_normal" title="<?php echo $args['globals']['announcement']['left']['title']; ?>" href="<?php echo get_home_url() . $args['globals']['announcement']['left']['url']; ?>"  ><?php echo $args['globals']['announcement']['left']['text']; ?> <i class="icon-chevron-right1 ms-1 text_16 line_height_16 transform"></i></a> 
                        </span> 
                    </div>                    
                    <div class="col-lg-6 text-center d-none justify-content-center pink-container py-xl-0 anc-bar-center-text"> 
                        <span class="announcment_bar_text  no_hover_underline d-inline-flex align-items-center"><a href="<?php echo get_home_url() . $args['globals']['announcement']['middle']['url']; ?>" class=" bc_color_black bc_color_black_hover"><?php echo $args['globals']['announcement']['middle']['text']; ?> </a></span>                   
                    </div> 
 
              <div class="col-lg-6 text-end d-flex justify-content-end pe-0 anc-bar-text-md"> 
                        <span class="announcment_bar_text no_hover_underline d-inline-flex align-items-center   "> 
                            <a class="announcment_bar_text h6 anc-bar-text-md no_hover_underline d-inline-flex align-items-center  ms-1 "  title="<?php echo $args['globals']['announcement']['right']['title']; ?>" href="<?php echo network_site_url() . $args['globals']['announcement']['right']['url']; ?>"><i class="<?php echo $args['globals']['announcement']['right']['icon_class']; ?> text_16 line_height_16 me-2 color_primary"></i> 
                                <?php echo $args['globals']['announcement']['right']['text']; ?> <i class="icon-chevron-right1 ms-1 text_16 line_height_16 transform"></i></a> 
                        </span> 
                    </div> 
                </div> 
            </div> 
        </div> 