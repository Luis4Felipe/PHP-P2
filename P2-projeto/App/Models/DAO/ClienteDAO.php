<?php

namespace App\Models\DAO;

use App\Models\Entidades\Cliente;
use Exception;


class ClienteDAO extends BaseDAO
{
    public function listar()
    {
        $resultado = $this->select("SELECT * FROM cliente");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Cliente::class);
    }

    public function getById ($id)
    {
        $resultado = $this->select("SELECT * FROM cliente WHERE idCliente = $id");

        return $resultado->fetchObject(Cliente::class);
    }

    public function salvar(Cliente $cliente)
    {
        try {

            $nome           = $cliente->getNome();
            $telefone       = $cliente->getTelefone();
            $endereco       = $cliente->getEndereco();

            return $this->insert(
                'cliente',
                ":nome,:telefone,:endereco",
                [
                    ':nome'         =>$nome,
                    ':telefone'     =>$telefone,
                    ':endereco'     =>$endereco,
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public  function atualizar(Cliente $cliente)
    {
        try {

            $id             = $cliente->getIdCliente();
            $nome           = $cliente->getNome();
            $telefone          = $cliente->getTelefone();
            $endereco     = $cliente->getEndereco();

            return $this->update(
                'cliente',
                "nome = :nome, telefone = :telefone, endereco = :endereco",
                [
                    ':id'           =>$id,
                    ':nome'         =>$nome,
                    ':telefone'        =>$telefone,
                    ':endereco'   =>$endereco,
                ],
                "idCliente = :id"
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public function excluir (int $id)
    {
        try {

            return $this->delete('cliente', "idCliente = $id");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o cliente. " . $e->getMessage(), 500);
        }
    }
    
}



?>
