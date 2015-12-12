<?php

class PublishHandler {
    function get($message){
        publishData($message);
        
        echo "Published: '" . $message . "'";
    }
}

?>