<?php
if (!function_exists('require_file')){
function require_file($pathfolder){
$file=array_diff(scandir($pathfolder),['.','..']);
foreach($file as $item){
require_once $pathfolder.$item;
}
}
}
if (!function_exists('debug')){
    function debug($data){
    echo '<pre>';
    print_r($data);
    die;
    }
}
