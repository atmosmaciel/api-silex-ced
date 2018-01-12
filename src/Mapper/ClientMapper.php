<?php

namespace ApiSilex\Mapper;

use ApiSilex\Model\ClientModel;

/**
 * This class contains the logic that simulates the insertion of data in the database
 */
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
