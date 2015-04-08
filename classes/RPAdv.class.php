<?php

class RPAdv extends Agp_Module {

    /**
     * Plugin settings
     * 
     * @var RPAdv_Settings
     */
    private $settings;    
    
    /**
     * Ajax Object
     * 
     * @var RPAdv_Ajax
     */
    private $ajax;
    
    
    /**
     * Advert Repository
     * 
     * @var RPAdv_AdvertRepository
     */
    private $advertRepository;        
    
    
    /**
     * The single instance of the class 
     * 
     * @var object 
     */
    protected static $_instance = null;    
    
	/**
	 * Main Instance
	 *
     * @return object
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
    
    public function __construct() {
        parent::__construct(dirname(dirname(__FILE__)));
        
        include_once ( $this->getBaseDir() . '/types/adverts-post-type.php' );                
        
        $this->ajax = RPAdv_Ajax::instance();
        $this->advertRepository = new RPAdv_AdvertRepository();
        $this->settings = new RPAdv_Settings($this->getBaseDir());
        
        add_action( 'init', array($this, 'init' ), 999 );        
        add_action( 'wp_enqueue_scripts', array($this, 'enqueueScripts' ) );    
        add_action( 'admin_enqueue_scripts', array($this, 'enqueueAdminScripts' ));                    
        add_action( 'widgets_init', array($this, 'initWidgets' ) );
        add_action( 'after_setup_theme', array($this, 'setupTheme' ) );
        add_action( 'add_meta_boxes', array($this, 'addMetaboxes' ) );
        add_action( 'save_post', array($this, 'saveMetaboxes' ), 1, 2);
        add_action( 'load-widgets.php', array($this, 'loadWidget' ) );
    }
    
    public function init () {
        $this->advertRepository->refreshRepository();
    }
    
    public function setupTheme() {
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'adverts-thumb', $this->settings->getImageWidth(), $this->settings->getImageHeight(), $this->settings->getImageCrop() ); 
    }    
    
    public function addMetaboxes () {
        add_meta_box('rpadv_link', 'Link', array($this, 'renderLinkMetabox'), 'adverts', 'normal', 'default');
    }
    
    public function saveMetaboxes($post_id, $post) {
        if ( empty($_POST['rpadv_link_noncename'])
            || !wp_verify_nonce( $_POST['rpadv_link_noncename'], $this->getBaseDir() )
            || !current_user_can( 'edit_post', $post->ID )
        ) {
            return $post->ID;
        }            
        
        if( $post->post_type == 'revision' ) return;
        $key = 'rpadv_link';
        $value = $_POST[$key];
        
        if ( !$value ) {
            delete_post_meta($post->ID, $key);
        } elseif ( get_post_meta($post->ID, $key, FALSE) ) {
            update_post_meta($post->ID, $key, $value);
        } else {
            add_post_meta($post->ID, $key, $value);
        }
    }
    
    public function renderLinkMetabox() {
        echo $this->getTemplate('admin/link-metabox');
    }
    
    public function enqueueScripts () {
        wp_enqueue_script( 'rpadv', $this->getAssetUrl('js/main.js'), array('jquery') );                                                         
        wp_localize_script( 'rpadv', 'ajax_rpadv', array( 
            'base_url' => site_url(),         
            'ajax_url' => admin_url( 'admin-ajax.php' ), 
            'ajax_nonce' => wp_create_nonce('ajax_atf_nonce'),        
            'refreshTime' => $this->settings->getRefreshTime(),
            'animationSpeed' => $this->settings->getAnimationSpeed(),
            'advertCountPage' => $this->settings->getAdvertCount(),
            'advertCount' => array(),
            
        ));  

        wp_enqueue_style('rpadv-css', $this->getAssetUrl('css/style.css'));                    
    }        
    
    
    public function enqueueAdminScripts () {
        wp_enqueue_script( 'rpadv', $this->getAssetUrl('js/admin.js'), array('jquery', 'wp-color-picker') );                                                         
        wp_enqueue_style( 'rpadv-css', $this->getAssetUrl('css/admin.css'), array('wp-color-picker') );                    
    }    
    
    public function loadWidget () {
        wp_enqueue_style( 'wp-color-picker' );        
        wp_enqueue_script( 'wp-color-picker' );            
    }
    
    public function initWidgets() {
        register_widget('RPAdv_AdvertWidget');
    }
    
    public function getAjax() {
        return $this->ajax;
    }

    public function getAdvertRepository() {
        return $this->advertRepository;
    }

    function getSettings() {
        return $this->settings;
    }
    
    public function getAdverts() {
        if ($this->getAdvertRepository()->getCount() > 0) {
            $result = array();
            $adverts = $this->getAdvertRepository()->shuffleAll();
            $maxCount = $this->getSettings()->getAdvertCount();
            $count = $this->getAdvertRepository()->getCount();
            $count = ($count > $maxCount) ? $maxCount : $count;
            for ( $i = 0; $i < $count; $i++) {
                $result[] = $adverts[$i];
            }
            return $result;            
        }
    }    
    
    public function showWidget ($params) {
        $id = !empty($params['id']) ? $params['id'] : '';
        $term = !empty($params['term']) ? $params['term'] : '';
        $color = !empty($params['color']) ? $params['color'] : '';        
        $isAjax = !empty($params['isAjax']) ? 'isAjax' : '';
        $template = !empty($params['isAjax']) ? 'rpadv-widget-list' : 'rpadv-widget';

        if (!empty($id)) :
            $this->advertRepository->setCategoryFilter($term);
            $this->advertRepository->applyColor($color);
            if (empty($isAjax)) :
        ?>
        <script type="text/javascript">
            ajax_rpadv.advertCount["<?php echo $id;?>"] = <?php echo $this->advertRepository->getCount(); ?>;
        </script>
        <?php                
            endif;
            
            echo $this->getTemplate($template, $isAjax);                            
            
        endif;
        
    }
    
}