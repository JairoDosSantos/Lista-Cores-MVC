<?php
if ((isset($requisicao) && $requisicao==TRUE)) {
    require_once ("../core/conexao.php");
} else {
    require_once ("conexao.php");
}

abstract class  crud{

    protected $tabela="";
    protected abstract function Update($id);
    protected abstract function Insert();
    
    protected function Apagar($id){
        $sql="DELETE FROM $this->tabela WHERE id=:id";
        $cmd=Conectar::prepare($sql);
        $cmd->bindParam(":id",$id);

        $cmd->execute();
    }
    protected function FindAll(){
        $sql="SELECT * FROM $this->tabela ORDER BY id DESC LIMIT 10";
        $cmd=Conectar::prepare($sql);
        $cmd->execute();

        return $cmd->fetchAll();
    }
    protected function Find($id){
        $sql="SELECT * FROM $this->tabela WHERE id=:id";
        $cmd=Conectar::prepare($sql);
        $cmd->bindParam(":id",$id);
        $cmd->execute();

        return $cmd->fetch();
    }

}