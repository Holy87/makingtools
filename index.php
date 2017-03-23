<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 21/03/2017
 * Time: 21:11
 */
include_once 'config.php';
include_once 'application/controllers/controller.php';
include_once 'application/db_connection.php';

$controller = new Controller();
$controller->invoke();