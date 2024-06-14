<?php 

namespace App\Models\Entidades;


class Bebida 
{
    private int $idBebida; 
    private string $nome;
    private float $preco; 

    public function getIdBebida() : int 
    {
        return $this->idBebida; 
    }

    public function setIdBebida($id) : void 
    {
        $this->idBebida=$id; 
    }

    public function getNome() : string
    {
        return $this->nome; 
    }

    public function setNome($nome) : string
    {
        return $this->nome=$nome; 
    }

    public function getPreco() : float
    {
        return $this->preco; 
    }

    public function setPreco($preco) : float
    {
        return $this->preco=$preco; 
    }
  
}

