<?php

require_once __DIR__ . '/vendor/autoload.php';

use ApiSilex\Service\ClientService;
use ApiSilex\Model\ClientModel;
use ApiSilex\Mapper\ClientMapper;

$app = new Silex\Application();

$app['debug'] = true;

$app['clientService'] = function() {

    $clientModel = new ClientModel();
    $clientMapper = new ClientMapper();

    return $clientService = new ClientService($clientModel, $clientMapper);
};

$app->get('/', function() use($app) {

    $clientes = array(
        [
            'nome' => 'Usuario 1',
            'email' => 'usuario1@email.com.br',
            'cnpj' => '213123123123'
        ],
        [
            'nome' => 'Usuario 2',
            'email' => 'usuario2@email.com.br',
            'cnpj' => '31231241341'
        ],
        [
            'nome' => 'Usuario 3',
            'email' => 'usuario3@email.com.br',
            'cnpj' => '12312321312321'
        ]
    );

    return $app->json($clientes);
});

$app->get('/clientes', function() use($app) {

    $dados['nome'] = 'Cliente Nome';
    $dados['email'] = 'cliente@email.com';

    $result = $app['clientService']->insert($dados);

    return $app->json($result);

});
