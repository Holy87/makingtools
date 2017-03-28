<?php

/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 21/03/2017
 * Time: 21:13
 */

class Script
{
    public $friendly_name;
    public $name;
    public $id;
    public $url;
    public $version;
    public $last_update;
    public $author_id;

    /**
     * @return User
     */
    public function getAuthor()
    {
        return User::get_user($this->author_id);
    }

    /**
     * Script constructor.
     * @param $id
     * @param $f_name
     * @param $name
     * @param $version
     * @param $url
     * @param $author
     */
    public function __construct($id, $f_name, $name, $version, $url, $author)
    {
        $this->id = $id;
        $this->author = $author;
        $this->friendly_name = $f_name;
        $this->name = $name;
        $this->version = $version;
        $this->url = $url;
        $this->author_id = $author;
    }
}