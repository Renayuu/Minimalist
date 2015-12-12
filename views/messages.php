<!DOCTYPE HTML>

<html>

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>dcrExample</title>
        </head>

        <body>
        
            <header>
                <h1>DCR Example Messages</h1>
            </header>
            
            <?php
                foreach ($messages as $message) {
                    include "views/_message.php";
                }
            ?>
            
        </body>
    
</html>