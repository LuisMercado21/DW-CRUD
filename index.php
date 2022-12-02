<?php
require_once("config.php");
require_once("controller/controller.php");
if(isset($_GET['m'])):    
    if(method_exists("Controller", $_GET['m'])):
        Controller::{$_GET['m']}();
    endif;
else:
    Controller::index();
endif;
?>