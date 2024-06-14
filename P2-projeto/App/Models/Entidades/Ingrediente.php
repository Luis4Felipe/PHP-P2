<?php 

namespace App\Models\Entidades;


class Ingrediente 
{
    private int $idIngrediente; 
    private string $nome; 
    private float $preco; 
    

    public function getIdIngrediente()
    {
        return $this->idIngrediente;
    } 
    public function setIdIngrediente($idIngrediente)
    {
        $this->idIngrediente = $idIngrediente;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getPreco()
    {
        return $this->preco;
    }

    public function setPreco($preco)
    {
        $this->preco = $preco;
    }
}