<?php
//namespace Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
/**
 * Elementor accordion widget.
 *
 * Elementor widget that displays a collapsible display of content in an
 * request service style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Service_Subpagesidebar_Services_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->service_subpagesidebarservice_array = json_decode(get_option('rds_template'), TRUE);
        $service_subpagesidebarservices = $this->service_subpagesidebarservice_array['page_templates']['service_subpage']['services'];
        $this->service_subpagesidebarservice = $service_subpagesidebarservices;
        $this->variationIsset = false;
            if (count($this->getFileVariations('services/sidebar')) > 1) {
                $this->variationIsset = true;
                $this->allVariation  = $this->getFileVariations('services/sidebar');
            }else{
                $this->singleVariation = array_keys($this->getFileVariations('services/sidebar'))[0];
            }
    }

    /**
     * Get widget name.
     *
     * Retrieve service subpagesidebar request widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-service-subpagesidebar-service-widget';
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

    private $service_subpagesidebarservice_array = "";
    private $service_subpagesidebarservice = "";

    /**
     * Get widget title.
     *
     * Retrieve service subpagesidebar request  widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Service Subpagesidebar Service Widget', 'rds-global-service-subpagesidebar-service-widget');
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
        return ['rds-global-widgets'];
    }

    /**
     * Get widget icon.
     *
     * Retrieve service subpagesidebar service  widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-tabs';
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
        return ['service subpagesidebar service', 'tabs', 'toggle'];
    }

    
    /**
     * Register service subpagesidebarrequest widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
        $this->start_controls_section(
                'rds_global_service_subpagesidebar_request_widget',
                [
                    'label' => esc_html__('Global Service Block Service Subpage Sidebar', 'rds-global-service-subpagesidebar-service-widget'),
                ]
        );
  
        if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->service_subpagesidebarservice['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
        }
      
        $this->add_control(
                'title',
                array(
                    'label' => 'Title',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $this->service_subpagesidebarservice['title'],
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
        $settings = $this->get_settings();
        $args = $this->service_subpagesidebarservice_array;
        if($this->variationIsset){
            $args['globals']['services']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['service_subpage']['services']['title'] = sanitize_text_field($settings['title']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));

        if (wp_is_mobile()) {
            echo do_shortcode('[elementor-template id="40479"]');
        }
                
        if ($this->variationIsset) {
            get_template_part('global-templates/services/sidebar/'.$args['globals']['services']['variation'], null, $args);
        }else{
         get_template_part('global-templates/services/sidebar/'.$this->singleVariation, null, $args);
        }         
    }
}
