<?php
/**
 * Plugin Name: WP Visual Adverts
 * Plugin URI: https://wordpress.org/plugins/wp-visual-adverts/
 * Description: A plugin for WordPress that let you add visual adverts to sidebars
 * Version: 2.2.0
 * Author: Webcodin
 * Author URI: https://profiles.wordpress.org/webcodin/
 * License: GPL2
 * 
 * @package RPAdv
 * @category Core
 * @author webcodin
 */
/*  Copyright 2015 Webcodin (email : info@webcodin.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
use Webcodin\WPVisualAdverts\Core\Agp_Autoloader;

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'rpadv_output_buffer');
function rpadv_output_buffer() {
    ob_start();
}

if (file_exists(dirname(__FILE__) . '/agp-core/agp-core.php' )) {
    include_once (dirname(__FILE__) . '/agp-core/agp-core.php' );
} 

add_action( 'plugins_loaded', 'rpadv_activate_plugin' );
function rpadv_activate_plugin() {
    if (class_exists('Webcodin\WPVisualAdverts\Core\Agp_Autoloader') && !function_exists('RPAdv')) {
        $autoloader = Agp_Autoloader::instance();
        $autoloader->setClassMap(array(
            'paths' => array(
                __DIR__ => array('classes'),
            ),
            'namespaces' => array(
                'Webcodin\WPVisualAdverts\Core' => array(
                    __DIR__ => array('agp-core'),
                ),
            ),
            'classmaps' => array (
                __DIR__ => 'classmap.json',
            ),
        ));
        //$autoloader->generateClassMap(__DIR__);

        function RPAdv() {
            return RPAdv::instance();
        }    

        RPAdv();                
    }
}

rpadv_activate_plugin();
