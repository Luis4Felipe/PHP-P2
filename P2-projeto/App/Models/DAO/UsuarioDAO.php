<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public function getById ($idUsuario)
    {
        $resultado = $this->select("SELECT * FROM usuario WHERE idUsuario = $idUsuario");

        return $resultado->fetchObject(Usuario::class);
    }

    public function listar ()
    {
        $resultado = $this->select("SELECT * FROM usuario");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);
    }

    public  function salvar(Usuario $usuario) {
        try {
            $nome      = $usuario->getNome();
            $email     = $usuario->getEmail();
            $username  = $usuario->getUsername();
            $password  = $usuario->getPassword();

            return $this->insert(
                'usuario',
                ":nome, :email, :username, :password",
                [
                    ':nome'     =>$nome,
                    ':email'    =>$email,
                    ':username' =>$username,
                    ':password' =>$password
                ]
            );

        }catch (\Exception $e){
            throw new \Exception("Erro na gravação de dados.", 500);
        }
    }

    public function atualizar(Usuario $usuario)
    {
        try {

            $idUsuario         = $usuario->getIdUsuario();
            $nome       = $usuario->getNome();
            $email      = $usuario->getEmail();
            $username   = $usuario->getUsername();
            $password   = $usuario->getPassword();           

            return $this->update(
                'usuario', 
                "nome = :nome, email = :email, username = :username, password = :password", 
                
                [
                    ':idUsuario'       =>$idUsuario, 
                    ':nome'     =>$nome, 
                    ':email'    =>$email,
                    ':username' =>$username,
                    ':password' =>$password
                ], 
                "idUsuario = :idUsuario"
            );
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados." . $e->getMessage(), 500);
        }
    }

    public function atualizarPassword(Usuario $usuario)
    {
        try {

            $idUsuario         = $usuario->getIdUsuario();
            $password   = $usuario->getPassword();

            return $this->update(
                'usuario', 
                "password = :password", 
                
                [
                    ':idUsuario'       =>$idUsuario, 
                    ':password' =>$password
                ], 
                "idUsuario = :idUsuario"
            );
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados." . $e->getMessage(), 500);
        }
    }

    public function excluir (int $idUsuario)
    {
        try {

            return $this->delete('usuario', "idUsuario = $idUsuario");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o usuário." . $e->getMessage(), 500);
        }
    }

    public function autenticar($username, $password)
    {

        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE username = '$username'"
            );

            $usuario = $query->fetchObject(Usuario::class);

            if(!$usuario) { 
                return 0; 
            }

            if(!password_verify($password, $usuario->getPassword())) { 
                return 0; 
            }

            return $usuario->getIdUsuario();            

        }catch (\Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function verificaEmail($email)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE email = '$email'"
            );
            return $query->fetch();

        }catch (\Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function verificaUsuario($username)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE username = '$username'"
            );
            return $query->fetch();

        }catch (\Exception $e){
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
}