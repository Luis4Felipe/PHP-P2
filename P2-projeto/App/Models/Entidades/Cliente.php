<?php

namespace App\Models\Entidades;


class Cliente
{
    private int $idCliente;
    private string $nome;
    private string $telefone;
    private string $endereco;

    public function getIdCliente(): int
    {
        return $this->idCliente;
    }
    public function setIdCliente($id): void
    {
        $this->idCliente = $id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome($nome): void
    {
        $this->nome = $nome;
    }
    public function getTelefone(): string
    {
        return $this->telefone;
    }
    public function setTelefone($telefone): void
    {
        $this->telefone = $telefone;
    }
    public function getEndereco(): string
    {
        return $this->endereco;
    }
    public function setEndereco($endereco): void
    {
        $this->endereco = $endereco;
    }
}
