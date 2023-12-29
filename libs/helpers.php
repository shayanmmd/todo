<?php

function siteUrl(string $path="")
{
    return BASEURL . $path;
}

function errorPage()
{
    header("location: tpl/error500.php");
    die();
}

function dd($msg)
{
    echo "<pre style='color: red; background: white; margin: 10; padding: 20;'>";
    print_r($msg);
    echo "</pre>";
    echo "<a href='".siteUrl() . "'>HOME</a>"  ;
    die();
}
