    <div class="col-lg-12">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholder.png" srcset="<?php echo get_stylesheet_directory_uri(); ?>/img/placeholder.png 1x, <?php echo get_stylesheet_directory_uri(); ?>/img/placeholder@2x.png 2x, <?php echo get_stylesheet_directory_uri(); ?>/img/placeholder@3x.png 3x" class="img-fluid float-lg-end ms-lg-5 pb-lg-0 pb-4" width="540" height="389" alt="Homepage Image">
                                <h1 class=""><?php echo $args['page_templates']['history_page']['seo_section']['heading'] ?></h1>
                                <h2 class="pb-lg-5 mb-0"><?php echo $args['page_templates']['history_page']['seo_section']['subheading'] ?></h2>
                                <p ><?php echo $args['page_templates']['history_page']['seo_section']['before_read_more_content'] ?></p>
                                <div class="collapse bg-transparent border-0" id="read_more">
                                    <div class="bg-transparent border-0 p-0">
                                        <p><?php echo $args['page_templates']['history_page']['seo_section']['after_read_more_content'] ?></p>
                                    </div>
                                    
                                </div>
                                <?php
                                 if(!empty($args['page_templates']['history_page']['seo_section']['after_read_more_content'])){
                                 echo do_shortcode('[bc-read-more id="read_more" background-color="" data-close-icon="icon-minus1" data-open-icon="icon-plus1"]'); } ?>
                                            
                            </div>