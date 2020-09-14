<div class="row bg-transparent">
    <div class="col-md-6">
        <?php foreach ($lstcont->Select() as $lista) { ?>
            
        <form action="./ajax/listaAJax.php" method="POST" data-form="delete" id="formu<?php echo $lista->id;?>" class="Formulario">
            
            
            <div class="alert alert-<?php echo $lista->cor;?> text-uppercase" role="alert">
                <?php echo $lista->descricao;?>
                <input type="hidden" name="codigo" value="<?php echo $id= $lista->id;?>">
                <div class="float-right ">
                    <a type="" href="<?php echo $id= $lista->id;?>" class="btn btn-p" id="update" name="update">E<span class="text-lowercase">ditar</span> &nbsp;</a>
                    <button type="submit"  class="btn btn-p" id="apagar" name="apagar">Apagar</button>
                </div>
            </div>
        </form>
        
        <?php }?>
        
    </div>

    <div class="col-md-6 px-auto py-3 bg-dark">
    <h4 class="text-center text-white"><?php echo $titulo;?></h4>
        <form autocomplete="off" action="./ajax/listaAJax.php" id="formu" data-form="save" method="POST" class="FormularioAjax form mx-auto my-2  w-75">
            <div class="form-group ml-auto">
                <input type="text" name="cor" id="cor" value="<?php echo (isset($_GET['url']) && is_numeric($_GET['url'])) ? $lstcont->Find($_GET['url'])->cor : "" ; ?>" placeholder="exemplo: dark" class="form-control">
            </div>
            <div class="form-group ml-auto">
                <input type="text" name="desc" id="desc" value="<?php echo (isset($_GET['url']) && is_numeric($_GET['url'])) ? $lstcont->Find($_GET['url'])->descricao : "" ; ?>" placeholder="descrição" class="form-control">
            </div>
            <input type="hidden" name="<?php echo $req; ?>">
            <input type="hidden" name="id" value="<?php echo (isset($_GET['url'])) ? $_GET['url'] : "" ; ?>">

            <input type="submit" name="<?php echo $name;?>" id="botao" class="btn btn-primary center" value="<?php echo $botao;?>"></input>
            <div class="RespostaAjax"></div>
        </form>
    </div>
</div>
