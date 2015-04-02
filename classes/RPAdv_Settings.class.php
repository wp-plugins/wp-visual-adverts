<?php

class RPAdv_Settings extends Agp_Module {

    private $imageWidth;
    
    private $imageHeight;
    
    private $imageCrop;
    
    private $refreshTime;
    
    private $advertCount;
    
    private $animationSpeed;
    
    /**
     * @var object The single instance of the class 
     */
    protected static $_instance = null;    
    
	/**
	 * Main Instance
	 *
     * @return Visualizer
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}    
    
	/**
	 * Cloning is forbidden.
	 */
	public function __clone() {
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 */
	public function __wakeup() {
    }        
    
    public function __construct($baseDir) {
        parent::__construct($baseDir);        
        
        //delete_option('rpadv_settings');
        
        $options = $this->getOptions();
        if (empty($options)) {
            $options = array(
                'rpadv-image-width' => '400',
                'rpadv-image-height' => '250',
                'rpadv-image-crop' => '1',
                'rpadv-refresh-time' => 5000,
                'rpadv-advert-count' => 3,
                'rpadv-animation-speed' => 400,
            );
            update_option('rpadv_settings', $options);
        }
        
        $this->imageWidth = $options['rpadv-image-width'];
        $this->imageHeight = $options['rpadv-image-height'];
        $this->imageCrop = !empty($options['rpadv-image-crop']) ? '1' : '';
        $this->refreshTime = $options['rpadv-refresh-time'];
        $this->advertCount = $options['rpadv-advert-count'];
        $this->animationSpeed = $options['rpadv-animation-speed'];
        
        add_action('admin_menu', array($this, 'adminMenu'));                
    }

    public function adminMenu () {
        add_menu_page('Visual Adverts', 'Visual Adverts', 'manage_options', 'adverts');   
        if (taxonomy_exists('advert-category')) {
            add_submenu_page('adverts', 'Categories', 'Categories', 'manage_options', 'edit-tags.php?taxonomy=advert-category&post_type=adverts');                        
        }    
        add_submenu_page('adverts', 'Settings', 'Settings', 'administrator', 'adverts-settings', array($this, 'renderSettingsPage'));                
        register_setting( 'rpadv-settings', 'rpadv_settings', array($this, 'sanitizeSettings') );                
        add_filter( 'parent_file', array($this, 'currentMenu') );        
    }
    
    function currentMenu($parent_file){
        global $submenu_file, $current_screen, $pagenow;

        if($current_screen->post_type == 'adverts') {

            if($pagenow == 'edit-tags.php'){
                $submenu_file = 'edit-tags.php?taxonomy=advert-category&post_type='.$current_screen->post_type;
            }

            $parent_file = 'adverts';

        }

        return $parent_file;

    }    

    public function sanitizeSettings ($input) {
        $output = array();    
        return array_merge($input, $output);            
    }            

    public function renderSettingsPage () {
        echo $this->getTemplate('admin/settings');                    
    }        
    
    public function getOptions() {
        return get_option( 'rpadv_settings' );
    }
    
    public function getImageWidth() {
        return $this->imageWidth;
    }

    public function getImageHeight() {
        return $this->imageHeight;
    }

    public function getImageCrop() {
        return $this->imageCrop;
    }

    public function getRefreshTime() {
        return $this->refreshTime;
    }
    
    public function getAdvertCount() {
        return $this->advertCount;
    }

    public function getAnimationSpeed() {
        return $this->animationSpeed;
    }

}

