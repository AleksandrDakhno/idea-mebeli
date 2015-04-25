<?php
    //echo "app.php";
    
    $app = new Application();
    
    $header = new Header(HEADER_TPL);
    $body = new Body(BODY_TPL);
    $footer = new Footer(FOOTER_TPL);
    
    $app->run($header, $body, $footer);
?>
