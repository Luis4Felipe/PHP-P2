<div class="w-100 m-0 p-0">

    <div class="w-100" id="img-banner">

    </div>

    <div class="w-100 d-flex justify-content-center align-items-center p-4 gap-5">
        
        <div class="card text-center" style="width: 18rem;">
            <img src="public/images/pizza-img.png" class="card-img-top" alt="pizza img">
            <div class="card-body">
            <h5 class="card-title">Pizzas Cadastrados</h5>
            <p class="card-text"><?=count($viewVar['listaPizza']);?></p>
            <a href="http://<?php echo APP_HOST . "/pizza"; ?>" class="btn btn-dark"><i class="fa-solid fa-pizza-slice"></i> Listagem Pizzas</a>
            </div>
        </div>

        <div class="card text-center" style="width: 18rem;">
            <img src="public/images/bebida-img.png" class="card-img-top p-3" alt="bebida img">
            <div class="card-body">
            <h5 class="card-title">Bebidas Cadastradas</h5>
            <p class="card-text"><?=count($viewVar['listaBebidas']);?></p>
            <a href="http://<?php echo APP_HOST . "/bebidas"; ?>" class="btn btn-dark"><i class="fa-solid fa-wine-bottle"></i> Listagem Bebidas</a>
            </div>
        </div>

        <div class="card text-center" style="width: 18rem;">
            <img src="public/images/cart-img.png" class="card-img-top p-3" alt="pedido img">
            <div class="card-body">
            <h5 class="card-title">Pedidos Cadastrados</h5>
            <p class="card-text"><?=count($viewVar['listaPedidos']);?></p>
            <a href="http://<?php echo APP_HOST . "/pedido"; ?>" class="btn btn-dark"><i class="fa-solid fa-cart-shopping"></i> Listagem Pedidos</a>
            </div>
        </div>

        <div class="card text-center" style="width: 18rem;">
            <img src="public/images/user-img.png" class="card-img-top p-3" alt="user img">
            <div class="card-body">
            <h5 class="card-title">Usuários Cadastrados</h5>
            <p class="card-text"><?=count($viewVar['listaUsuarios']);?></p>
            <a href="http://<?php echo APP_HOST . "/usuario"; ?>" class="btn btn-dark"><i class="fa-regular fa-user"></i> Listagem Usuários</a>
            </div>
        </div>

        <div class="card text-center" style="width: 18rem;">
            <img src="public/images/cliente-img.png" class="card-img-top p-3" alt="cliente img">
            <div class="card-body">
            <h5 class="card-title">Clientes Cadastrados</h5>
            <p class="card-text"><?=count($viewVar['listaCliente']);?></p>
            <a href="http://<?php echo APP_HOST . "/cliente"; ?>" class="btn btn-dark"><i class="fa-solid fa-users"></i> Listagem Clientes</a>
            </div>
        </div>
        
    </div>
</div>
