<?php 


namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\PedidoDAO;
use App\Models\Entidades\Pedido;

use App\Models\DAO\ClienteDAO;
use App\Models\DAO\PizzaDAO;
use App\Models\DAO\BebidaDAO;

use App\Models\Entidades\Cliente;
use App\Models\Entidades\Pizza;
use App\Models\Entidades\Bebida;

class PedidoController extends Controller
{
    
    public function index()
    {        
        $pedidoDAO = new PedidoDAO();

        self::setViewParam('listaPedidos', $pedidoDAO->listar());
      
        $this->render('/pedido/index');

        Sessao::limpaErro();
        Sessao::limpaMensagem();
    }

    public function pedidos() {
        $pedidosDAO = new PedidoDAO();
        self::setViewParam('listaPedidos', $pedidosDAO->listar());

        $this->render('/pedido/pedidos');
    }

    public function cadastro()
    {
        $clienteDAO = new ClienteDAO();
        $pizzaDAO = new PizzaDAO();
        $bebidaDAO = new BebidaDAO();


        self::setViewParam('listaClientes', $clienteDAO->listar());
        self::setViewParam('listaPizza',  $pizzaDAO->listar());
        self::setViewParam('listaBebida', $bebidaDAO->listar());

    
        $this->render('/pedido/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    
    }

    public function salvar()
    {
        if (!$_POST) { $this->redirect('/Pedido'); }

        $cliente = new Cliente();
        $cliente->setIdCliente($_POST['idCliente']);
        
        $pizza = new Pizza();
        $pizza->setIdPizza($_POST['idCliente']);
        
        $bebida = new Bebida();
        $bebida->setIdBebida($_POST['idBebida']);
        

        $pedido = new Pedido();
        $pedido->setCliente($cliente);
        $pedido->setBebida($bebida);
        $pedido->setPizza($pizza);
        

        Sessao::gravaFormulario($_POST);
        
        try { 

            $pedidoDAO = new PedidoDAO(); 
            $lastId = $pedidoDAO->salvar($pedido);
            $pedido->setIdPedido($lastId);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pedido');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Pedido adicionado com sucesso!");
        
        $this->redirect('/pedido');
    }

    public function edicao($params)
    {
        $id = $params[0];

        $pedidoDAO = new PedidoDAO();

        $pedido = $pedidoDAO->getById($id);

        if(!$pedido){
            Sessao::gravaMensagem("Pedido (id:{$id}) inexistente.");
            $this->redirect('/pedido');
        }

        $clienteDAO = new ClienteDAO();
        $bebidaDAO = new BebidaDAO();
        $pizzaDAO = new PizzaDAO();


        self::setViewParam('listaClientes', $clienteDAO->listar());
        self::setViewParam('listaPizza', $bebidaDAO->listar());
        self::setViewParam('listaBebida', $pizzaDAO->listar());

        self::setViewParam('pedido',$pedido);
    
        $this->render('/pedido/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        $pedido = new Pedido();

        $pedido->setIdPedido($_POST['id']);
        $pedido->getCliente()->getIdCliente();
       
        Sessao::gravaFormulario($_POST);


        try {

            $pedidoDAO = new PedidoDAO();
            $pedidoDAO->atualizar($pedido);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pedido');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Pedido atualizado com sucesso!");

        $this->redirect('/pedido');
    }
    
    public function exclusao($params)
    {
        $id = $params[0];

        $pedidoDAO = new PedidoDAO();

        $pedido = $pedidoDAO->getById($id);

        if(!$pedido){
            Sessao::gravaMensagem("Pedido (id:{$id}) inexistente.");
            $this->redirect('/pedido');
        }

        self::setViewParam('pedido',$pedido);

        $this->render('/pedido/exclusao');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function excluir()
    {
        if (!$_POST) { $this->redirect('/cliente'); }

        $pedido = new Pedido();
        $pedido->setIdPedido($_POST['id']);

        $pedidoDAO = new PedidoDAO();

        try {
            
            if (!$pedidoDAO->excluir($pedido->getIdPedido())){
                Sessao::gravaMensagem("Pedido (id:{$pedido->getIdPedido()}) inexistente.");
                $this->redirect('/pedido');
            }

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pedido');            
        }       
       
        Sessao::gravaMensagem("O pedido '{$pedido->getIdPedido()}' excluido com sucesso");
        $this->redirect('/pedido');
    }
}


