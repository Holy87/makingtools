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

    public function __construct($id, $username, $mail)
    {
        $this->id = $id;
        $this->username = $username;
        $this->mail = $mail;
    }
}