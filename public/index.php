<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

// require 'vendor/autoload_runtime.php';

// $page = 'home';

// if (isset($_GET['page'])){
//     $page = $_GET['page'];
// }
// $loader = new Twig_Loader_Filesystem(__DIR__.'/templates');
// $twig = new Twig_Environment($loader, [
//     'cache' => false,//__DIR__.'temp'
// ]);

// if($page === 'home'){
//     echo $twig->render('base.html.twig');
// }
