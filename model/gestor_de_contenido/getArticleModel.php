<?php

class GetArticleModel extends Database{
    function __construct()
    {
        parent::__construct();
    }

    function getArticle($paginaActual){

        $arreglo = [];
        $resultadosMostrados = 5;
        $inicioArticle = ($paginaActual-1) * $resultadosMostrados;

        $query = $this->connect()->query("SELECT COUNT(*) AS total FROM article");
        $totalPaginas =  ceil($query->fetch(PDO::FETCH_OBJ)->total / $resultadosMostrados);

        $query = $this->connect()->prepare("SELECT * FROM article LIMIT :inicioArticle, :finDeArticle");
        $query->execute(['inicioArticle'=>$inicioArticle, 'finDeArticle'=>$resultadosMostrados]);

        if($query->rowCount()){
            foreach($query as $e){
              array_push($arreglo, $e);
            }
        }
        array_push($arreglo, $totalPaginas);
        return $arreglo;
    }
}