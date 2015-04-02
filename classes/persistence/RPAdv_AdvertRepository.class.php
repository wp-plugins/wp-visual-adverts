<?php

class RPAdv_AdvertRepository extends Agp_RepositoryAbstract {
    
    public $entityClass ='RPAdv_AdvertEntity';

    public function init() {
    }
    
    public function refreshRepository() {
        $data = array();                        
        
        $args = array(
            'post_type' => 'adverts',
            'orderby'   => 'ID',
            'order'     => 'ASC',
            'posts_per_page' => -1,
            'nopaging' => true,
        );
        $query = new WP_Query($args);
        
        while ($query->have_posts()) : $query->the_post(); 
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'adverts-thumb');
        
            $data[get_the_ID()] = array(
                'ID' => get_the_ID(),
                'title' => get_the_title(),
                'description' => get_the_content(),
                'link' => get_post_meta(get_the_ID(), 'rpadv_link', TRUE),
                'image' => !empty($image[0]) ? $image[0] : '',
            );
        endwhile;
        wp_reset_query();
        
        parent::refresh($data);        
    }
    
    public function shuffleAll() {
        $data = $this->getAll();
        srand((float)microtime() * 1000000);
        shuffle($data);
        return $data;
    }

}
