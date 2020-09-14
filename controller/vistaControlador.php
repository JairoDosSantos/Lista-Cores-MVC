<?php

if (isset($requisicao) && $requisicao==TRUE) {
    require_once "../model/vistaModelo.php";
} else {
    require_once "./model/vistaModelo.php";
}


class vistaControllador extends vistaModelo{


    public function Index(){
        return require_once "./view/template.php";
    }
    public function Obter_Vista_Controlador(){

        if (isset($_GET['url'])) {
            $vector1=explode("/",$_GET['url']);

            $resposta=vistaModelo::Obter_vista_Modelo($vector1[0]);
        }
        else{
            $resposta="./view/conteudo/home.php";
        }

        return $resposta;
    }
}