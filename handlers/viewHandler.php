<?php

class ViewHandler{
    function get() {
        $items = getData();
        // include "views/messages.php";
        include "views/closet.php";
    }
}

?>