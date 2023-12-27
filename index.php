<?php

include("bootstrap/init.php");

if (isset($_GET['remove']) and is_numeric($_GET['remove'])) {    
    $deletedRows = deleteFolder($_GET['remove']);
    if($deletedRows==0){
        dd("there is no such folder in database");
    }
}


$folders = getFolders();

include("tpl/tpl-index.php");
