<?php
return array(
    'rpadv_settings' => array(
        'sections' => array(
            'defaults' => array(
                'label' => '',
            ),            
        ),
        'fields' => array(
            'rpadv-image' => array(
                'label' => 'Image Size',            
                'type' => 'imagesize',                        
                'default' =>  array(
                    'width' => 400,
                    'height' => 250,
                    'crop' => 1,
                ),
                'section' => 'defaults',
                'class' => '',
            ),                        
            'rpadv-refresh-time' => array(
                'type' => 'number',
                'label' => 'Refresh Time (msec.)',
                'default' => 5000,
                'section' => 'defaults',
                'class' => 'text',
                'note' => '',
                'atts' => array(
                    'min' => 0,
                ),                
            ),
            'rpadv-animation-speed' => array(
                'type' => 'number',
                'label' => 'Animation Speed (msec.)',
                'default' => 400,
                'section' => 'defaults',
                'class' => 'text',
                'note' => '',
                'atts' => array(
                    'min' => 0,
                ),             
            ),            
            'rpadv-advert-count' => array(
                'type' => 'number',
                'label' => 'Advert Count',
                'default' => 3,
                'section' => 'defaults',
                'class' => 'text',
                'note' => '',
                'atts' => array(
                    'min' => 0,
                ),             
            ),            
        ),
    ),
);