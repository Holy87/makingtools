<?php
require_once 'application/models/MenuElement.php';
require_once 'application/models/MenuContainer.php';

function draw_menu_elements() {
    $html = '';
    if (!isset ($_SESSION['user']))
        return;
    foreach(MenuContainer::get_elements() as $menu_element)
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
?> 




<div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
        <?php draw_menu_elements(); ?>
    </ul>
    <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" placeholder="Chiave di ricerca" type="text">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cerca</button>
    </form>
</div>