<?php

/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 21/03/2017
 * Time: 21:12
 */
class User
{
    public $id;
    public $username;
    public $mail;
    public $state;          //0: idle, 1: active, -1: banned
    public $avatar_url;     //image name
    
    
    /**
     * Main constructor
     * @param int $id
     * @param string $username
     * @param string $mail
     * @param int $active
     * @param int $banned
     * @param string $avatar_url
     **/
    public function __construct($id, $username, $mail, $active, $avatar_url)
    {
        $this->id = $id;
        $this->username = $username;
        $this->mail = $mail;
        $this->state = $active;
        $this->avatar_url = $avatar_url;
    }
}