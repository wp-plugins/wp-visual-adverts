<?php

class RPAdv_AdvertEntity extends Agp_Entity {

    private $title;
    private $description;
    private $link;
    private $image;
    
    public function __construct($data) {
        $default = array(
            'ID' => NULL, 
            'title' => NULL,             
            'description' => NULL, 
            'link' => NULL, 
            'image' => NULL, 
        );

        parent::__construct($data, $default); 
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLink() {
        return $this->link;
    }

    public function getImage() {
        return $this->image;
    }

    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setLink($link) {
        $this->link = $link;
        return $this;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }
    
}
