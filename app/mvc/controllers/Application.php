<?php

    //echo 'Application.php';

    class Application {
        
        public function run($header, $body, $footer){
            $header->run();
            $body->run();
            $footer->run();
        }
    }
?>
