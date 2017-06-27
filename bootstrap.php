<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();

$app['debug'] = true;

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
