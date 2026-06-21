<?php

class Condutores
{
    private $id;
    private $nome;
    private $telefone;
    private $email;
    private $placa;
    private $senha;
    private $statusCadastro;
    private $statusApp;
    private $dtCadastro;

    public function getId() { return $this->id; }
    public function getNome() { return $this->nome; }
    public function getTelefone() { return $this->telefone; }
    public function getEmail() { return $this->email; }
    public function getPlaca() { return $this->placa; }
    public function getSenha() { return $this->senha; }
    public function getStatusCadastro() { return $this->statusCadastro; }
    public function getStatusApp() { return $this->statusApp; }
    public function getDtCadastro() { return $this->dtCadastro; }

    public function setId($id): void { $this->id = $id; }
    public function setNome($nome): void { $this->nome = $nome; }
    public function setTelefone($telefone): void { $this->telefone = $telefone; }
    public function setEmail($email): void { $this->email = $email; }
    public function setPlaca($placa): void { $this->placa = $placa; }
    public function setSenha($senha): void { $this->senha = $senha; }
    public function setStatusCadastro($statusCadastro): void { $this->statusCadastro = $statusCadastro; }
    public function setStatusApp($statusApp): void { $this->statusApp = $statusApp; }
    public function setDtCadastro($dtCadastro): void { $this->dtCadastro = $dtCadastro; }
}

