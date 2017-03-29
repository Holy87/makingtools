<?php
require_once ABS_PATH . '/application/models/MenuElement.php';
require_once ABS_PATH . '/application/models/MenuContainer.php';

function draw_menu_elements() {

    $html = '';
    global $action;
    $menu_elements = new MenuContainer();
    /** @var MenuElement $menu_element */
    foreach($menu_elements->get_elements() as $menu_element)
    {
        if ($action == $menu_element->get_tag())
            $active = ' active';
        else
            $active = '';
        $html.=
        '<li class="nav-item'.$active.'"><a class="nav-link" href="'.$menu_element->get_url().'">'.$menu_element->get_text().'</a></li>';
    }
    echo $html;
}

function draw_right_elements() {
    global $user;
    if($user->access_level > 0) {
        draw_logged_elements();
    } else {
        draw_login_elements();
    }
}

function draw_logged_elements() {
    global $user;
    $code = '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="'.$user->avatar_url.'" class="img-rounded">'.$user->username.'</a>
        <li><a href="#"><i class="fa fa-gamepad" aria-hidden="true"></i>&nbsp; I miei giochi</a></li>
        <li><a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp; I miei script</a></li>
        <li><a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp; Profilo</a></li>
        <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Esci</a></li>
    </li>';
    echo $code;
}

function draw_login_elements() {
    
}
?> 




<div class="collapse navbar-collapse" id="navbarCollapse">
    <!-- LEFT MENU COMMANDS -->
    <ul class="navbar-nav mr-auto">
        <?php draw_menu_elements(); ?>
    </ul>

    <!-- RIGHT MENU COMMANDS -->
    <ul class="nav navbar-nav navbar-right">
        <?php draw_right_elements(); ?>
    </ul>
</div>