<?php
use vibius\core as core;

$route = new core\Router();
$view = new core\View();
$url = new core\Url();
$bootstraper = new vibius\plugins\AssetsBootstraper();


$baseUrl = $url->to('');
$urlKey = str_replace('/','-',$_SERVER['REQUEST_URI']);
$_SESSION['assets'][$urlKey] = array();

/*
    DEFINE GLOBAL VARIABLES
*/

$view->GlobalVar('baseUrl',$baseUrl);
$view->GlobalVar('urlKey',$urlKey);


/*
    DEFINE TEMPLATING RULES
*/

$view->addRule('assets',function($p) use($urlKey){
  array_push($_SESSION['assets'][$urlKey],$p);
});

$view->addRule('extends',function($p){
 return '
         <?php
          $v = new vibius\core\View();
          $tpls["'.$p.'"] = $v->load("'.$p.'");
          ?>
        ';
});

$view->addRule('display',function($p){
  return '<?php $tpls["'.$p.'"]->vars($data)->display(); ?>';
});

$view->addRule('section',function($p){
  return '<?php  ob_start(); ?>';
});

$view->addRule('sectionEnd',function($p){
  return '<?php $data["'.$p.'"] = ob_get_clean();  ?> ';
});

/*
    DEFINE APPLICATION ROUTES
*/

$route->any('css/{$id}',function($id) use($bootstraper){
  $bootstraper->addCollection('main',$_SESSION['assets'][$id]);
  $bootstraper->getStylesheet('main');
});

$route->any('/','blogController%homePage');
$route->post('add','blogController%newArticle');
$route->any('article/{$id}','blogController%showArticle');
$route->any('delete/{$id}','blogController%deleteArticle');
