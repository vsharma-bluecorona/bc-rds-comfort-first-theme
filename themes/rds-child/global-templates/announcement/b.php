<div class="container-fluid color_secondary_bg p-0 ">
            <!-- Hide this section if announcement bar is disabled-->
            <div class="container ">
                <div class="row text-center text-lg-start announcement_bar_text">
                    <!-- announcement bar content-->
                    <div class="col-lg-4 text-start d-flex">
                        <?php if ($args['globals']['announcement']['left']['type'] == 'link') { ?>
                            <a class="announcment_bar_text no_hover_underline d-inline-flex align-items-center" title="<?php echo $args['globals']['announcement']['left']['title']; ?>" href="<?php echo get_home_url() . $args['globals']['announcement']['left']['url']; ?>" ><i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-2 icon"></i> <?php echo $args['globals']['announcement']['left']['text']; ?>
                            </a>
                        <?php } else { ?>
                            <span title="<?php echo $args['globals']['announcement']['left']['title']; ?>" class="  no_hover_underline d-inline-flex announcment_bar_text align-items-center tooltip-text position-relative" ><i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-2 icon" ></i> <?php echo $args['globals']['announcement']['left']['text']; ?>
                                <div class="tooltips p-4 text-center text-transform-none"><span class="p d-inline-block tool_tip_text"><?php echo $args['globals']['announcement']['left']['tooltip_text']; ?></span></div>
                            </span>
                        <?php } ?> 
                    </div>
                    
                    <div class="col-lg-8 text-end d-flex justify-content-end align-items-center">
                        <?php if($args['globals']['announcement']['desktop_schedule_online_button']['enabled'] == true){ ?>
                        <?php if (isset($args['globals']['announcement']['desktop_schedule_online_button']) && $args['globals']['announcement']['desktop_schedule_online_button']['type'] != 'url') { ?>
                            <span id="schedule_online_button_desktop" class="announcment_bar_text no_hover_underline cursor-pointer text_15   position-relative text_normal align-items-center justify-content-center  pe-2 text-capitalize h-32 color_tertiary_bg d-inline-flex" ><i class="px-2 <?php echo $args['globals']['announcement']['desktop_schedule_online_button']['icon_class']; ?>"></i><?php echo $args['globals']['announcement']['desktop_schedule_online_button']['label']; ?></span>
                        <?php } else { ?>
                            <a  class="announcment_bar_text no_hover_underline text_15 position-relative text_normal align-items-center justify-content-center  w-167 h-32 color_tertiary_bg d-inline-flex" href="<?php echo get_home_url() . $args['globals']['announcement']['desktop_schedule_online_button']['url'] ?>"><i class="px-2 <?php echo $args['globals']['announcement']['desktop_schedule_online_button']['icon_class']; ?>"></i><?php echo $args['globals']['announcement']['desktop_schedule_online_button']['label']; ?></a>
                        <?php }}  
                        $phoneNumber = $args['site_info']['phone'];
                        $formatedPhone = '('.substr($phoneNumber, 0, 3).') ' . substr($phoneNumber, 3, 3). '-'.substr($phoneNumber, 6);
                        ?>  
                        <a class="px-1 no_hover_underline font_default position-relative text_bold  align-items-center justify-content-center  px-2 h-32 color_callbtn d-inline-flex true_black " title="<?php echo $args['globals']['announcement']['right']['title']; ?>" href="tel:<?php echo $args['site_info']['country_code']; ?><?php echo $args['site_info']['phone']; ?>"><i class=" <?php echo $args['globals']['announcement']['right']['icon_class']; ?> text_16 line_height_16 me-1 icon" ></i><span class="text_normal d-inline-flex me-1"><?php echo $args['globals']['announcement']['right']['text']; ?>:</span> <?php echo $args['site_info']['country_code']; ?><?php echo $formatedPhone; ?>
                        </a>
                    </div>
                   
                </div>
            </div>
        </div>