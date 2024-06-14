<div class="w-100 m-0 p-0 d-flex " style="height: 86.1dvh;">

    <div class="w-75 bg-dark mh-100" id="img-login">

    </div>

    <div class="w-25 d-flex justify-content-center align-items-center p-5">
        <div class="container p-3 mh-100">
            <h1 class="text-center"><i class="fa-solid fa-pizza-slice"></i> Pizzaria Ratatouille</h1>
            <p class="text-center">Por favor, entre com os seus dados de login.</p>
            <hr />
            <div class="row">
                <div class="w-100">
                    <br />
                    <?php if($Sessao::retornaMensagem()){ ?>
                        <div class="alert alert-warning" role="alert">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?= $Sessao::retornaMensagem() ?> 
                            <br>
                        </div>
                    <?php } ?>       
                    <?php if($Sessao::retornaErro()){ ?>
                        <div class="alert alert-warning" role="alert">
                            <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
                        </div>
                    <?php } ?>  
                    <div class="table-responsive">
                        <form action="http://<?php echo APP_HOST; ?>/login/autentica" method="post" id="form_cadastro">
                            <div class="form-group">
                                <label for="username">Usuário:</label>
                                <input type="text" class="form-control" name="username" value="" required>
                            </div>
                            <br />    
                            <div class="form-group">
                                <label for="password">Senha:</label>
                                <input type="password" class="form-control" name="password" value="" required>
                            </div>    
                            <br />
                            <div class="form-group">
                                <button type="submit" class="btn btn-dark btn-sm w-100 p-2"><i class="fa-solid fa-right-to-bracket"></i> Login</button>
                                <br /><br />
                                <p class="text-center pt-3">Solicite uma conta ao Administrador</p>
                                <p class="text-center"><b>admin@ratatouille.com</b></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>