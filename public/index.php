<?php
use App\Controller;
use App\Request;

include_once "../vendor/autoload.php";
const APP_DIR=__DIR__;

$request= new Request($_GET,$_POST,$_SERVER);


$controller = new Controller($request);
$controller->process();