<div class="container">
    <h1>Lista de Clientes</h1>
    <div class="row">
        <br />
        <div class="col-md-12">
            <a href="http://<?php echo APP_HOST; ?>/cliente/cadastro" class="btn btn-success btn-sm"><i class="fa-solid fa-user-plus"></i> Adicionar</a>
        </div>
        <div class="col-md-12">
            <hr>
           
            <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $Sessao::retornaMensagem() ?> 
                    <br>
                </div>
            <?php } ?>            

            <?php if(!count($viewVar['listaCliente'])){ ?>
                <div class="alert alert-info" role="alert">Nenhum cliente encontrado</div>
            <?php } else { ?>                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="table-success" style="font-weight: bold">
                            <td class="info">Nome</td>
                            <td class="info">Telefone</td>
                            <td class="info">Endereço</td>
                            <td class="info text-center">Ação</td>
                        </tr>
                        <?php foreach($viewVar['listaCliente'] as $cliente) { ?>
                            <tr>
                                <td><?= $cliente->getNome() ?></td>
                                <td><?= $cliente->getTelefone() ?></td>
                                <td><?= $cliente->getEndereco() ?></td>
                                <td style="width:15%; text-align: center;">
                                    <a href="http://<?= APP_HOST ?>/cliente/edicao/<?= $cliente->getIdCliente() ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar </a>
                                    <a href="http://<?= APP_HOST ?>/cliente/exclusao/<?= $cliente->getIdCliente() ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Excluir </a>   
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>