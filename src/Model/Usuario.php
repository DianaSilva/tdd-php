<?php
 
   namespace Diana\Apostas\Model;
   
   class Usuario {

    private $nome;
    private $cpf;
    private $email;

    public function getNome() { return $this->nome; }
    public function setNome($nome) { $this->nome = $nome; }

    public function getCpf() { return $this->cpf; }
    public function setCpf($cpf) { $this->cpf = $cpf; }

    public function getEmail() { return $this->email; }
    public function setEmail($email) { $this->email = $email; }

   }

