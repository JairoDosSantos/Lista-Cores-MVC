<?php

$requisicao=true;
require_once "../core/configGlobal.php";

if (isset($_POST['cor']) || isset($_POST['codigo']) || isset($_POST['editar']) || isset($_POST['apagar'])) {
    require_once "../controller/listaControlador.php";
    $lista=new ListaControlador();

    if (isset($_POST['cor']) && !empty($_POST['cor']) && isset($_POST['add'])) {
        $lista->Add($_POST['cor'],$_POST['desc']);
        
    }
    else if (isset($_POST['codigo'])) {
            $id=$_POST['codigo'];
           echo  $lista->Delete();
    }
    elseif (isset($_POST['editar'])) {
        $id=$_POST['id'];
        $cor=$_POST['cor'];
        $descricao=$_POST['desc'];
        echo $lista->Update($id);
    }
}
