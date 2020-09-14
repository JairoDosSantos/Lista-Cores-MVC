<?php
    require_once "./controller/listacontrolador.php";
    $lstcont=new ListaControlador();
    $botao="Guardar";
    $name="Add_cor";
    $titulo="Adicionar Cor";
    $req="add";
    if (isset($_GET['url']) && is_numeric($_GET['url'])) {
        $botao="Editar";
        $name="Edite_cor";
        $titulo="Editar Cor";
        $req="editar";
    }
    
?>

<!DOCTYPE html>
<html lang="PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./view/css/bootstrap.min.css">
    <link rel="stylesheet" href="./view/css/sweetalert2.css">
    <link rel="stylesheet" href="./view/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="./view/css/font-awesome.min.css">
    <link rel="stylesheet" href="./view/css/animate.css">
    <link rel="stylesheet" href="estilo.css">
    <title>Lista de Cores</title>
</head>
<body>


    <!--div class="jumbotron">
        <h1 class="text-lowercase text-dark font-weight-bolder">Lista de Cores do Bootstrap</h1>
    </div-->
    <nav class="navbar navbar-expand-lg navbar-light bg-dark p-5">
        <span class="navbar-brand text-uppercase" href="#">Jairo dos Santos</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse direito ml-auto mr-auto" id="navbarNav">
            <ul class="navbar-nav float-right">
                <li class="nav-item active">
                    <a class="nav-link" href="home">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sobre">Sobre</a>
                </li>
            </ul>
        </div>
    </nav>

    

    <section class="container mt-5">
       <?php 
       if(!is_numeric($_GET['url'])){
            require_once "./controller/vistaControlador.php";
            $vt = new vistaControllador();
            $vistasR=$vt->Obter_Vista_Controlador();   
       }
       else{
        $vistasR="./view/conteudo/home.php";
       }
       include($vistasR);
       ?>
    </section>


    <script src="./view/js/jquery-3.1.1.min.js"></script>
    <script src="./view/js/sweetalert2.min.js"></script>
    <script src="./view/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
          
                $('.FormularioAjax').submit(function(e){
                e.preventDefault();

                var form=$(this);

                var tipo=form.attr('data-form');
                var accion=form.attr('action');
                var metodo=form.attr('method');
                var respuesta=form.children('.RespostaAjax');
                

                

                var textoAlerta;
                if(tipo==="save"){
                    textoAlerta="A cor ficará armazenada no sistema";
                }else if(tipo==="update"){
                    textoAlerta="A cor do sistemas será actualizada";
                }else{
                    textoAlerta="Queres realizar a operação solicitada?";
                }


                swal({
                    title: "¿Tens a certeza?",   
                    text: textoAlerta,   
                    type: "question",   
                    showCancelButton: true,     
                    confirmButtonText: "Aceitar",
                    cancelButtonText: "Cancelar"
                }).then(function () {
                    $.ajax({

                        type: metodo,
                        url: accion,
                        data: $("#formu").serialize(),
                        xhr: function(){
                            var xhr = new window.XMLHttpRequest();
                            xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);
                                if(percentComplete<100){
                                    respuesta.html('<p class="text-center">Processando... ('+percentComplete+'%)</p><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: '+percentComplete+'%;"></div></div>');
                                }else{
                                    respuesta.html('<p class="text-center"></p>');
                                }
                            }
                            }, false);
                            return xhr;
                        },
                        success: function (data) {
                            respuesta.html(data);
                        },
                        error: function() {
                            respuesta.html("msjError");
                        }
                    });
                    return false;
                });
            });

        });
    </script>
    <script>
            $(document).ready(function(){

                    
                    $('.Formulario').submit(function(e){
                    e.preventDefault();

                    var form=$(this);

                    var tipo=form.attr('data-form');
                    var accion=form.attr('action');
                    var metodo=form.attr('method');
                    var cod=form.attr('id');
                    var respuesta=form.children('.RespostaAjax');
                    
                    

                    

                    var textoAlerta;
                    if(tipo==="delete"){
                        textoAlerta="A cor será eliminado do sistema";
                    }else{
                        textoAlerta="Queres realizar a operação solicitada?";
                    }


                    swal({
                        title: "¿Tens a certeza?",   
                        text: textoAlerta,   
                        type: "question",   
                        showCancelButton: true,     
                        confirmButtonText: "Aceitar",
                        cancelButtonText: "Cancelar"
                    }).then(function () {
                        $.ajax({

                            type: metodo,
                            url: accion,
                            data: $("#"+cod+"").serialize(),
                            
                            success: function (data) {
                                respuesta.html(data);
                            },
                            error: function() {
                                respuesta.html("msjError");
                            }
                        });
                        return false;
                    });
                });

            });
    </script>

   
</body>
</html>