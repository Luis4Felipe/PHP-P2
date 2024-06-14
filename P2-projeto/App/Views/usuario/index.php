<div class="container">
    <h1>Lista de Usuários</h1>
    <div class="row">
        <br />
        <div class="col-md-12">
            <a href="http://<?php echo APP_HOST; ?>/usuario/cadastro" class="btn btn-success btn-sm"><i class="fa-solid fa-user-plus"></i> Adicionar</a>
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

            <?php if(!count($viewVar['listaUsuarios'])){ ?>
                <div class="alert alert-info" role="alert">Nenhum usuário encontrado</div>
            <?php } else { ?>                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tr class="table-success" style="font-weight: bold">
                            <td class="info">Nome</td>
                            <td class="info">E-Mail</td>
                            <td class="info" style="width:15%">Username</td>
                            <td class="info" style="width:15%">Data Cadastro</td>
                            <td class="info text-center" style="width:15%">Ação</td>
                        </tr>
                        <?php foreach($viewVar['listaUsuarios'] as $usuario) { ?>
                            <tr>
                                <td><?= $usuario->getNome() ?></td>
                                <td><?= $usuario->getEmail() ?></td>
                                <td><?= $usuario->getUsername() ?></td>
                                <td><?= $usuario->getData_cadastro() ?></td>
                                <td class="text-center">
                                    <a href="http://<?= APP_HOST ?>/usuario/edicao/<?= $usuario->getIdUsuario() ?>" class="btn btn-info btn-sm"><i class="fa-solid fa-pen-to-square"></i>  Editar </a>
                                    <a href="http://<?= APP_HOST ?>/usuario/exclusao/<?= $usuario->getIdUsuario() ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Excluir </a>   
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
