<?php

return array(
    'adverts' => array(
        'page_title' => 'Visual Adverts', 
        'menu_title' => 'Visual Adverts', 
        'capability' => 'manage_options',
        'function' => '',
        'icon_url' => '', 
        'position' => null, 
        'hideInSubMenu' => TRUE,
        'submenu' => array(
            'edit-tags.php?taxonomy=advert-category&post_type=adverts' => array(
                'page_title' => 'Categories', 
                'menu_title' => 'Categories', 
                'capability' => 'manage_options',
                'function' => '',                                         
            ),
            'adverts-settings' => array(
                'page_title' => 'Settings', 
                'menu_title' => 'Settings', 
                'capability' => 'manage_options',
                'function' => array('RPAdv_Settings', 'renderSettingsPage'),                         
            ),            
        ),
    ),
);
    