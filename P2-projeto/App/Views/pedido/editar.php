<div class="container">
    <h1>Edição do Pedido</h1>
    <div class="col-md-9">
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
            </div>
        <?php } ?>   

        <form action="http://<?php echo APP_HOST; ?>/pedido/atualizar" method="post" id="form_cadastro">
            <br />
            <label>Número pedido</label>
            <input type="hidden" class="form-control" name="idPedido" id="id" value="<?php echo $viewVar['pedido']->getIdPedido(); ?>">
            <div class="form-group">
                <label for="idCliente">Cliente</label>
                <select class="form-control" name="idCliente" required>
                    <?php foreach($viewVar['listaClientes'] as $cliente) { ?>
                        <option value="<?= $cliente->getIdCliente() ?>"><?= $cliente->getNome() ?></option>
                    <?php } ?>
                </select>
            </div>
            <br />
            <div class="form-group">
                <label for="idPizza">Pizza escolhida</label>
                <select class="form-control" name="idPizza" required>
                    <?php foreach($viewVar['listaPizza'] as $pizza) { ?>
                        <option value="<?= $pizza->getIdPizza() ?>"><?= $pizza->getNome() . " - " . "R$ " . $pizza->getPreco() ?></option>
                    <?php } ?>
                </select>
            </div>          
            <div class="form-group">
                <label for="idBebida">Bebida escolhida</label>
                <select class="form-control" name="idBebida" required>
                    <?php foreach($viewVar['listaBebida'] as $bebida) { ?>
                        <option value="<?= $bebida->getIdBebida() ?>"><?= $bebida->getNome() ." - " . "R$ " . $bebida->getPreco() ?></option>
                    <?php } ?>
                </select>
            </div>        
            <div class="form-group">
                <label for="preco">Pizza</label>
                <input type="number" step="0.01" class="form-control" name="pizza" id="pizza" value="<?php echo $viewVar['pedido']->getBebida()->getPizza()->getNome(); ?>" required>
            </div>    
            <div class="form-group">
                <label>Subtotal</label>
                <input type="number" step="0.01" class="form-control" name="subtotal" id="total" value="<?php echo $subtotal = ($viewVar['pedido']->getPizza()->getPreco() + $viewVar['pedido']->getBebida()->getPreco()) ; ?>">
            </div>
                <br />
                <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> Salvar </button>
            <a href="http://<?php echo APP_HOST; ?>/pedido" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Cancelar </a>
        </form>
    </div>
    <div class=" col-md-3"></div>
</div>

