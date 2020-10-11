<?php
function aoutolad($clase){
    require_once($clase.".php");
}
spl_autoload_register("autoload")

?>