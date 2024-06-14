<div class="container">
    <h1>Cadastro de Pizza</h1>       
    <div class="col-md-9">
        <?php if($Sessao::retornaErro()){ ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach($Sessao::retornaErro() as $key => $mensagem) { echo $mensagem . "<br />"; } ?> 
            </div>
        <?php } ?>     

        <form action="http://<?php echo APP_HOST; ?>/pizza/salvar" method="post" id="form_cadastro">
            <br />
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control"  name="nome" placeholder="Nome da Pizza" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" step="0.01" class="form-control" name="preco" placeholder="Preço da Pizza" value="<?php echo $Sessao::retornaValorFormulario('preco'); ?>" required>
            </div>
            <div class="form-group">
                <label for="tamanho">Tamanho</label>
                <br>
                <select class="form-select" id="tamanho" name="tamanho" required>
                    <option value="pequena">Pequena</option>
                    <option value="media">Média</option>
                    <option value="grande">Grande</option>
                </select>
            </div>
            <br />
            <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> Salvar </button>
            <a href="http://<?php echo APP_HOST; ?>/pizza" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i> Cancelar </a>
        </form>
    </div>
    <div class=" col-md-3"></div>
</div>