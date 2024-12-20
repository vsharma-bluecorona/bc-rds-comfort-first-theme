<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Discover_The_Difference_Widget extends \Elementor\Widget_Base {
    use FileVariations;


    public $variationIsset = false;
    public $allVariation;

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        wp_enqueue_script('jquery-ui-accordion');
        
        if (count($this->getFileVariations('discover-the-difference')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('discover-the-difference');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('discover-the-difference'))[0];
        }
    }


    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-discover-the-difference-widget';
    }

    public function get_title() {
        return 'Discover The Difference';
    }

    public function get_icon() {
        return 'eicon-custom';
    }

    protected function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $discoverItems = $args['globals']['discover_the_difference']['items'];
        $discover = $args['globals']['discover_the_difference'];
        $itemsArray = array();
        $i = 0;
        foreach ($discoverItems as $itesm) {
            $itemsArray[$i] = array(
                'item_icon' => __($itesm['icon'], 'rds-discover-the-difference-widget'),
                'item_title' => __($itesm['title'], 'rds-discover-the-difference-widget'),
                'item_description' => __($itesm['description'], 'rds-discover-the-difference-widget'),
                    // Set default values for each item property
            );
            $i++;
        }

        $this->start_controls_section(
                'discover_the_diffrence',
                array(
                    'label' => __('Discover The Difference', 'rds-discover-the-difference-widget'),
                )
        );
       
        $this->add_control(
                'heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $discover['heading'],
                )
        );
      
        // Subheading control
        $this->add_control(
                'subheading',
                array(
                    'label' => 'Subheading',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $discover['subheading'],
                )
        );
      
        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $discover['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
        }

        $this->add_control(
                'accordion_items',
                array(
                    'label' => __('Items', 'rds-discover-the-difference-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'item_icon',
                            'label' => __('Icon', 'rds-discover-the-difference-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-discover-the-difference-widget'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'item_title',
                            'label' => __('Title', 'rds-discover-the-difference-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-discover-the-difference-widget'),
                            'label_block' => true,

                        ),
                        array(
                            'name' => 'item_description',
                            'label' => __('Description', 'rds-discover-the-difference-widget'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => __("", 'rds-discover-the-difference-widget'),
                             
                            'label_block' => true,
                          
                        ),
                    // Add more fields for each item property (e.g., content)
                    ),
                    'default' => $itemsArray,
                    'icon_field' => '{{{ item_icon }}}', // Field to be used as the title in the editor
                    'title_field' => '{{{ item_title }}}',
                    'description_field' => '{{{ item_description }}}'
                )
        );
        $this->add_control(
                'button_link',
                array(
                    'label' => 'Button Link',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $discover['button_link'],
                    'placeholder' => $discover['button_link'],
                )
        );

        $this->add_control(
                'button_text',
                array(
                    'label' => 'Button Text',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $discover['button_text'],
                )
        );
        $this->end_controls_section();
    }

    public function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();
        $i = 0;
        if (!empty($settings) && is_array($settings)) {
            $button_link = isset($settings['button_link']) ? sanitize_text_field($settings['button_link']) : "";
           
            $items_Array = array();
            if (!empty($settings['accordion_items'])) {
                foreach ($settings['accordion_items'] as $item) {
                    $items_Array[$i]['icon'] = sanitize_text_field($item['item_icon']);
                    $items_Array[$i]['title'] = sanitize_text_field($item['item_title']);
                    $items_Array[$i]['description'] = sanitize_text_field($item['item_description']);
                    $i++;
                }
            }
            $variation = sanitize_text_field($settings['variation']);
            if($this->variationIsset){
                $args['globals']['discover_the_difference']['variation'] = sanitize_text_field($settings['variation']);
            }
            $args['globals']['discover_the_difference']['button_link'] = $button_link;
            $args['globals']['discover_the_difference']['items'] = $items_Array;
            $args['globals']['discover_the_difference']['heading'] = sanitize_text_field($settings['heading']);
            $args['globals']['discover_the_difference']['subheading'] = sanitize_text_field($settings['subheading']);
            
            $args['globals']['discover_the_difference']['button_text'] = sanitize_text_field($settings['button_text']);
            if(is_admin()){    
            //Update template spec file
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
            $result = $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
            }
            //Display content
            $call_back = "rds_variation_" . $variation . "_html";
            $widget_id = $this->get_id();
            $args['globals']['discover_the_difference']['widget_id'] = $widget_id;
                if ($this->variationIsset) {
                    get_template_part('global-templates/discover-the-difference/'.$args['globals']['discover_the_difference']['variation'], null, $args);
                }else{
                 get_template_part('global-templates/discover-the-difference/'.$this->singleVariation, null, $args);
                }
            }
           
    }

   }

