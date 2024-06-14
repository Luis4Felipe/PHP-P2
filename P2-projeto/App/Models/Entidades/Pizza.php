<?php 

namespace App\Models\Entidades;


class Pizza 
{
    private int $idPizza; 
    private string $nome;
    private float $preco; 
    private string $tamanho;

    public function getIdPizza()
    {
        return $this->idPizza;
    }

    public function setIdPizza($idPizza)
    {
        $this->idPizza = $idPizza;

        return $this;
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

        return $this;
    }
    
    public function getTamanho(): string
    {
        return $this->tamanho;
    }

    public function setTamanho(string $tamanho): self
    {
        $this->tamanho = $tamanho;
        return $this;
    }

}