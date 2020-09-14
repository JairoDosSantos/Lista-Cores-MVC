<?php
if ((isset($requisicao) && $requisicao==TRUE)) {
    require_once "../model/listaModelo.php";
}
else{
    require_once "./model/listaModelo.php";
}


class ListaControlador  extends ListaModelo{

   
    public function Add($cor, $descricao){
        ListaModelo::setCor($cor);
        ListaModelo::setDesc($descricao);
        if(ListaModelo::Insert()){
            echo "<script>
                    swal({
                        title:'Sucesso',
                        text:'Salvo com sucesso',
                        type:'success',
                        confirmButtonText: 'Ok'
                    }).then(function(){
                        location.reload();
                    });
                </script>";
            
        }else{
            echo "<script>
                    swal({
                        title:'Falhou',
                        text:'A inserção de dados falhou...',
                        type:'error',
                        confirmButtonText: 'Ok'
                    });
                </script>";
        }
    }
    public function Delete(){
      
        if (ListaModelo::Apagar($_POST['codigo'])) {
            echo "<script>
                    swal({
                        title:'Sucesso',
                        text:'Eliminado com sucesso',
                        type:'success',
                        confirmButtonText: 'Ok'
                    }).then(function(){
                        location.reload();
                    });
                 </script>";
        }else{
           echo "<script>
                    swal({
                        title:'Falhou',
                        text:'A deletação de dados falhou...',
                        type:'error',
                        confirmButtonText: 'Ok'
                    });
                </script>";
        }
      
    }
    public function Update($id){
        ListaModelo::setCor($_POST['cor']);
        ListaModelo::setDesc($_POST['desc']);
        if (ListaModelo::Update($id)) {
            echo "<script>
                    swal({
                        title:'Sucesso',
                        text:'Editado com sucesso',
                        type:'success',
                        confirmButtonText: 'Ok'
                    }).then(function(){
                        location.reload();
                    });
                 </script>";
        }
        
    }
    public function Select(){
      return  ListaModelo::FindAll();
        
    }
    public function Find($id){
       return ListaModelo::Find($id);
    }
}