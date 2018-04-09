<?php

require 'bootstrap.php';

use ApiSilex\Service\ClientService;
use ApiSilex\Model\ClientModel;
use ApiSilex\Mapper\ClientMapper;
use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

$app['debug'] = true;

// Habilitando configuracoes de erro
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$app['clientService'] = function () {
    $clientModel = new ClientModel();
    $clientMapper = new ClientMapper();

    return $clientService = new ClientService($clientModel, $clientMapper);
};

$app->get('/', function () use ($app) {
    $clientes = [
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
    ];

    return $app->json($clientes);
});

$app->get('/clientes', function () use ($app) {
    $dados['nome'] = 'Cliente Nome';
    $dados['email'] = 'cliente@email.com';

    $result = $app['clientService']->insert($dados);

    return $app->json($result);
});

$app->get('/api/clientes', function () use ($app) {
    $dados = $app['clientService']->fetchAll();
    return $app->json($dados);
});

$app->get('/api/clientes/{id}', function ($id) use ($app) {
    $dados = $app['clientService']->findID($id);
    return $app->json($dados);
});

$app->post('/api/clientes', function (Request $request) use ($app) {
    $dados['nome'] = $request->get('nome');
    $dados['email'] = $request->get('email');

    $result = $app['clientService']->insert($dados);

    return $app->json($result);
});

$app->put('/api/clientes/{id}', function ($id, Request $request) use ($app) {
    $data['nome'] = $request->get('nome');
    $data['email'] = $request->get('email');

    $dados = $app['clientService']->update($id, $data);

    return $app->json($dados);
});

$app->delete('/api/clientes/{id}', function ($id) use ($app) {
    $dados = $app['clientService']->delete($id);
    return $app->json($dados);
});
