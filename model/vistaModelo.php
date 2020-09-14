<?php
require_once "./core/conexao.php";

class vistaModelo{

    protected function Obter_vista_Modelo($url){

        $vector=["home","sobre"];
        if(in_array($url,$vector)){
            #depois de se comprovar que o parâmetro $vista está no vector, então verifica-se se é um arquivo
            if(is_file("./view/conteudo/".$url.".php"))
            {
                #se for um arquivo, então se chama o mesmo
                $conteudo="./view/conteudo/".$url.".php";
            }

            else
            {
                # se não for um arquivo, então vai na tela de erro
                $conteudo="./view/conteudo/404.php";
            }
        }
        return $conteudo;
    }
}