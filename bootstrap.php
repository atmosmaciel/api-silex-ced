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
            'nome' => 'Leandro',
            'email' => 'leandro@leandro.com',
            'cnpj' => '213123123123'
        ],
        [
            'nome' => 'Gabriela',
            'email' => 'gabriela@leandro.com',
            'cnpj' => '31231241341'
        ],
        [
            'nome' => 'Gillearde',
            'email' => 'gillearde@gillearde.com',
            'cnpj' => '12312321312321'
        ],
    );

    return $app->json($clientes);
});

$app->get('/clientes', function() use($app) {

    $dados['nome'] = 'Cliente Nome';
    $dados['email'] = 'cliente@email.com';

    $result = $app['clientService']->insert($dados);

    return $app->json($result);

});
