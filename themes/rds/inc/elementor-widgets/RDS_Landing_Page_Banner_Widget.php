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
class RDS_Landing_Page_Banner_Widget extends Widget_Base {
    use FileVariations, AssetVariations;
    public $variationIsset = false;
    public $allVariation;
    public $assvariationIsset = false;
    public $allassVariation;
    public $singleVariation;

    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);

        $this->service_array = json_decode(get_option('rds_template'), TRUE);
        $services = $this->service_array['page_templates']['landing_page']['banner'];
        $this->service = $services;
        $this->variationIsset = false;

        // File variations
        $fileVariations = $this->getFileVariations('subpage-hero/landing-banner');
        if (count($fileVariations) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $fileVariations;
        } else {
            $this->singleVariation = array_keys($fileVariations)[0];
        }

        // Asset variations
        $basePath = get_template_directory();
        $subFolder = 'landing-page'; // Update to your asset subfolder

        $assetVariations = $this->getAssetVariations($basePath, $subFolder);
        if (count($assetVariations) > 1) {
            $this->assvariationIsset = true;
            $this->allassVariation  = $assetVariations;
        } else {
//             $this->singleVariation = array_keys($assetVariations)[0];
        }
    }

    /**
     * Get widget name.
     *
     * Retrieve landing page banner widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'rds-global-landing-page-banner-widget';
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

    private $service_array = "";
    private $service = "";

    /**
     * Get widget title.
     *
     * Retrieve service subpage banner widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return esc_html__('Landing Page Banner Widget', 'rds-global-landing-page-banner-widget');
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
     * Retrieve service subapge banner widget icon.
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
        return ['landing page', 'tabs', 'toggle'];
    }
    /**
     * Register subpage widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 3.1.0
     * @access protected
     */


     public function get_gravity_forms_list() {
        global $wpdb;
    
        $forms_table = $wpdb->prefix . 'gf_form';
    
        $forms = $wpdb->get_results("SELECT * FROM $forms_table");
    
        $form_list = array();
    
        foreach ($forms as $form) {
            $form_list["$form->id"] = $form->title;
        }
    
        return $form_list;
    }
    


    protected function register_controls() {

        $this->start_controls_section(
                'rds_global_landing_page_banner_widget',
                [
                    'label' => esc_html__('Landing Page Banner Widget', 'rds-global-landing-page-banner-widget'),
                ]
        );

        if ($this->variationIsset) {
            $this->add_control(
                'variation',
                array(
                    'label' => 'Variation',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => $this->service['variation'],
                    'options' => $this->allVariation,
                )
            );
        }
    
        // Add control for asset variations
        if($this->assvariationIsset){
            $this->add_control(
                'asset_variation',
                array(
                    'label' => 'Asset Variation',
                    'type' => \Elementor\Controls_Manager::SELECT,
                    // 'default' => $this->allassVariation[0], 
                    'options' => $this->allassVariation,
                )
            );
        }

        $this->add_control(
            'heading',
            array(
                'label' => 'Heading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->service['heading'],
                
            )
        );

        $this->add_control(
            'subheading',
            array(
                'label' => 'SubHeading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->service['subheading'],
               
            )
        );

         $this->add_control(
            'content',
            array(
                'label' => 'Content',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->service['content'],
                
            )
        );

        $this->add_control(
            'button_text',
            array(
                'label' => 'Button Text',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->service['button_text'],
               
            )
        );
        $this->add_control(
            'button_link',
            array(
                'label' => 'Button Link',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->service['button_link'],
               
            )
        );

          // Gravity Forms list start
          $Form_list = $this->get_gravity_forms_list();
          $this->add_control(
                  'gravity_form_id',
                  array(
                      'label' => 'Gravity Forms',
                      'type' => \Elementor\Controls_Manager::SELECT,
                      'options' => $Form_list,
                      'default' => $this->service['gravity_form_id'],
                  )
          );
          // Gravity Forms list end
          $this->add_control(
            'form_heading',
            array(
                'label' => 'Heading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->service['form_heading'],
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
        $args = $this->service_array;
        if($this->variationIsset){
            $args['page_templates']['landing_page']['banner']['variation'] = sanitize_text_field($settings['variation']);
        }
        $args['page_templates']['landing_page']['banner']['heading'] = sanitize_text_field($settings['heading']);
        $args['page_templates']['landing_page']['banner']['subheading'] = sanitize_text_field($settings['subheading']);
        $args['page_templates']['landing_page']['banner']['button_text'] = sanitize_text_field($settings['button_text']);
        $args['page_templates']['landing_page']['banner']['button_link'] = sanitize_text_field($settings['button_link']);

        $args['page_templates']['landing_page']['banner']['content'] = sanitize_text_field($settings['content']);
        $args['page_templates']['landing_page']['banner']['gravity_form_id'] = sanitize_text_field($settings['gravity_form_id']);
        $args['page_templates']['landing_page']['banner']['form_heading'] = sanitize_text_field($settings['form_heading']);
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        $args['asset_variation'] = $settings['asset_variation'];
        $args['asset_variation_isset'] = $this->assvariationIsset;
        
        if ($this->variationIsset || ($this->assvariationIsset && !empty($settings['asset_variation']))) {
            get_template_part('global-templates/subpage-hero/landing-banner/'.$args['page_templates']['landing_page']['banner']['variation'], null, $args);
            }else{
             get_template_part('global-templates/subpage-hero/landing-banner/'.$this->$singleVariation, null, $args);
        }
    }
}
