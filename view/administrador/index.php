<?php


if(!isset($_SESSION['email'])){
    if(empty($this->dataObtained)){
        require_once 'view/administrador/newAdmin.php';
    }else{
        require_once 'view/administrador/loginAdmin.php';
    }
}else{
     require_once 'view/gestor_de_contenido/index.php';
}