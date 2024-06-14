<?php

namespace App\Controllers;
use App\Lib\Sessao;
use App\Models\DAO\PizzaDAO;
use App\Models\Entidades\Pizza;

class PizzaController extends Controller
{
    public function index()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        $PizzaDAO = new PizzaDAO();

        self::setViewParam('listaPizza', $PizzaDAO->listar());

        $this->render('pizza/index');
        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        $this->render('pizza/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if (!$_POST) { $this->redirect('/pizza'); }

        $pizza = new Pizza();
        $pizza->setNome(strtolower($_POST['nome']));
        $pizza->setPreco($_POST['preco']);
        $pizza->setTamanho(strtolower($_POST['tamanho']));

        Sessao::gravaFormulario($_POST);

        try { 

            $pizzaDAO = new PizzaDAO();
            $pizzaDAO->salvar($pizza);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pizza');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Pizza adicionada com sucesso!");

        $this->redirect('/pizza');
    }

    public function edicao($params)
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if(!$params){ $this->redirect('/pizza'); } 
        
        $id = $params[0];

        $pizzaDAO = new PizzaDAO();

        $pizza = $pizzaDAO->getById($id);

        if(!$pizza){
            Sessao::gravaErro("Pizza (id:{$id}) inexistente.");
            $this->redirect('/pizza');
        }

        self::setViewParam('pizza', $pizza);

        $this->render('/pizza/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if (!$_POST) { $this->redirect('/pizza'); }
        
        $pizza = new Pizza();
        $pizza->setIdPizza($_POST['idPizza']);
        $pizza->setNome(strtolower($_POST['nome']));
        $pizza->setPreco($_POST['preco']);
        $pizza->setTamanho(strtolower($_POST['tamanho']));

        Sessao::gravaFormulario($_POST);

        try {

            $pizzaDAO = new PizzaDAO();
            $pizzaDAO->atualizar($pizza);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/cliente');            
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Pizza atualizada com sucesso!");

        $this->redirect('/pizza');
    }

    public function exclusao($params)
    {
        if (!$this->auth()) $this->redirect('/login/index');

        if(!$params){ $this->redirect('/pizza'); } 

        $id = $params[0];

        $pizzaDAO = new PizzaDAO();

        $pizza = $pizzaDAO->getById($id);

        if(!$pizza){
            Sessao::gravaMensagem("Pizza (idPizza:{$id}) inexistente.");
            $this->redirect('/pizza');
        }

        self::setViewParam('pizza', $pizza);

        $this->render('/pizza/exclusao');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function excluir()
    {
        if (!$this->auth()) $this->redirect('/login/index');
        
        if (!$_POST) { $this->redirect('/cliente'); }

        $pizza = new Pizza();
        $pizza->setIdPizza($_POST['idPizza']);
        $pizza->setNome($_POST['nome']);

        $pizzaDAO = new PizzaDAO();

        try {

            if (!$pizzaDAO->excluir($pizza->getIdPizza())){
                Sessao::gravaMensagem("Pizza (id:{$pizza->getIdPizza()}) inexistente.");
                $this->redirect('/pizza');
            }

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/pizza');            
        }        

        Sessao::gravaMensagem("Pizza '{$pizza->getNome()}' excluido com sucesso!");

        $this->redirect('/pizza');
    }
}