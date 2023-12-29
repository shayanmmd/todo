<?php

include("bootstrap/init.php");

if (isset($_GET['logout'])){
    logOut();
    header("location:" . siteUrl('/tpl/tpl-auth.php'));
}
if (!isUserLoggedIn())
    header("location:" . siteUrl('/tpl/tpl-auth.php'));

if (isset($_GET['remove']) and is_numeric($_GET['remove'])) {
    $deletedRows = deleteFolder($_GET['remove']);
    ($deletedRows == 0) ? dd("there is no such folder in database go to home by this link:") : '';
}
if (isset($_GET['removeTask']) and is_numeric($_GET['removeTask'])) {
    $deletedRows = deleteTask($_GET['removeTask']);
    ($deletedRows == 0) ? dd("there is no such folder in database go to home by this link:") : '';
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addFolderButton']) && !empty($_POST['folderName'])) {
        $result = addFolder($_POST['folderName']);
        $_POST['addFolderButton'] = null;
        ($result == 0) ? dd("couldn't add folder to database") : '';
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addNewTaskButton']) && !empty($_POST['addNewTask'])) {
        if (is_null($_POST['folderId']) || empty($_POST['folderId']))
            dd("the folder is not selected.\r\nplease select a folder and then add a new taks");
        $result = addNewTask($_POST['addNewTask'], $_POST['folderId']);
        $siteUrl = siteUrl("?folderId=" . $_POST['folderId']);
        ($result == 0) ? dd("couldn't add a new task to the folder") : header("location:$siteUrl");
    }
}



$folders = getFolders();
$tasks = getTasks($_GET['folderId'] ?? null);

include("tpl/tpl-index.php");
