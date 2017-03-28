<?php

/**
 * Created by PhpStorm.
 * User: Gold Service
 * Date: 28/03/2017
 * Time: 12:12
 */
class CarouselElement
{
    private $image_url;
    private $url;
    private $title;
    private $description;
    private $active;

    /**
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

     public function __construct($title, $text, $link, $image, $active) {
        $this->title = $title;
        $this->description = $text;
        $this->image_url = $image;
        $this->url = $link;
        $this->active = $active;
    }

    /**
     * @return string
     */
    public function get_class() {
        if ($this->active)
            return ' active';
        else
            return '';
    }
}