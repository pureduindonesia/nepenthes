<?php

use App\Models\Departement;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Selective\BasePath\BasePathMiddleware;

require __DIR__ . '/vendor/autoload.php';


$app = AppFactory::create();
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->add(new BasePathMiddleware($app));
$app->addErrorMiddleware(true, true, true);


$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/cobe', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello semue!");
    return $response;
});


$app->post('/departement/add', function (Request $request, Response $response) {
    $req_departement = $request->getParsedBody();
    $departement = new Departement();
    $response->getBody()->write(json_encode($req_departement));
    return $response;
});




$app->run();
