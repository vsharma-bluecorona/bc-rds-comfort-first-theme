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
class RDS_Career_Gallery_Widget extends Widget_Base {
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

        if (count($this->getFileVariations('careers/gallery')) > 1) {
            $this->variationIsset = true;
            $this->allVariation = $this->getFileVariations('careers/gallery');
        } else {
            $this->singleVariation = array_keys($this->getFileVariations('careers/gallery'))[0];
        }
    }

/**
* Get widget name.
*
* Retrieve About Meet The Content widget name.
*
* @since 1.0.0
* @access public
*
* @return string Widget name.
*/
public function get_name() {
    return 'rds-global-career-gallery-widget';
}

private $career_array = "";
private $career = "";

/**
* Get widget title.
*
* Retrieve About Meet The Content widget title.
*
* @since 1.0.0
* @access public
*
* @return string Widget title.
*/
public function get_title() {
    return esc_html__('Career Gallery Widget', 'rds-global-career-gallery-widget');
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
* Retrieve aboutmeet  widget icon.
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
    return ['career gallery widget ', 'tabs', 'toggle'];
}

protected function _register_controls() {
    $args = array();if(is_admin()){$args = json_decode(get_option('rds_template'), TRUE);}
    $this->start_controls_section(
        'rds_career_job_widget',
        [
            'label' => esc_html__('Career Gallery Widget', 'rds-career-gallery-widget'),
        ]
);


    if ($this->variationIsset) {
        $this->add_control(
                 'variation',
                 array(
                     'label' => 'Variation',
                     'type' => \Elementor\Controls_Manager::SELECT,
                    //  'default' => $this->teams['variation'],
                     'default' => isset($this->career['variation']) ? $this->career['variation'] : 'a',
                     'options' =>  $this->allVariation,
                 )
         ); 
    }

}

/**
* Render About Meet The Content widget output on the frontend.
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
        $args['page_templates']['career_page']['career_gallery']['variation'] = sanitize_text_field($settings['variation']);
    }
    if(is_admin()){    
    global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
    }
    ?>
        <div class="container-fluid">
        <div class="container">
            <?php
            if ($this->variationIsset) {
                get_template_part('global-templates/careers/gallery/' . $args['page_templates']['career_page']['career_gallery']['variation'], null, $args);
            } else {
                get_template_part('global-templates/careers/gallery/' . $this->singleVariation, null, $args);
            }
                // get_template_part('global-templates/careers/gallery/a');
            ?>
        </div>
    </div>
    <?php 
    }
}