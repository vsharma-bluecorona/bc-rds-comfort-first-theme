<?php
require_once(get_template_directory() . '/inc/custom-widget-function.php');
class RDS_Services_Widget extends \Elementor\Widget_Base {
    use FileVariations;
    public $variationIsset = false;
    public $allVariation;
    public $singleVariation;
    public function __construct($data = array(), $args = null) {
        parent::__construct($data, $args);
        $this->variationIsset = false;
         if (count($this->getFileVariations('services')) > 1) {
            $this->variationIsset = true;
            $this->allVariation  = $this->getFileVariations('services');
         }else{
            $this->singleVariation = array_keys($this->getFileVariations('services'))[0];
         }
    }

    public function get_categories() {
        return ['rds-global-widgets'];
    }

    public function get_name() {
        return 'rds-services-widget';
    }

    public function get_title() {
        return 'RDS Services';
    }

    public function get_icon() {
        return 'eicon-nested-carousel';
    }
    public function _register_controls() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $servicesItems = $args['globals']['services']['items'];
        $itemsArray = array();
        $i = 0;
        foreach ($servicesItems as $itesm) {
            $itemsArray[$i] = array(
                'item_icon' => __($itesm['icon'], 'rds-services-widget'),
                'item_title' => __($itesm['title'], 'rds-services-widget'),
                'item_link' => __($itesm['link'], 'rds-services-widget'),
                'item_description' => __(isset($itesm['description'])?$itesm['description']:"", 'rds-services-widget'),
            );
            $i++;
        }
        $services = $args['globals']['services'];
        $this->start_controls_section(
                'services_section',
                array(
                    'label' => __('Services', 'rds-services-widget'),
                )
        );
        
        if ($this->variationIsset) {

            print_r($args['globals']['services']);
            $this->add_control(
                     'variation',
                     array(
                         'label' => 'Variation',
                         'type' => \Elementor\Controls_Manager::SELECT,
                         'default' => $this->services['variation'],
                         'options' =>  $this->allVariation,
                     )
             ); 
         }
      
        $this->add_control(
                'top_border_class',
                array(
                    'label' => 'Top Border Class',
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => $services['top_border_class'],
                )
        );
        $this->add_control(
                'services_accordion_items',
                array(
                    'label' => __('Services Items', 'rds-services-widget'),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => array(
                        array(
                            'name' => 'item_icon',
                            'label' => __('Icon', 'rds-services-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-services-widget'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'item_title',
                            'label' => __('Title', 'rds-services-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-services-widget'),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'item_link',
                            'label' => __('Link', 'rds-services-widget'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => __("", 'rds-services-widget'),
                            'label_block' => true,
                        ),
                    ),
                    'default' =>
                    $itemsArray,
                    'icon_field' => '{{{ item_icon }}}', 
                    'title_field' => '{{{ item_title }}}',
                    'link_field' => '{{{ item_link }}}',
                    
                )
        );

        $this->end_controls_section();
    }
    public function render() {
        $args = json_decode(get_option('rds_template'), TRUE);
        $settings = $this->get_settings();
        $serviceArray = array();
        $i = 0;
        $widget_id = $this->get_id();
        if($this->variationIsset){
            $args['globals']['services']['variation'] = sanitize_text_field($settings['variation']);
          }
        if (!empty($settings['services_accordion_items'])) {
            foreach ($settings['services_accordion_items'] as $item) {
                $serviceArray[$i]['icon'] = sanitize_text_field($item['item_icon']);
                $serviceArray[$i]['link'] = sanitize_text_field($item['item_link']);
                $serviceArray[$i]['title'] = sanitize_text_field($item['item_title']);
                $serviceArray[$i]['description'] = sanitize_text_field($item['item_description']);
                $i++;
            }
            $args['globals']['services']['items'] = $serviceArray;
            $args['globals']['services']['top_border_class'] = sanitize_text_field($settings['top_border_class']);
            if(is_admin()){    
            //Update template spec file
            global $wpdb;
            $tableName = $wpdb->prefix . 'options';
            $json = str_replace("\/", "/", json_encode($args, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
             $wpdb->update($tableName, array('option_value' => $json), array('option_name' => 'rds_template'));   
            } 
            $args['globals']['services']['widget_id'] = $widget_id;
                if ($this->variationIsset) {
                    get_template_part('global-templates/services/' . $args['globals']['services']['variation'], null, $args);
                } else {
                    get_template_part('global-templates/services/' . $this->singleVariation, null, $args); // Fix here
                } 
                ?>
                <div class="d-lg-none d-block">
			        <?php
                        get_template_part('global-templates/form/hero/mobile/'.$args['globals']['hero']['variation'], null, $args);
                    ?>
                </div>
                <?php
            }
    }

    

}
