<?php
    //echo 'requires.php';

    require_once 'app/configs/constants.php';
    
    //classe files
    require_once 'app/mvc/models/xml.php';

    require_once 'app/mvc/controllers/Application.php';
    
    require_once 'app/mvc/views/MainView.php';
        
    require_once 'app/mvc/controllers/Header.php';
    require_once 'app/mvc/controllers/Body.php';
    require_once 'app/mvc/controllers/Footer.php';

    
    
    //object files
    require_once 'app/objects/app.php';

    
?>
