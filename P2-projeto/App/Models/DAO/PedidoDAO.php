<?php


namespace App\Models\DAO;

use App\Models\Entidades\Pedido;

class PedidoDAO extends BaseDAO
{
    public function getById($id)
    {
        $resultado = $this->select(
            "SELECT p.idPedido,
                    c.idCliente,
                    c.nome as nomeCliente,
                    pi.idPizza,
                    pi.nome as nomePizza,
                    b.idBebida,
                    b.nome as nomeBebida
                FROM pedido as p 
                INNER JOIN cliente as c ON p.idCliente = c.idCliente
                INNER JOIN pizza as pi ON p.idPizza = pi.idPizza
                INNER JOIN bebida as b ON p.idBebida = b.idBebida
                WHERE p.idPedido = $id"
        );

        $dataSetPedidos = $resultado->fetch();

        if($dataSetPedidos) {
            $pedido = new Pedido();
            $pedido->getCliente()->setIdCliente($dataSetPedidos['idCliente']);
            $pedido->getCliente()->getNome($dataSetPedidos['nomeCliente']);
    
            $pedido->getPizza()->setIdPizza($dataSetPedidos['idPizza']);
            $pedido->getPizza()->setNome($dataSetPedidos['nomePizza']);
    
            $pedido->getBebida()->setIdBebida($dataSetPedidos['idBebida']);
            $pedido->getBebida()->setNome($dataSetPedidos['nomeBebida']);
    
            $pedido->setIdPedido($dataSetPedidos['idPedido']);
    
            return $pedido;
        }

        return false;
    }

    public function listar()
    {
        $resultado = $this->select("SELECT * FROM pedido");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Pedido::class);
    }

    public function salvar(Pedido $pedido)
    {
        try {

            $idCliente = $pedido->getCliente()->getIdCliente();
            $idBebida = $pedido->getBebida()->getIdBebida();
            $idPizza = $pedido->getPizza()->getIdPizza();

            return $this->insert(
                'pedido',
                ":idCliente, :idPizza, idBebida",
                [
                    ':idCliente' => $idCliente,
                    ':idPizza' => $idPizza,
                    ':idBebida' => $idBebida
                ]
            );

        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar(Pedido $pedido)
    {
        try {

            $id = $pedido->getIdPedido();
            $idCliente = $pedido->getCliente()->getIdCliente();
            $idBebida = $pedido->getBebida()->getIdBebida();
            $idPizza = $pedido->getPizza()->getIdPizza();


            return $this->update(
                'pedido',
                "idCliente = :idCliente, idPizza = :idPizza, idBebida = :idBebida",
                [
                    ':id' => $id,
                    ':idCliente' => $idCliente,
                    ':idPizza' => $idPizza,
                    ':idBebida' => $idBebida
                ],
                "idPedido = :id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados." . $e->getMessage(), 500);
        }
    }

    public function excluir(int $id)
    {
        try {
            return $this->delete('pedido', "idPedido = $id");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao deletar" . $e->getMessage(), 500);
        }
    }
}
