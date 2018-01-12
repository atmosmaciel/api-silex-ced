<?php

namespace ApiSilex\Mapper;

use ApiSilex\Model\ClientModel;

/**
 * This class contains the logic that simulates the insertion of data in the database
 */
class ClientMapper
{

    private $dados = [

        0 => [
            'id' => 0,
            'nome' => "Cliente0",
            'email' => "cliente1@email.com"
        ],

        1 => [
            'id' => 1,
            'nome' => "Cliente1",
            'email' => "cliente2@email.com"
        ],

        2 => [
            'id' => 2,
            'nome' => "Cliente2",
            'email' => "cliente1@email.com"
        ]

    ];

    public function insert(ClientModel $client)
    {
        return [
            'nome' => 'Cliente X',
            'email' => 'user@email.com'
        ];
    }

    public function fetchAll()
    {
        return $this->dados;
    }

    public function findID($id)
    {
        return $this->dados[$id];
    }

    public function update($id, array $array)
    {
        return [
            'sucesse' => true
        ];
    }
}
