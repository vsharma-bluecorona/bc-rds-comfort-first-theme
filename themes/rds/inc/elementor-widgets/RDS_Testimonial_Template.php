<?php
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Testimonial_Template extends \Elementor\Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->variationIsset = false;
            if (count($this->getFileVariations('testimonial/testimonial-template')) > 1) {
                $this->variationIsset = true;
                $this->allVariation  = $this->getFileVariations('testimonial/testimonial-template');
            }else{
                $this->singleVariation = array_keys($this->getFileVariations('testimonial/testimonial-template'))[0];
            }
        
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-testimonial-template-widget';
    }

    public function get_title() {
        return 'Testimonial Template Widget';
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }
   
    protected function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $testimonials = $args['page_templates']['testimonial_page'];
        $promotionCategory = array(
            'taxonomy' => 'bc_testimonial_category',
            'orderby' => 'name',
            'order'   => 'ASC'
        );
        
        $categoryNames = get_categories($promotionCategory);

        // $catName = [];
        $catName = array(
            'all' => esc_html__('all', 'rds-testimonial-widget') // Static 'All' field
        );
        foreach ($categoryNames as $value) {
            $catName[$value->name] =  $value->name;
        }

        if (!empty($categoryNames) && !is_wp_error($categoryNames)) {
            foreach ($categoryNames as $category) {
                $catName[$category->name] = esc_html__($category->name, 'rds-testimonial-widget');
            }
        }

        $this->start_controls_section(
            'rds_testimonials',
            array(
                'label' => __('Testimonial Widget', 'rds-testimonial-template-widget'),
            )
        );
    if ($this->variationIsset) {
        $this->add_control(
                 'testimonial_variation',
                 array(
                     'label' => 'Variation',
                     'type' => \Elementor\Controls_Manager::SELECT,
                     'default' => $testimonials['variation'],
                     'options' =>  $this->allVariation,
                 )
         ); 
    }

    $this->add_control(
        'category_filter',
        [
            'label' => esc_html__( 'Select Category', 'rds-promotions-widget' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'label_block' => true,
            'multiple' => true,
            'options' =>  $catName,
            'default' => $testimonials['category_filter'],
        ]
    );

        $this->add_control(
            'testimonial_subheading',
            array(
                'label' => 'Sub Heading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $testimonials['subheading'],
                )
    );
      
        // Gravity Forms list end
        $this->end_controls_section();
    }
    protected function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();
        $widget_id = $this->get_id();
        $selected_category = $settings['category_filter'];
        $args['category_taxonomy'] = $selected_category;
            if($this->variationIsset){
                $args['page_templates']['testimonial_page']['variation'] = sanitize_text_field($settings['testimonial_variation']);
            }

            $args['page_templates']['testimonial_page']['subheading'] = sanitize_text_field($settings['testimonial_subheading']);
            $args['page_templates']['testimonial_page']['category_filter'] = $settings['category_filter'];
            if(is_admin()){    
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
            // Display content
            $call_back = "rds_variation_testimonial_template_html";
            // echo '<pre>';
            // print_r($args);
            // echo '</pre>';
                $this->$call_back($args);            
    }

    public function rds_variation_testimonial_template_html($args) {
        if ($this->variationIsset) {
            get_template_part('global-templates/testimonial/testimonial-template/'.$args['page_templates']['testimonial_page']['variation'], null, $args);
        }else{
            get_template_part('global-templates/testimonial/testimonial-template/'.$this->singleVariation, null, $args);
        }
    }
}