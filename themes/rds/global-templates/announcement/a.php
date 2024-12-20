<div class="container-fluid  p-0  py-xl-2 color_tertiary_bg
">
            <!-- Hide this section if announcement bar is disabled-->
            <div class="container ">
                <div class="row text-center text-lg-start announcement_bar_text">
                    <!-- announcement bar content-->
                    <div class="col-lg-4 text-start d-flex justify-content-start">
                        <?php if ($args['globals']['announcement']['left']['type'] == 'link') { ?>
                            <a class="announcment_bar_text  d-inline-flex align-items-center justify-content-start me-auto tooltip-text" title="<?php echo $args['globals']['announcement']['left']['title']; ?>"  href="<?php echo get_home_url() . $args['globals']['announcement']['left']['url']; ?>"><i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-2 icon"></i> <?php echo $args['globals']['announcement']['left']['text']; ?>
                            </a>
                        <?php } else { ?>
                            <span title="<?php echo $args['globals']['announcement']['left']['title']; ?>" class="announcment_bar_text  d-inline-flex align-items-center text_normal justify-content-start me-auto tooltip-text position-relative"><i class="<?php echo $args['globals']['announcement']['left']['icon_class']; ?> text_16 line_height_16 me-2 icon"></i> <?php echo $args['globals']['announcement']['left']['text']; ?>
                                <div class="tooltips p-4 text-center text-transform-none"><span class="p d-inline-block tool_tip_text"><?php echo $args['globals']['announcement']['left']['tooltip_text']; ?></span></div>
                            </span>
                        <?php } ?> 
                    </div>
                    <div class="col-lg-4 text-center d-flex justify-content-center">
                        <span class="announcment_bar_text  d-inline-flex align-items-center">
                            <i class="<?php echo $args['globals']['announcement']['middle']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i>
                            <i class="<?php echo $args['globals']['announcement']['middle']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i>
                            <i class="<?php echo $args['globals']['announcement']['middle']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i>
                            <i class="<?php echo $args['globals']['announcement']['middle']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i>
                            <i class="<?php echo $args['globals']['announcement']['middle']['icon_class']; ?> text_16 line_height_16 me-1 stars_color"></i>
                            <a class="announcment_bar_text  d-inline-flex align-items-center    ms-1 text_normal" title="<?php echo $args['globals']['announcement']['middle']['title']; ?>" href="<?php echo get_home_url() . $args['globals']['announcement']['middle']['url']; ?>"  ><?php echo $args['globals']['announcement']['middle']['text']; ?> <i class="icon-chevron-right1 ms-1 text_16 line_height_16 transform"></i></a>
                        </span>
                    </div>
                    <div class="col-lg-4 text-end d-flex justify-content-end">
                        <span class="announcment_bar_text  d-inline-flex align-items-center   ">
                            <a class="announcment_bar_text  d-inline-flex align-items-center  ms-1 "  title="<?php echo $args['globals']['announcement']['right']['title']; ?>" href="<?php echo get_home_url() . $args['globals']['announcement']['right']['url']; ?>"><i class="<?php echo $args['globals']['announcement']['right']['icon_class']; ?> text_16 line_height_16 me-1 icon"></i>
                                <?php echo $args['globals']['announcement']['right']['text']; ?> <i class="icon-chevron-right1 ms-1 text_16 line_height_16 transform"></i></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>