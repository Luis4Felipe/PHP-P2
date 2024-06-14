<div class="container">
    <h1>Edição de Cliente</h1>
    <div class="col-md-9">
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
            </div>
        <?php } ?>   

        <form action="http://<?php echo APP_HOST; ?>/cliente/atualizar" method="post" id="form_cadastro">
            <br />
            <input type="hidden" class="form-control" name="idCliente" id="id" value="<?php echo $viewVar['cliente']->getIdCliente(); ?>">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text"  class="form-control" name="nome" id="nome" placeholder="Nome do Cliente" value="<?php echo $viewVar['cliente']->getNome(); ?>" required>
            </div>            
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text"  class="form-control" name="telefone" id="telefone" placeholder="Telefone do Cliente" value="<?php echo $viewVar['cliente']->getTelefone(); ?>" required>
            </div>            
            <div class="form-group">
                <label for="endereco">Endereco</label>
                <input type="text"  class="form-control" name="endereco" id="endereco" placeholder="Endereco do Cliente" value="<?php echo $viewVar['cliente']->getEndereco(); ?>" required>
            </div>            
                <br />
                <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> Salvar </button>
            <a href="http://<?php echo APP_HOST; ?>/cliente" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Cancelar </a>
        </form>
    </div>
    <div class=" col-md-3"></div>
</div>
