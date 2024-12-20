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
class RDS_Career_Perk_Widget extends Widget_Base {
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
            if (count($this->getFileVariations('careers/perks')) > 1) {
                $this->variationIsset = true;
                $this->allVariation  = $this->getFileVariations('careers/perks');
            }else{
                $this->singleVariation = array_keys($this->getFileVariations('careers/perks'))[0];
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
    return 'rds-career-Perk-widget';
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
        return esc_html__('Career Perks Widget', 'rds-career-Perk-widget');
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
        $i = 0;
        $perkItems = $args['page_templates']['career_page']['perks']['items'];
        $perkArray = array();
        foreach ($perkItems as $itemp) {
            $perkArray[$i] = array(
                'item_heading' => __($itemp['heading'], 'rds-career-perk-widget'),
                'item_icon' => __($itemp['icon'], 'rds-career-perk-widget'),
                'item_description' => __($itemp['description'], 'rds-career-perk-widget'),
                              
            );
            $i++;
        } 
        
        
        $this->start_controls_section(
                'rds_career_perk_widget',
                [
                    'label' => esc_html__('Career Perk Widget 3', 'rds-career-perk-widget'),
                ]
        );
        
        if ($this->variationIsset) {
            $this->add_control(
                    'perk_variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->career['perks']['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
        }

        $this->add_control(
                'perk_items',
                array(
                    'label' => __('Perks Items', 'rds-career-perk-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'item_heading',
                            'label' => __('Heading', 'rds-career-perk-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-perk-widget'),
                            'label_block' => true,
                        ),
                         array(
                            'name' => 'item_icon',
                            'label' => __('Icon', 'rds-career-perk-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-perk-widget'),
                            'label_block' => true,
                        ),
                          array(
                            'name' => 'item_description',
                            'label' => __('Description', 'rds-career-perk-widget'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'default' => __("", 'rds-career-perk-widget'),
                            'label_block' => true,
                        ),
                    
                    ),
                    'default' =>
                    $perkArray,
                    'heading_field' => '{{{ item_heading }}}', 
                    'icon_field' => '{{{ item_icon }}}', 
                    'description_field' => '{{{ item_description }}}', 
                    
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
        $perkArray = array();
        $i = 0;
          if (!empty($settings['perk_items'])) {
        foreach ($settings['perk_items'] as $item2) {
             $perkArray[$i]['heading'] = sanitize_text_field($item2['item_heading']);
               $perkArray[$i]['icon'] = sanitize_text_field($item2['item_icon']);
                 $perkArray[$i]['description'] = sanitize_text_field($item2['item_description']);
            $i++;
        } 
    }
        
    if($this->variationIsset){
        $args['page_templates']['career_page']['perks']['variation'] = sanitize_text_field($settings['perk_variation']);
    }
       
        $args['page_templates']['career_page']['perks']['items'] = $perkArray;
        if(is_admin()){    
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        }
        ?>
    <?php
    if ($args['page_templates']['career_page']['perks']) {
        if ($this->variationIsset) {
            get_template_part('global-templates/careers/perks/'.$args['page_templates']['career_page']['perks']['variation'], null, $args);
        }else{
         get_template_part('global-templates/careers/perks/'.$this->singleVariation, null, $args);
        } 
    }
    }

}