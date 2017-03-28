<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 21/03/2017
 * Time: 21:11
 */
require_once 'application/config.php';
require_once 'application/db_connection.php';
if(isset($_GET['control']) && isset($_GET['action'])) {
    $control = $_GET['control'];
    $action = $_GET['action'];
}
else {
    $control = 'pages';
    $action = 'home';
}
require_once 'application/views/main_layout.php';