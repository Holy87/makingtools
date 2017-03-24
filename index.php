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

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
  } else {
    $controller = 'pages';
    $action     = 'home';
  }

require_once('application/views/main_layout.php');
