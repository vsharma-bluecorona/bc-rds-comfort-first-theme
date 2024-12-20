<?php
//namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Text_Shadow;
//use Elementor\Utils;
use Elementor\Icons_Manager;
use Elementor\Utils;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Stroke;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;

/**
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * request service style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Career_Employee_Of_The_Month_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->career_array = json_decode(get_option('rds_template'), TRUE);
        $careers = $this->career_array['page_templates']['career_page'];
        $this->career = $careers;
        $this->variationIsset = false;

        if (count($this->getFileVariations('careers/employee-Of-the-month')) > 1) {
            $this->variationIsset = true;
            $this->allVariation = $this->getFileVariations('careers/employee-Of-the-month');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('careers/employee-Of-the-month'))[0];
        }
    }
    /**
     * Get widget name.
     *
     * Retrieve career widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-career-employee-of-the-month-widget';
    }

    /* Get RDS Spec File.
     *
     * Retrieve rds spec file from wp options.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    private $career_array = "";
    private $career = "";

    /**
     * Get widget title.
     *
     * Retrieve career widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Career Employee Of The Month Widget', 'rds-career-employee-of-the-month-widget');
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the category the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget category.
     */
    public function get_categories() {
        return ['rds-template-widgets'];
    }

    /**
     * Get widget icon.
     *
     * Retrieve career  widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-site-identity';
    }

    /**
     * Get widget keywords.
     *
     * Retrieve the list of keywords the widget belongs to.
     *
     * @since 2.1.0
     * @access public
     *
     * @return array Widget keywords.
     */
    public function get_keywords() {
        return ['career', 'tabs', 'toggle'];
    }

    /**
     * Register history template  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {   
        $args = json_decode(get_option('rds_template'), TRUE);
        $k = 0;
        $employeItems = $args['page_templates']['career_page']['employee_Of_the_month']['items'];
        $employeArray = array();
        foreach ($employeItems as $iteme) {
            $employeArray[$k] = array(
                'item_name' => __($iteme['name'], 'rds-career-employee-of-the-month-widget'),
                'item_month' => __($iteme['month'], 'rds-career-employee-of-the-month-widget'),
                'item_position' => __($iteme['position'], 'rds-career-employee-of-the-month-widget'),
                'item_location' => __($iteme['location'], 'rds-career-employee-of-the-month-widget'),
                'item_state' => __($iteme['state'], 'rds-career-employee-of-the-month-widget'),
                'item_description' => __($iteme['description'], 'rds-career-employee-of-the-month-widget'),
                'item_instagram_link' => __($iteme['instagram_link'], 'rds-career-employee-of-the-month-widget'),
                'item_facebook_link' => __($iteme['facebook_link'], 'rds-career-employee-of-the-month-widget'),            
            );
            $k++;
        }
        
        $this->start_controls_section(
                'rds_career_employe_widget',
                [
                    'label' => esc_html__('Career Employee Of The Month Widget 4', 'rds-career-employee-of-the-month-widget'),
                ]
        );
        
         
        if ($this->variationIsset) {
            $this->add_control(
                     'employe_variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => isset($this->career['employee_Of_the_month']['variation']) ? $this->career['employee_Of_the_month']['variation'] : 'a',
                         'options' =>  $this->allVariation,
                     )
             ); 
        }
          $this->add_control(
                'employe_heading',
                array(
                    'label' => 'Heading',
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => $this->career['employee_Of_the_month']['heading'],
                  
                )
        );

        $this->add_control(
                'employe_items',
                array(
                    'label' => __('Employes Items', 'rds-career-employee-of-the-month-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'item_name',
                            'label' => __('Name', 'rds-career-employee-of-the-month-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employee-of-the-month-widget'),
                            'label_block' => true,
                        ),
                         array(
                            'name' => 'item_month',
                            'label' => __('Month', 'rds-career-employee-of-the-month-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employee-of-the-month-widget'),

                        ),
                          array(
                            'name' => 'item_position',
                            'label' => __('Position', 'rds-career-employee-of-the-month-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employee-of-the-month-widget'),
  
                        ),
                        array(
                            'name' => 'item_location',
                            'label' => __('Location', 'rds-career-employee-of-the-month-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employee-of-the-month-widget'),
         
                        ),
                          array(
                            'name' => 'item_state',
                            'label' => __('State', 'rds-career-employee-of-the-month-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employee-of-the-month-widget'),
              
                        ),
                         array(
                            'name' => 'item_description',
                            'label' => __('Description', 'rds-career-employee-of-the-month-widget'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => __("", 'rds-career-employee-of-the-month-widget'),
                            'label_block' => true,
                        ),
                         array(
                            'name' => 'item_instagram_link',
                            'label' => __('Instagram Link', 'rds-career-employee-of-the-month-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employee-of-the-month-widget'),
                            'label_block' => true,
                        ),
                          array(
                            'name' => 'item_facebook_link',
                            'label' => __('Facebook Link', 'rds-career-employee-of-the-month-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-employee-of-the-month-widget'),
                            'label_block' => true,
                        ),
                    
                    ),
                    'default' =>
                    $employeArray,
                    'name_field' => '{{{ item_name }}}', 
                    'icon_month' => '{{{ item_month }}}', 
                    'position_field' => '{{{ item_position }}}',
                    'icon_location' => '{{{ item_location }}}', 
                    'position_state' => '{{{ item_state }}}', 
                    'description_field' => '{{{ item_description }}}', 
                    'instagram_link_field' => '{{{ item_instagram_link }}}', 
                    'facebook_link_field' => '{{{ item_facebook_link }}}', 
                    
                )
        );


        
        $this->end_controls_section();
    }


    /**
     * Render request widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();
        $employeArray = array();
        $k = 0;
        if (!empty($settings['employe_items'])) {
            foreach ($settings['employe_items'] as $item3) {
                $employeArray[$k]['name'] = sanitize_text_field($item3['item_name']);
                $employeArray[$k]['month'] = sanitize_text_field($item3['item_month']);
                $employeArray[$k]['position'] = sanitize_text_field($item3['item_position']);
                $employeArray[$k]['location'] = sanitize_text_field($item3['item_location']);
                $employeArray[$k]['state'] = sanitize_text_field($item3['item_state']);
                $employeArray[$k]['description'] = sanitize_text_field($item3['item_description']);
                $employeArray[$k]['instagram_link'] = sanitize_text_field($item3['item_instagram_link']);
                $employeArray[$k]['facebook_link'] = sanitize_text_field($item3['item_facebook_link']);
                $k++;
            } 
        }
        if($this->variationIsset){
            $args['page_templates']['career_page']['employee_Of_the_month']['variation'] = sanitize_text_field($settings['employe_variation']);
        }
         $args['page_templates']['career_page']['employee_Of_the_month']['heading'] = sanitize_text_field($settings['employe_heading']);
        $args['page_templates']['career_page']['employee_Of_the_month']['items'] = $employeArray;
        if(is_admin()){    
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        }
       
                if ($this->variationIsset) {
                    get_template_part('global-templates/careers/employee-Of-the-month/'.$args['page_templates']['career_page']['employee_Of_the_month']['variation'], null, $args);
                }else{
                 get_template_part('global-templates/careers/employee-Of-the-month/'.$this->singleVariation, null, $args);
              
             
        }
    }
}