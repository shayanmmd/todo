<?php

include("bootstrap/init.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signUpButton'])) {
        $result = register($_POST['name'], $_POST['email'], $_POST['password']);
        if ($result == 0)
            dd("we couldn't register you");
    } else if (isset($_POST['signInButton'])) {
        $result =  signIn($_POST['email'], $_POST['password']);
        if (!empty($result))
            dd($result);
        header("location:".siteUrl());
    }
}

include("tpl/tpl-auth.php");
