<?php

require 'vendor/autoload.php';
use Twig\Loader\FilesystemLoader;
use Twig\Environment;


//Routing
$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}

//Rendu du template
$loader = new FilesystemLoader('path/to/templates');
$twig = new Environment($loader);

if ($page === 'home') {
    require 'home.twig';
}