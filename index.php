<?php

include("bootstrap/init.php");

if (isset($_GET['remove']) and is_numeric($_GET['remove'])) {
    $deletedRows = deleteFolder($_GET['remove']);
    ($deletedRows == 0) ? dd("there is no such folder in database") : '';
}

$folders = getFolders();
// echo $_GET['folder_id'] ?? null;
$tasks = getTasks($_GET['folderId'] ?? null);

include("tpl/tpl-index.php");
