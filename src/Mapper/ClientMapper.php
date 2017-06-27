<?php

namespace ApiSilex\Mapper;

use ApiSilex\Model\ClientModel;

class ClientMapper
{
    public function insert(ClientModel $client)
    {
        return [
            'nome' => 'Cliente X',
            'email' => 'user@email.com'
        ];
    }
}
