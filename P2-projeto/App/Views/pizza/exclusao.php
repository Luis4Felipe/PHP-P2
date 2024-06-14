<div class="container">
    <h1>Exclusão de Pizza</h1>
    <div class="col-md-9">
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
            </div>
        <?php } ?>    

        <form action="http://<?php echo APP_HOST; ?>/pizza/excluir" method="post" id="form_cadastro">
            <input type="hidden" class="form-control" name="idPizza" id="id" value="<?php echo $viewVar['pizza']->getIdPizza(); ?>">
            <br />
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"  class="form-control" name="nome" id="nome" value="<?php echo $viewVar['pizza']->getNome(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" class="form-control" name="preco" id="preco" value="<?php echo $viewVar['pizza']->getPreco(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="tamanho">Tamanho</label>
                <br>
                <select class="form-select" id="tamanho" name="tamanho" required disabled>
                    <option value="pequena" <?php if($viewVar['pizza']->getTamanho() == "pequena") { echo "selected";} ?> >Pequena</option>
                    <option value="media" <?php if($viewVar['pizza']->getTamanho() == "media") { echo "selected";} ?>>Média</option>
                    <option value="grande" <?php if($viewVar['pizza']->getTamanho() == "grande") { echo "selected";} ?>>Grande</option>
                </select>
            </div>  
            <br />
            <div class="panel panel-danger">
                <div class="panel-body">
                    Deseja realmente excluir a pizza: <b><?= $viewVar['pizza']->getNome() ?></b>?
                </div>
                <br />
                <div class="panel-footer"> 
                <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-user-xmark"></i> Confirmar exclusão </button>
                <a href="http://<?php echo APP_HOST; ?>/pizza" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Cancelar </a>
                </div>
            </div>
        </form>
    </div>
    <div class=" col-md-3"></div>
</div>
