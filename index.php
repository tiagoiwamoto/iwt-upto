<?php
/**
 * Created by: tiago
 * Email: tiago.iwamoto@gmail.com
 * Linkedin: https://www.linkedin.com/in/tiago-iwamoto/
 * Created at: 15/05/2021 - 13:01
 */


/*
Importando arquivos de configuracao
*/
require __DIR__ . '/vendor/autoload.php';

/*
 *  Slim app
 */

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

$app = new App([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

/*
 * Definindo timezone para o padrão Brasileiro
 * */
date_default_timezone_set('America/Sao_Paulo');

/*
 * Pegando o Slim/app
 */
$container = $app->getContainer();

require_once 'services.php';

//$app->get('/', function (Request $request, Response $response, $args) {
//    $date = new DateTime();
//    $data = [
//        'code' => '0',
//        'message' => 'Tudo Ok',
//        'details' => [],
//        'timestamp' => $date->format('Y-md H:i:s'),
//        'protocol' => md5(uniqid(rand(), true))
//    ];
//
//    return json_encode($data);
//});

$app->get('/', 'user-controller:index');
$app->get('/users', 'user-controller:recoverUsers');
$app->post('/users/create', 'user-controller:create');
$app->post('/users/login', 'user-controller:authenticate');
$app->post('/image/upload', 'user-controller:upload');
$app->get('/images', 'user-controller:recoverUserImages');

$app->run();
