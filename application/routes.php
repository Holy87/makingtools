<?php
/**
 * Created by PhpStorm.
 * User: Francesco
 * Date: 22/03/2017
 * Time: 23:22
 * Thanks to http://requiremind.com/a-most-simple-php-mvc-beginners-tutorial/
 */
  function call($controller = 'pages', $action = 'home') {
      // require the file that matches the controller name
      require_once('application/controllers/' . $controller . '_controller.php');

      // create a new instance of the needed controller
      switch($controller) {
          case 'pages':
              $controller = new PagesController();
              break;
      }

      // call the action
      $controller->{ $action }();
  }

  // just a list of the controllers we have and their actions
  // we consider those "allowed" values
  $controllers = array('pages' => ['home', 'error']);

  // check that the requested controller and action are both allowed
  // if someone tries to access something else he will be redirected to the error action of the pages controller
  if (array_key_exists($controller, $controllers)) {
      if (in_array($action, $controllers[$controller])) {
          call($controller, $action);
      } else {
          call('pages', 'error');
      }
  } else {
      call('pages', 'error');
  }