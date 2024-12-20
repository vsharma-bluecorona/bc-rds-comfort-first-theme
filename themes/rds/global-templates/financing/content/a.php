<div class="container-fluid finance_page pt-5 pt-lg-5 text-start ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <h1 class=""><?php echo $args['page_templates']['finance_page']['heading']; ?></h1>
                            <h2 class="pb-4"><?php echo $args['page_templates']['finance_page']['subheading']; ?></h2>
                           
                               <?php if(!empty($args['page_templates']['finance_page']['button_text'])) { ?>
                                <a target="<?php echo $args['page_templates']['finance_page']['target'] == "true" ? "_blank" : "_self"; ?>" href="<?php echo get_home_url() . $args['page_templates']['finance_page']['button_link']; ?>" class="btn btn-primary"><?php echo $args['page_templates']['finance_page']['button_text']; ?> <i class="icon-chevron-right1 ms-3"></i></a>
                            <?php } ?>

                        </div>
                        <div class="col-lg-7 pt-lg-0 pt-4">
                            <p><?php echo $args['page_templates']['finance_page']['content']; ?></p>

                        </div>
                    </div>
                </div>
            </div>
