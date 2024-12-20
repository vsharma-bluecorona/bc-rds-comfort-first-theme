<?php
require_once (get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Testimonial_Widget extends \Elementor\Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->variationIsset = false;
        if (count($this->getFileVariations('testimonial/sliders')) > 1) {
            $this->variationIsset = true;
            $this->allVariation = $this->getFileVariations('testimonial/sliders');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('testimonial/sliders')) [0];
        }
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-testimonial-widget';
    }

    public function get_title() {
        return 'Testimonial';
    }

    public function get_icon() {
        return 'eicon-testimonial-carousel';
    }

    protected function render() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $settings = $this->get_settings();
        $widget_id = $this->get_id();
        $selected_category = $settings['category_filter'];
        $args['category_taxonomy'] = $selected_category;
        if (!empty($settings) && is_array($settings)) {
            if ($this->variationIsset) {
            $args['globals']['testimonial']['variation'] = sanitize_text_field($settings['testimonial_variation']);
            }
            $button_link = isset($settings['testimonial_button_link']) ? sanitize_text_field($settings['testimonial_button_link']) : "";
            $args['globals']['testimonial']['button_link'] = $button_link;
            $args['globals']['testimonial']['heading'] = sanitize_text_field($settings['testimonial_heading']);
            $args['globals']['testimonial']['subheading'] = sanitize_text_field($settings['testimonial_subheading']);
            $args['globals']['testimonial']['button_text'] = sanitize_text_field($settings['testimonial_button_text']);
            $args['globals']['testimonial']['category_filter'] = $settings['category_filter'];
            
            $variation = sanitize_text_field($settings['testimonial_variation']);
            //Update template spec file
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            //Display content
            $call_back = "rds_variation_" . $variation . "_html";
                if ($this->variationIsset) {
                get_template_part('global-templates/testimonial/sliders/' . $args['globals']['testimonial']['variation'], null, $args);
                } else {
                    get_template_part('global-templates/testimonial/sliders/' . $this->singleVariation, null, $args);
                }
        }
    }

    protected function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $Testimonial = $args['globals']['testimonial'];
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
                'rds_testimonial',
                array(
                    'label' => __('Testimonial', 'rds-testimonial-widget'),
                )
        );
        
        if ($this->variationIsset) {
          $this->add_control(
                'testimonial_variation',
                array(
                    'label' => 'Variation',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => $Testimonial['variation'],
                    'options' => $this->allVariation,
                )
        );
      }
    //   print_r($Testimonial);
      $this->add_control(
        'category_filter',
        [
            'label' => esc_html__( 'Select Category', 'rds-promotions-widget' ),
            'type' => \Elementor\Controls_Manager::SELECT2,
            'label_block' => true,
            'multiple' => true,
            'options' =>  $catName,
            'default' => $Testimonial['category_filter'],
        ]
    );
        $this->add_control(
                'testimonial_heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $Testimonial['heading'],
                    'condition' => [
                        'testimonial_variation' => array("b", "c"),
                    ]
                )
        );

        // Subheading control
        $this->add_control(
                'testimonial_subheading',
                array(
                    'label' => 'Subheading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $Testimonial['subheading'],
                )
        );

        // Subheading control
        $this->add_control(
                'testimonial_button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'placeholder' => $Testimonial['button_link'],
                    'show_external' => true,
                    'default' => $Testimonial['button_link'],
                )
        );

        $this->add_control(
                'testimonial_button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $Testimonial['button_text'],
                )
        );
        $this->end_controls_section();
    }

}