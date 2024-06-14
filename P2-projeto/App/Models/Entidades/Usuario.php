<?php

namespace App\Models\Entidades;

class Usuario
{
    private int $idUsuario;
    private string $nome;
    private string $email;
    private string $username;
    private string $password;
    private string $data_cadastro;

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($id)
    {
        $this->idUsuario = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getData_cadastro() 
    {
        return $this->data_cadastro;
    }

    public function setData_Cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;
    }
}