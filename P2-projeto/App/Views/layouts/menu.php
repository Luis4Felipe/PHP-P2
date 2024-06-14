<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top w-100">
    <div class="container">
        <a class="navbar-brand px-5" href="http://<?php echo APP_HOST; ?>"><b><i class="fa-solid fa-pizza-slice"></i> Pizzaria Ratatouille</b></a>
        <div id="nav-item" class="navbar">
            <ul class="nav navbar-nav mr-auto">
            <?php if(isset($_SESSION["loggedin"]) && !empty($_SESSION["loggedin"])){ ?>

                    <li class="nav-item px-2">
                        <a class="nav-link <?php if($viewVar['nameController'] == "HomeController") { ?> active <?php } ?>" href="http://<?php echo APP_HOST; ?>" >
                        <i class="fa-solid fa-house"></i> Home</a>
                        </a>
                    </li>

                    <li class="nav-item px-2">
                        <a class="nav-link <?php if($viewVar['nameController'] == "ClienteController") { ?> active <?php } ?>" href="http://<?php echo APP_HOST . "/cliente"; ?>" >
                        <i class="fa-solid fa-users"></i> Clientes</a>
                        </a>
                    </li>
                    
                    <li class="nav-item px-2">
                        <a class="nav-link <?php if($viewVar['nameController'] == "UsuarioController") { ?> active <?php } ?>" href="http://<?php echo APP_HOST . "/usuario"; ?>" >
                        <i class="fa-regular fa-user"></i> Usuários</a>
                        </a>
                    </li>

                    <li class="nav-item px-2">
                        <a class="nav-link <?php if($viewVar['nameController'] == "PizzaController") { ?> active <?php } ?>" href="http://<?php echo APP_HOST . "/pizza"; ?>" >
                        <i class="fa-solid fa-pizza-slice"></i> Pizzas</a>
                        </a>
                    </li>
                    
                    <li class="nav-item px-2">
                        <a class="nav-link <?php if($viewVar['nameController'] == "BebidaController") { ?> active <?php } ?>" href="http://<?php echo APP_HOST . "/bebida"; ?>" >
                        <i class="fa-solid fa-wine-bottle"></i> Bebidas</a>
                        </a>
                    </li>
                    
                    <li class="nav-item px-2">
                        <a class="nav-link <?php if($viewVar['nameController'] == "PedidoController") { ?> active <?php } ?>" href="http://<?php echo APP_HOST . "/pedido"; ?>" >
                        <i class="fa-solid fa-cart-shopping"></i> Pedido</a>
                        </a>
                    </li>

                    <li class="nav-item dropdown px-5">
                        <a class="nav-link dropdown-toggle <?php if($viewVar['nameController'] == "LoginController") { ?> active <?php } ?>" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i> <?= ucfirst($_SESSION["username"]) ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                            <li><a class="dropdown-item" href="http://<?php echo APP_HOST . "/login/dashboard"; ?>"><i class="fa-solid fa-clipboard"></i> Dashboard</a></li>
                            <li><a class="dropdown-item" href="http://<?php echo APP_HOST . "/login/logout"; ?>"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                        </ul>
                    </li>

                <?php } else { ?>

                    <li class="nav-item px-5">
                        <a class="nav-link <?php if($viewVar['nameController'] == "LoginController") { ?> active <?php } ?>" href="http://<?php echo APP_HOST . "/login"; ?>" >
                        <i class="fa-solid fa-user"></i> Login</a>
                        </a>
                    </li>
                    
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
