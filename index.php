<?php
require ('vendor/autoload.php');
use epm\object\Brand;

$b = new Brand();
$b->title->add(1, 'test')->add(2, 'test en');
echo 'init';
var_dump($b);
