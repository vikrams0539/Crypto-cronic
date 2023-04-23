<?php
    $name = "Spin Aviation";
    $root = "";

    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    {
        $root="https";
    }
    else
    {
        $root="http";
    }
    $root.="://".$_SERVER['HTTP_HOST']."/JMCKDS/spin-aviation/";
    $images = $root."images/"
?>