<?php


if(isset($_POST['emailLogin']) || isset($_POST['client'])){
require 'controller/administrador/adminSessionController.php';
}

if(!isset($_SESSION)){
    session_set_cookie_params(60*60*24*1);
    session_start();
}

$url =  isset($_REQUEST['url']) ? $_REQUEST['url'] : null;


if($url)
{
    $url[strlen($url)-1] === '/' ?  $url= substr($url, 0 , strlen($url)-1) : false;
}

$url = explode('/', $url); 
empty($url[0]) ? require_once 'view/home/index.php' : false;


if(sizeof($url)===2){

    if($url[1] === 'contenido'){

    }else if($url[1] === 'categorias'){

    }else if($url[1] === 'ventas'){
        
    }else if($url[0] === 'busqueda'){

    }else if($url[0] === 'categoria'){

    }else if($url[0] === 'articulo'){

    }else if($url[0] === 'cliente'){
        
    }else{
        require_once 'view/404/404.php';
        return false; 
    }
}


if(!empty($url[0]))
{           
    $model = $url[0].'Model';
    $controll = $url[0].'Controller';

    file_exists('controller/'.$url[0].'/'.$controll.'.php') ? require_once 'controller/'.$url[0].'/'.$controll.'.php' : false;
    if(class_exists($url[0])){
        $controller = new $url[0]($model);
        $controller->loadView($url);
    }else{
        require_once 'view/404/404.php';
    }    
}