<?php

namespace ApiSilex\Service;

use ApiSilex\Model\ClientModel;
use ApiSilex\Mapper\ClientMapper;

class ClientService
{
    private $client;
    private $clientMapper;

    public function __construct(ClientModel $client, ClientMapper $clientMapper)
    {
        $this->client = $client;
        $this->clientMapper = $clientMapper;
    }

    public function insert(array $data)
    {
        $clientModel = $this->client;
        $clientModel->setNome($data['nome']);
        $clientModel->setEmail($data['email']);

        $mapper = $this->clientMapper;
        $result = $mapper->insert($clientModel);

        return $result;
    }

    public function fetchAll()
    {
        return $this->clientMapper->fetchAll();
    }

    public function findID($id)
    {
        return $this->clientMapper->findID($id);
    }

    public function update($id, array $array)
    {
        return $this->clientMapper->update($id, $array);
    }

    public function delete($id)
    {
        return 'sucess delete';
    }
}
