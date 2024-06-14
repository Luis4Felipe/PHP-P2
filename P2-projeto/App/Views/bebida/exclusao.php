<div class="container">
    <h1>Exclusão de Bebida</h1>
    <div class="col-md-9">
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
            </div>
        <?php } ?>    

        <form action="http://<?php echo APP_HOST; ?>/bebida/excluir" method="post" id="form_cadastro">
            <input type="hidden" class="form-control" name="idBebida" id="id" value="<?php echo $viewVar['bebida']->getIdBebida(); ?>">
            <br />
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"  class="form-control" name="nome" id="nome" value="<?php echo $viewVar['bebida']->getNome(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" class="form-control" name="preco" id="preco" value="<?php echo $viewVar['bebida']->getPreco(); ?>" readonly>
            </div>
        
            <br />
            <div class="panel panel-danger">
                <div class="panel-body">
                    Deseja realmente excluir a bebida: <b><?= $viewVar['bebida']->getNome() ?></b>?
                </div>
                <br />
                <div class="panel-footer"> 
                <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-user-xmark"></i> Confirmar exclusão </button>
                <a href="http://<?php echo APP_HOST; ?>/bebida" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Cancelar </a>
                </div>
            </div>
        </form>
    </div>
    <div class=" col-md-3"></div>

</div>
