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
    class RDS_Career_Seo_Widget extends Widget_Base {
        use FileVariations;
        public $variationIsset = false;
        public $allVariation;
        public $singleVariation;
        public function __construct($data = array(), $args = null) {
            parent::__construct($data, $args);
            $this->careerseo_array = json_decode(get_option('rds_template'), TRUE);
            $careerseos = $this->careerseo_array['page_templates']['career_page']['faq'];
            $this->careerseo = $careerseos;
             $this->variationIsset = false;
         if (count($this->getFileVariations('careers/seo')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('careers/seo');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('careers/seo'))[0];
         }
        }

    /**
    * Get widget name.
    *
    * Retrieve About Middle content widget name.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget name.
    */
    public function get_name() {
        return 'rds-global-career-seo-widget';
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

    private $careerseo_array = "";
    private $careerseo = "";

    /**
    * Get widget title.
    *
    * Retrieve About Middle content widget title.
    *
    * @since 1.0.0
    * @access public
    *
    * @return string Widget title.
    */
    public function get_title() {
        return esc_html__('Career FAQ Widget', 'rds-global-career-seo-widget');
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
    * Retrieve careerseo  widget icon.
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
        return ['career faq widget ', 'tabs', 'toggle'];
    }


    /**
    * Register About Middle content widget controls.
    *
    * Adds different input fields to allow the user to change and customize the widget settings.
    *
    * @since 3.1.0
    * @access protected
    */
    protected function register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $accordionItems = $args['page_templates']['career_page']['faq']['data'];
        $itemsArray = array();
        $i = 0;
        foreach ($accordionItems as $item) {
            $itemsArray[$i] = array(
                'question' => __($item['question'], 'rds-career-seo-widget'),
                'content' => __($item['content'], 'rds-career-seo-widget')
            );
            $i++;
        }

        $this->start_controls_section(
            'rds_global_careerseo_widget',
            [
                'label' => esc_html__('Career FAQ Widget', 'rds-global-career-seo-widget'),
            ]
        );

           if ($this->variationIsset) {
            // $variationKey = array_keys($allVariations)[0];
           $this->add_control(
                    'variation',
                    array(
                        'label' => 'Variation',
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => $this->careerseo['variation'],
                        'options' =>  $this->allVariation,
                    )
            ); 
        }
        $this->add_control(
            'heading',
            array(
                'label' => 'Heading',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => $this->careerseo['heading'],

            )
        );

        $this->add_control(
                'accordion_data',
                array(
                    'label' => __('Items', 'rds-career-seo-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'question',
                            'label' => __('Question', 'rds-career-seo-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-career-seo-widget'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'content',
                            'label' => __('Content', 'rds-career-seo-widget'),
                            'type' => \Elementor\Controls_Manager::WYSIWYG,
                            'default' => __("", 'rds-career-seo-widget'),
                            'label_block' => true,

                        ),
                    ),
                    'default' => $itemsArray,
                    'question_field' => '{{{ question }}}', 
                    'content_field' => '{{{ content }}}'
                )
        );

        $this->end_controls_section();

    }

    /**
    * Render About Middle Content widget output on the frontend.
    *
    * Written in PHP and used to generate the final HTML.
    *
    * @since 1.0.0
    * @access protected
    */
    protected function render() {
        $settings = $this->get_settings();
        $args = $this->careerseo_array;
         if($this->variationIsset){
          $args['page_templates']['career_page']['variation'] = sanitize_text_field($settings['variation']);
        }
          $i = 0;
        if (!empty($settings) && is_array($settings)) {     
            $items_Array = array();
            if (!empty($settings['accordion_data'])) {
                foreach ($settings['accordion_data'] as $item) {
                    $items_Array[$i]['question'] = sanitize_text_field($item['question']);
                    $items_Array[$i]['content'] = $item['content'];
                    $i++;
                }
            }
        $args['page_templates']['career_page']['faq']['data'] = $items_Array;

        $args['page_templates']['career_page']['faq']['heading'] = sanitize_text_field($settings['heading']);
        if(is_admin()){    
        global $wpdb;
        $tableName = $wpdb->prefix . 'options';
        $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));
        }

               if ($this->variationIsset) {
                get_template_part('global-templates/careers/seo/'.$args['page_templates']['career_page']['variation'], null, $args);
            }else{
             get_template_part('global-templates/careers/seo/'.$this->singleVariation, null, $args);
            }
         if (!is_admin() && !defined('DOING_AJAX')) {
        }else{ ?>
            <script>
        jQuery(document).ready(function () {
            jQuery('.accordion').on('show.bs.collapse', function (e) {
                toggleIcon(e.target);
            });
            jQuery('.accordion').on('hidden.bs.collapse', function (e) {
                toggleIcon(e.target);
            });
        });
        function toggleIcon(target) {
            var target = jQuery(target).parent('.accordion-item').find('i');
            target.toggleClass('icon-chevron-up4');
            target.toggleClass('icon-chevron-down4');
        }
    </script>
       <?php  }?>
        
            <?php
    }
    }
}