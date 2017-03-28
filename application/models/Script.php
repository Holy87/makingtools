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
        $link = Db::getInstance();
        $query = "SELECT * FROM users WHERE user_id = :id";
        $stmt = $link->prepare($query);
        $stmt->bindParam(':id', $this->author_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return new User($user['user_id'], $user['user_name'], $user['user_mail'], $user['user_active'], $user['user_avatar'], $user['user_access']);
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