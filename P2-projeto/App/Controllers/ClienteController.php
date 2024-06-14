<?php

namespace App\Controllers;
use App\Lib\Sessao;
use App\Models\DAO\ClienteDAO;
use App\Models\Entidades\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        $ClienteDAO = new ClienteDAO();

        self::setViewParam('listaCliente', $ClienteDAO->listar());

        $this->render('cliente/index');
        
        Sessao::limpaMensagem();

    }

    public function cadastro()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        $this->render('cliente/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if (!$_POST) { $this->redirect('/cliente'); }

        $cliente = new Cliente();
        $cliente->setNome($_POST['nome']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);

        Sessao::gravaFormulario($_POST);

        try { 

            $clienteDAO = new ClienteDAO();
            $clienteDAO->salvar($cliente);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/cliente');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Cliente adicionado com sucesso!");

        $this->redirect('/cliente');
    }

    public function edicao($params)
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if(!$params){ $this->redirect('/cliente'); } 
        
        $id = $params[0];

        $clienteDAO = new ClienteDAO();

        $cliente = $clienteDAO->getById($id);

        if(!$cliente){
            Sessao::gravaErro("Cliente (id:{$id}) inexistente.");
            $this->redirect('/cliente');
        }

        self::setViewParam('cliente',$cliente);

        $this->render('/cliente/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if (!$_POST) { $this->redirect('/cliente'); }
        
        $cliente = new Cliente();
        $cliente->setIdCliente($_POST['idCliente']);
        $cliente->setNome($_POST['nome']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setEndereco($_POST['endereco']);

        Sessao::gravaFormulario($_POST);

        try {

            $clienteDAO = new ClienteDAO();
            $clienteDAO->atualizar($cliente);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/cliente');            
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Cliente atualizado com sucesso!");

        $this->redirect('/cliente');
    }

    public function exclusao($params)
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if(!$params){ $this->redirect('/cliente'); } 

        $id = $params[0];

        $clienteDAO = new ClienteDAO();

        $cliente = $clienteDAO->getById($id);

        if(!$cliente){
            Sessao::gravaMensagem("Cliente (idCliente:{$id}) inexistente.");
            $this->redirect('/cliente');
        }

        self::setViewParam('cliente',$cliente);

        $this->render('/cliente/exclusao');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function excluir()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if (!$_POST) { $this->redirect('/cliente'); }

        $cliente = new Cliente();
        $cliente->setIdCliente($_POST['idCliente']);
        $cliente->setNome($_POST['nome']);

        $clienteDAO = new ClienteDAO();

        try {

            if (!$clienteDAO->excluir($cliente->getIdCliente())){
                Sessao::gravaMensagem("Cliente (id:{$cliente->getIdCliente()}) inexistente.");
                $this->redirect('/cliente');
            }

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/cliente');            
        }        

        Sessao::gravaMensagem("Cliente '{$cliente->getNome()}' excluido com sucesso!");

        $this->redirect('/cliente');
    }
}