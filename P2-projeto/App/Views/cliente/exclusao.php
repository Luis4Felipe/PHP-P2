<div class="container">
    <h1>Exclusão de Cliente</h1>
    <div class="col-md-9">
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
            </div>
        <?php } ?>    

        <form action="http://<?php echo APP_HOST; ?>/cliente/excluir" method="post" id="form_cadastro">
            <input type="hidden" class="form-control" name="idCliente" id="id" value="<?php echo $viewVar['cliente']->getIdCliente(); ?>">
            <br />
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"  class="form-control" name="nome" id="nome" value="<?php echo $viewVar['cliente']->getNome(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text"  class="form-control" name="telefone" id="telefone" value="<?php echo $viewVar['cliente']->getTelefone(); ?>" readonly>
            </div>
            <div class="form-group">
                <label for="endereco">Endereco</label>
                <input type="text"  class="form-control" name="endereco" id="endereco" value="<?php echo $viewVar['cliente']->getEndereco(); ?>" readonly>
            </div>

            <br />
            <div class="panel panel-danger">
                <div class="panel-body">
                    Deseja realmente excluir o cliente: <b><?= $viewVar['cliente']->getNome() ?></b>?
                </div>
                <br />
                <div class="panel-footer"> 
                <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-user-xmark"></i> Confirmar exclusão </button>
                <a href="http://<?php echo APP_HOST; ?>/cliente" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Cancelar </a>
                </div>
            </div>
        </form>
    </div>
    <div class=" col-md-3"></div>
</div>
