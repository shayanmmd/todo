<?php

function siteUrl(string $path)
{
    return BASEURL . $path;
}

function errorPage()
{
    header("location: tpl/error500.php");
    die();
}
