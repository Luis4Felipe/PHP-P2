<?php
    // $pedido->getCliente()->getNome() 
    // $pedido->getPizza()->getNome() 
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <a href="http://<?php echo APP_HOST; ?>/pedido/cadastro" class="btn btn-success btn-sm"><i class="fa-solid fa-shopping-basket"></i> Adicionar</a>
        </div>
        <div class="col-md-offset-3 col-md-12">
        <?php if(is_null($viewVar['listaPedidos'])) { ?>
                <div class="alert alert-info" role="alert">Nenhum pedido encontrado.</div>
            <?php } else { ?>

                <?php if($Sessao::retornaMensagem()){ ?>
                <div class="alert alert-warning" role="alert">
                    <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <?= $Sessao::retornaMensagem() ?> 
                    <br>
                </div>
            <?php } ?>     
            <div class="shadow-lg p-3 mb-5 bg-white rounded">
                <h4 class="fw-bolder text-center">Resumo dos Pedidos</h4>
                <table class="table mb-2">
                        <tbody>
                            <tr style="font-weight: bold">
                            <td class="info" style="width:20%">Cliente</td>
                                <hr />
                                <td  class="info hidden-sm hidden-xs" style="width:20%">Descrição</td>
                                <td  class="info hidden-sm hidden-xs" style="width:10%">Preço</td>
                                <td  class="info hidden-sm hidden-xs" style="width:10%">Data do Pedido</td>
                                <td  class="info text-center" style="width:15%">Ação</td>
                            </tr>
                            <?php foreach($viewVar['listaPedidos'] as $pedido){ ?>
                                <tr>
                                <td class="text-left">Matheus</td>
                                <td class="text-left">Pizza de Calabresa</td>
                                <td class="text-right text-nowrap ">R$45,00</td>
                                <td class="text-right text-nowrap "><?= $pedido->getDataPedido()->format('d/m/Y H:i')?></td>

                                <td class="text-center">
                                    <a class="text-success m-2" href="http://<?= APP_HOST ?>/pedido/editar/<?=$pedido->getIdPedido()?>"><i class="fa fa-solid fa-pen-to-square"></i></a>
                                    <a class="text-danger m-2" href="http://<?= APP_HOST ?>/pedido/exclusao/<?=$pedido->getIdPedido()?>"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <?php } ?>
                    </table>
            </div>
        </div>
    </div>
</div>


