<?php

class RDS_Blog_Page_Widget extends \Elementor\Widget_Base {

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);

    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-blog-page-widget';
    }

    public function get_title() {
        return 'Blog Page Widget';
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    protected function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();
        if (!empty($settings) && is_array($settings)) {
            $args['globals']['blog']['variation'] = sanitize_text_field($settings['blog_variation']);
            if(is_admin()){    
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
            if (!empty($settings['blog_variation'])) {
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $posts_per_page = (get_option('posts_per_page')) ? get_option('posts_per_page') : 1;
                $cat_id = (isset($_GET['cat']) && is_numeric($_GET['cat'])) ? $_GET['cat'] : '';
            
                $post_query_args = array(
                    'post_type'      => 'post',
                    'posts_per_page' => $posts_per_page,
                    'paged'          => $paged,
                    'order'          => 'DESC',
                    'post_status'    => 'publish',
                );
            
                if (!empty($_GET['s'])) {
                    $post_query_args['s'] = sanitize_text_field($_GET['s']);
                }
            
                if (!empty($cat_id)) {
                    $post_query_args['cat'] = $cat_id;
                }
            
                query_posts($post_query_args);
                ?>
                <div class="container-fluid pt-lg-4 pb-lg-0 pb-4 my-2  px-lg-3 px-0 page_content">
                    <div class="container subpage_full_content pb-lg-5 mt-sn-100">
                        <div class="row pb-lg-4 ">
                            <div class="col-12">
                                <?php get_template_part('sidebar-templates/search', 'blogtopbar'); ?>
                                <div class="row ">
                                    <?php
                                    if (have_posts()) :
                                        while (have_posts()) : the_post();
                                            get_template_part('loop-templates/content', get_post_format(),$args);
                                        endwhile;
                                        // wp_reset_postdata();
                                    else :
                                        get_template_part('loop-templates/content', 'none');
                                    endif;

                                    ?>                 
                                </div>
                                <div class="d-flex align-items-center justify-content-center mt-4 mb-4 mb-lg-0 pt-3 blog-page-pagination">
                                    <?php
                                        // echo paginate_links(array(
                                        //     'total'     => $custom_query->max_num_pages,
                                        //     'prev_text' => '<i class="icon-angles-left4"></i>',
                                        //     'next_text' => '<i class="icon-angles-right4"></i>',
                                        // ));
                                    understrap_pagination(['prev_text' => '<i class="icon-angles-left4"></i>',
                                    'next_text' => '<i class="icon-angles-right4"></i>']);
                                    wp_reset_query();
                                    ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 

            }
        }
    }

    protected function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $blog = $args['globals']['blog'];
        $this->start_controls_section(
            'rds_blog_widget',
            array(
                'label' => __('Blog Page Widget', 'rds-blog-page-widget'),
            )
        );        
        $this->add_control(
            'blog_variation',
            array(
                'label' => 'Variation',
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => $blog['variation'],
                'options' => [
                    'a' => 'A',
                    'b' => 'B',
                ],
            )
        );
        $this->end_controls_section();
    }

}