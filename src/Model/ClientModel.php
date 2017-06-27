<?php

namespace ApiSilex\Model;

class ClientModel
{
    private $nome;
    private $email;

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        return $this->email;
    }
}
