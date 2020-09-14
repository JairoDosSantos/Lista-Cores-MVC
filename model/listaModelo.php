<?php
if ((isset($requisicao) && $requisicao==TRUE)) {
    require_once "../core/crud.php";

} else {
    require_once "./core/crud.php";
}

class ListaModelo extends crud{

    protected $tabela="cores";
    private $cor;
    private $descricao;

    protected function getCor(){
        return $this->cor;
    }
    protected function setCor($valor){
        $this->cor=$valor;
   }
   protected function getDesc(){
        return $this->descricao;
    }
    protected function setDesc($valor){
         $this->descricao=$valor;
    }
    
    
    
    
    protected function Insert(){
        $sql="INSERT INTO $this->tabela(cor,descricao) VALUES(:cor,:descricao)";
        $cmd=Conectar::prepare($sql);
        $cmd->bindParam(":cor",$this->cor);
        $cmd->bindParam(":descricao",$this->descricao);
        return $cmd->execute();
    }
   
    protected function Update($id){
        $sql="UPDATE  $this->tabela SET  cor=:cor, descricao=:descricao WHERE id=:id";
        $cmd=Conectar::prepare($sql);
        $cmd->bindParam(":cor",$this->cor);
        $cmd->bindParam(":descricao",$this->descricao);
        $cmd->bindParam(":id",$id);
        return $cmd->execute();
    }
    
}