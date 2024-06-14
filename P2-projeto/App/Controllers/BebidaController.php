<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\BebidaDAO;
use App\Models\Entidades\Bebida;

class BebidaController extends Controller
{
    public function index()
    {
        $BebidaDAO = new BebidaDAO();

        self::setViewParam('listaBebida', $BebidaDAO->listar());

        $this->render('bebida/index');
        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->render('bebida/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        if (!$_POST) { $this->redirect('/bebida');}

        $bebida = new Bebida();
        $bebida->setNome(strtolower($_POST['nome']));
        $bebida->setPreco($_POST['preco']);

        Sessao::gravaFormulario($_POST);

        try {

            $BebidaDAO = new BebidaDAO();
            $BebidaDAO->salvar($bebida);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/bebida');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Bebida adicionada com sucesso!");

        $this->redirect('/bebida');
    }

    public function edicao($params)
    {
        if (!$params) {
            $this->redirect('/bebida');
        }

        $id = $params[0];

        $BebidaDAO = new BebidaDAO();

        $bebida = $BebidaDAO->getById($id);

        if (!$bebida) {
            Sessao::gravaErro("Bebida (id:{$id}) inexistente.");
            $this->redirect('/bebida');
        }

        self::setViewParam('bebida', $bebida);

        $this->render('/bebida/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        if (!$_POST) {$this->redirect('/bebida');}

        $bebida = new Bebida();
        $bebida->setIdBebida($_POST['idBebida']);
        $bebida->setNome(strtolower($_POST['nome']));
        $bebida->setPreco($_POST['preco']);

        Sessao::gravaFormulario($_POST);

        try {

            $BebidaDAO = new BebidaDAO();
            $BebidaDAO->atualizar($bebida);
        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/bebida');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Bebida atualizada com sucesso!");

        $this->redirect('/bebida');
    }

    public function exclusao($params)
    {
        if (!$params) {
            $this->redirect('/bebida');
        }

        $id = $params[0];

        $BebidaDAO = new BebidaDAO();

        $bebida =  $BebidaDAO->getById($id);

        if (!$bebida) {
            Sessao::gravaMensagem("Bebida (idBebida:{$id}) inexistente.");
            $this->redirect('/bebida');
        }

        self::setViewParam('bebida', $bebida);

        $this->render('/bebida/exclusao');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function excluir()
    {
        if (!$_POST) {$this->redirect('/cliente');}

        $bebida = new Bebida();
        $bebida->setIdBebida($_POST['idBebida']);
        $bebida->setNome(strtolower($_POST['nome']));

        $bebidaDAO = new BebidaDAO();

        try {

            if (!$bebidaDAO->excluir($bebida->getIdBebida())) {
                Sessao::gravaMensagem("Bebida (id:{$bebida->getIdBebida()}) inexistente.");
                $this->redirect('/Bebida');
            }
        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/bebida');
        }

        Sessao::gravaMensagem("Bebida '{$bebida->getNome()}' excluido com sucesso!");

        $this->redirect('/bebida');
    }
}
