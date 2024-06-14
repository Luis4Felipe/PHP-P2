<?php


namespace App\Models\DAO;

use App\Models\Entidades\Bebida;
use Exception;


class BebidaDAO extends BaseDAO
{
    public function getById($id)
    {
        $resultado = $this->select("SELECT * FROM bebida WHERE idBebida = $id");

        return $resultado->fetchObject(Bebida::class);
    }

    public function listar()
    {
        $resultado = $this->select("SELECT * FROM bebida");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, bebida::class);
    }

    public function salvar(Bebida $bebida)
    {
        try {
            $nome = $bebida->getNome();
            $preco = $bebida->getPreco();

            return $this->insert(
                'bebida',
                ":nome,:preco",
                [
                    ':nome'=>$nome,
                    ':preco'=>$preco,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar(Bebida $bebida)
    {
        try {

            $id = $bebida->getIdBebida();
            $nome = $bebida->getNome();
            $preco = $bebida->getPreco();

            return $this->update(
                'bebida',
                "nome = :nome, preco = :preco",
                [
                    ':id' => $id,
                    ':nome'=>$nome,
                    ':preco'=>$preco,
                ],
                "idBebida = :id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public function excluir(int $id)
    {
        try {
            return $this->delete('bebida', "idBebida = $id");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao deletar" . $e->getMessage(), 500);
        }
    }
}


?>