<?php

class ViewHandler{
    function get() {
        $messages = getData();
        include "views/messages.php";
    }
}

?>