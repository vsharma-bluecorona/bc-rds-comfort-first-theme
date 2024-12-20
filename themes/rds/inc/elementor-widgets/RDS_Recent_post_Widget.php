<?php
class RDS_Recent_post_Widget extends \Elementor\Widget_Base {

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-single-page-widget';
    }

    public function get_title() {
        return 'Recent Post Page Widget';
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    protected function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();

        if (!empty($settings) && is_array($settings)) {
            if(is_admin()){    
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $get_rds_template_data_array = rds_template();
            $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
        ?>
       
            <?php
            $Ids = null;
            $args = array('post_type' => 'post', 'posts_per_page' => 3, 'order' => 'DESC', 'post_status' => 'publish');
            if (isset($atts['id'])) {
                $Ids = explode(',', $atts['id']);
                $postIds = $Ids;
                $args['post__in'] = $postIds;
            }
            ?>
            <div class="color_quaternary_bg order-lg-2 order-2 py-lg-5 py-2 recent_post">
                <div class="container">
                    <div class="pt-lg-2 pt-4">
                        <div class="row">
                            <div class="col-lg-12"><h4 class="mb-4 mb-lg-0 pb-lg-2">Recent Posts</h4></div>
                            <?php
                            $query = new WP_Query($args);
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                            ?>
                                    <div class="col-lg-4 col-md-4 mb-4 pb-2 pt-4">
                                        <div class="border-0 rounded-0 p-0 position-relative blogs h-100">
                                            <a name="Keep reading blog" href="<?php echo get_permalink(); ?>" class="no_hover_underline no-underline">
                                                <div class="blog_img_container mb-4"> <img class="blog_img  img-fluid" alt="blog-thumbnail" width="350" height="200" src="<?php echo post_content_first_image(); ?>" > </div>
                                                <div class="card-body px-0 py-0">
                                                    <h5 class="pb-4 mb-4 border-bottom-2"> 
                                                        <?php echo get_the_title(); ?>
                                                    </h5>                                   
                                                </div>
                                                <span class="no_hover_underline a w-100 d-inline-flex align-items-center text_semibold  text-uppercase text_semibold_hover text_18 line_height_23 font_alt_1 mb-3 position-absolute continue text-uppercase" style="bottom: -40px"> 
                                                    Keep Reading 
                                                    <i class=" bc_text_18 bc_line_height_18 icon-chevron-right2 ms-1 position-relative "></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                            <?php
                                endwhile;
                                wp_reset_query();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
       
    <?php
        }
    }

    protected function _register_controls() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $this->start_controls_section(
            'rds_single_blog_widget',
            array(
                'label' => __('Recent Post Blog Page Widget', 'rds-single-page-widget'),
            )
        );        
      
        $this->end_controls_section();
    }
}
?>
