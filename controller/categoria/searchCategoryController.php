<?php

class SearchCategoryController{

    function __construct()
    {
        require_once __DIR__.'/../../model/categoria/searchCategoryModel.php';
        $this->model = new SearchCategoryModel;
    }
}

$GetSearch = new SearchCategoryController;


if(isset($url[1])){

    $paginaActual = isset($url[2]) ? $url[2] : 1;
    $GetSearch->model->getSearch($url[1], $paginaActual);
}else{
    echo '<div id="resultCategory">No hay articulos en esta categoria</div>';
}