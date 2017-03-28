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
    public $access_level;   //0: unlogged
    
    
    /**
     * Main constructor
     * @param int $id
     * @param string $username
     * @param string $mail
     * @param int $active
     * @param int $banned
     * @param string $avatar_url
     **/
    public function __construct($id, $username, $mail, $active, $avatar_url, $access)
    {
        $this->id = $id;
        $this->username = $username;
        $this->mail = $mail;
        $this->state = $active;
        $this->avatar_url = $avatar_url;
        $this->access_level = $access;
    }

    /**
     * @return User
     */
    public static function get_user($id) {
        if(isset($_SESSION['user_id'])) {
            $link = Db::getInstance();
            $query = "SELECT * FROM users WHERE user_id = :id";
            $stmt = $link->prepare($query);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return new User($user['user_id'], $user['user_name'], $user['user_mail'], $user['user_active'], $user['user_avatar'], $user['user_access']);
        } else {
            return new User(0,'', '', 0, '', 0);
        }
    }
}