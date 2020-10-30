<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as Capsule;


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

$app = AppFactory::create();
$app->setBasePath("/clubdepv3/api");
$app->addErrorMiddleware(true, false, false);

$app->get('/', function (Request $request, Response $response, array $args) {
    
    $response->getBody()->write("Hello, world");
    return $response;
});
$app->get('/users', function (Request $request, Response $response, array $args) {
    $user = Capsule::table("Usuarios")->get();
    $response->getBody()->write(print_r($user, true));
    return $response;
});

$app->run();