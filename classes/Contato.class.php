<?php
require_once('Banco.class.php');

class Contato{
    // Atributos:
    public $id;
    public $nome;
    public $telefone;
    public $email;

    // Ações (super poderes da classe):
    public function Inserir(){
        $sql = "INSERT INTO contatos (nome, email, telefone) VALUES(?,?,?)";
        // Trabalhar com o banco:
        // Conectando:
        $banco = Banco::conectar();
        // Transformar a string em comando sql:
        $comando = $banco->prepare($sql);
        // Executar e subsitituir os coringas (?):
        $comando->execute(array($this->nome, $this->email, $this->telefone));
        // Desconectar do banco:
        Banco::desconectar();
    }
    public function Listar(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM contatos";
        $comando = $banco->prepare($sql);
        $comando->execute();
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    }

    public function Deletar(){
        $banco = Banco::conectar();
        $sql = "DELETE FROM contatos WHERE id = ?";
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->id));
        Banco::desconectar();
        // Retornar quantidade de linhas apagadas:
        return $comando->rowCount();
    }

    public function Atualizar(){
        $banco = Banco::conectar();
        $sql = "UPDATE contatos SET nome = ?, email = ?, telefone = ? WHERE id = ?";
        $banco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->nome, $this->email, $this->telefone, $this->id));
        Banco::desconectar();
        // Retornar quantidade de linhas apagadas:
        return $comando->rowCount();
    }
    
    public function BuscarPorID(){
        $banco = Banco::conectar();
        $sql = "SELECT * FROM contatos WHERE id = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($this->id));
        // "Salvar" o resultado da consulta (tabela) na $resultado
        $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
        Banco::desconectar();
        return $resultado;
    }

}


?>