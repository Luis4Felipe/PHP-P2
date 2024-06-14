<?php

namespace App\Controllers;

use App\Models\DAO\PizzaDAO;
use App\Models\DAO\BebidaDAO;
use App\Models\DAO\PedidoDAO;
use App\Models\DAO\ClienteDAO;
use App\Models\DAO\UsuarioDAO;
use App\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        if (!$this->auth()) $this->redirect('/login/index');
        $ClienteDAO = new ClienteDAO();
        $PizzaDAO = new PizzaDAO();
        $UsuarioDAO = new UsuarioDAO();
        $PedidoDAO = new PedidoDAO();
        $BebidaDAO = new BebidaDAO();

        self::setViewParam('listaCliente', $ClienteDAO->listar());
        self::setViewParam('listaPizza', $PizzaDAO->listar());
        self::setViewParam('listaUsuarios', $UsuarioDAO->listar());
        self::setViewParam('listaPedidos', $PedidoDAO->listar());
        self::setViewParam('listaBebidas', $BebidaDAO->listar());

        $this->render('home/index');
    }
}