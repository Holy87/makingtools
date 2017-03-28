<?php
class MenuContainer
{
    private $menu_elements;

    public function __construct($menu_elements) {
        $this->menu_elements = $menu_elements;
    }

    public function get_elements() {
        $new_ary = [];
        foreach($this->menu_elements as $element) {
            if ($element->get_access() <= $_SESSION['user_access'])
            {
                array_push($new_ary, $element);
            }
        }
        return $new_ary;
    }
}