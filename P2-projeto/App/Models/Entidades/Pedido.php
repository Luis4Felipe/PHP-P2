<?php 

namespace App\Models\Entidades;
use DateTime;

use App\Models\Entidades\Cliente;

class Pedido 
{
    private int $idPedido; 
    private Cliente $cliente;
    private string $dt_pedido;
    private Pizza $pizza; 
    private Bebida $bebida;


    public function __construct()
    {
        $this->cliente = new Cliente();
        $this->pizza = new Pizza();
        $this->bebida = new Bebida();
     
    }
    
    public function getIdPedido()
    {
        return $this->idPedido;
    }

    public function setIdPedido(int $idPedido)
    {
        $this->idPedido = $idPedido;
    }

    public function getCliente()
    {
        return $this->cliente;
    }

    public function setCliente(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

     public function getDataPedido()
    {
        return new DateTime($this->dt_pedido);
    }

    public function setDataPedido(string $data)
    {
        $this->dt_pedido = $data;
    }


    public function getBebida()
    {
        return $this->bebida;
    }

    public function setBebida($bebida)
    {
        $this->bebida = $bebida;

        return $this;
    }

    public function getPizza()
    {
        return $this->pizza;
    }

  
    public function setPizza($pizza)
    {
        $this->pizza = $pizza;

        return $this;
    }
}

?>