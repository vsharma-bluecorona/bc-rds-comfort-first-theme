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
 * Team style, showing only one item at a time.
 *
 * @since 1.0.0
 */
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Gallery_Widget extends Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->gallery_array = json_decode(get_option('rds_template'), TRUE);
        $gallery = $this->gallery_array['page_templates']['gallery_page'];
        $this->gallery = $gallery;
        $this->variationIsset = false;

         if (count($this->getFileVariations('gallery')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('gallery');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('gallery'))[0];
         }
    }


    /**
     * Get widget name.
     *
     * Retrieve request widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-template-gallery-widget';
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

    private $gallery_array = "";
    private $gallery = "";

    /**
     * Get widget title.
     *
     * Retrieve gallery widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Gallery Template', 'rds-template-gallery-widget');
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
     * Retrieve gallery widget icon.
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
        return ['Gallery', 'tabs', 'toggle'];
    }

    /**
     * Register gallery template  widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */
    protected function register_controls() {
         $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $this->start_controls_section(
                'rds_gallery_widget',
                [
                    'label' => esc_html__('Gallery Template Widget', 'rds-gallery-widget'),
                ]
        );

         if ($this->variationIsset) {
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->gallery['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
         }

        $this->add_control(
            'content',
            array(
                'label' => 'Content',
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => $this->gallery['content'],

            )
    );

        $this->end_controls_section();
    }

    /**
     * Render gallery widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render() {
        $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
        $settings = $this->get_settings();
        if($this->variationIsset){
            $args['page_templates']['gallery_page']['variation'] = sanitize_text_field($settings['variation']);
          }

        $args['page_templates']['gallery_page']['content'] = $settings['content'];
        if(is_admin()){    
        //Update template spec file
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        }

            if ($this->variationIsset) {
                get_template_part('global-templates/gallery/'.$args['page_templates']['gallery_page']['variation'], null, $args);
            }else{
             get_template_part('global-templates/gallery/'.$this->singleVariation, null, $args);


        }
    }
}