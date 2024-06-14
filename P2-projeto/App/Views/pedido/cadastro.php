<div class="container mt-5">
    <h2>Cadastro de Pedido</h2>
    <div class="row">
        <?php if ($Sessao::retornaErro()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
                    echo $mensagem . "<br />";
                } ?>
            </div>
        <?php } ?>
            
        <form action="http://<?php echo APP_HOST; ?>/pedido/salvar" method="post" id="form_cadastro">
            <br />
            <div class="form-group">
                <label for="idCliente">Clientes</label>
                <select class="form-control" name="idCliente" required>
                    <?php foreach($viewVar['listaClientes'] as $cliente) { ?>
                        <option value="<?= $cliente->getIdCliente() ?>"><?= $cliente->getNome() ?></option>
                    <?php } ?>
                </select>
            </div>
            <br />
            <br />
            <div class="form-group">
                <label for="idPizza">Pizzas</label>
                <select class="form-control" name="idPizza" required>
                    <?php foreach($viewVar['listaPizza'] as $pizza) { ?>
                        <option value="<?= $pizza->getIdPizza() ?>"><?= $pizza->getNome() . " - " . "R$ " . $pizza->getPreco() ?></option>
                    <?php } ?>
                </select>
            </div>
            <br />
            <br />
            <div class="form-group">
                <label for="idBebida">Bebidas</label>
                <select class="form-control" name="idBebida" required>
                    <?php foreach($viewVar['listaBebida'] as $bebida) { ?>
                        <option value="<?= $bebida->getIdBebida() ?>"><?= $bebida->getNome() ." - " . "R$ " . $bebida->getPreco() ?></option>
                    <?php } ?>
                </select>
            </div>
            <br />
            <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> Salvar </button>
            <a href="http://<?php echo APP_HOST; ?>/pedido" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Cancelar </a>
        </form>
    </div>
    </div>
</div>