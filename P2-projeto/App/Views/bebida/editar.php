<div class="container">
    <h1>Edição de Bebida</h1>
    <div class="col-md-9">
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
            </div>
        <?php } ?>   

        <form action="http://<?php echo APP_HOST; ?>/bebida/atualizar" method="post" id="form_cadastro">
            <br />
            <input type="hidden" class="form-control" name="idBebida" id="id" value="<?php echo $viewVar['bebida']->getIdBebida(); ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"  class="form-control" name="nome" id="nome" placeholder="Nome da Bebida" value="<?php echo $viewVar['bebida']->getNome(); ?>" required>
            </div>            
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" class="form-control" name="preco" id="preco" placeholder="Preço do bebida" value="<?php echo $viewVar['bebida']->getPreco(); ?>" required>
            </div>             
                <br />
                <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> Salvar </button>
            <a href="http://<?php echo APP_HOST; ?>/bebida" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Cancelar </a>
        </form>
    </div>
    <div class=" col-md-3"></div>
</div>
