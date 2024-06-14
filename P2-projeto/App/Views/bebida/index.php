<div class="container">
    <h1>Lista de Bebidas</h1>
    <div class="row">
        <br />
        <div class="col-md-12">
            <a href="http://<?php echo APP_HOST; ?>/bebida/cadastro" class="btn btn-success btn-sm"><i class="fa-solid fa-pizza-slice"></i> Adicionar</a>
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

            <?php if(!count($viewVar['listaBebida'])){ ?>
                <div class="alert alert-info" role="alert">Nenhuma Bebida encontrada</div>
            <?php } else { ?>                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="table-success" style="font-weight: bold">
                            <td class="info">Nome</td>
                            <td class="info">Preço</td>
                            <td class="info text-center">Ação</td>
                        </tr>
                        <?php foreach($viewVar['listaBebida'] as $bebida) { ?> 
                            <tr>
                                <td><?= ucwords($bebida->getNome()) ?></td>
                                <td>R$ <?= $bebida->getPreco() ?></td>
                                <td style="width:15%; text-align: center;">
                                    <a href="http://<?= APP_HOST ?>/bebida/edicao/<?= $bebida->getIdBebida() ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i> Editar </a>
                                    <a href="http://<?= APP_HOST ?>/bebida/exclusao/<?= $bebida->getIdBebida() ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Excluir </a>   
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>