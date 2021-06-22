<?php

use App\Controller\AppController;
use App\Middleware\JsonBodyParserMiddleware;
use Slim\Routing\RouteCollectorProxy;

$app->group('/api', function(RouteCollectorProxy $group) {
    $group->post('/categories', AppController::class . ':createCategory')
        ->add(new JsonBodyParserMiddleware());

    $group->put('/categories/{id}', AppController::class . ':updateCategory')
        ->add(new JsonBodyParserMiddleware());

    $group->post('/products', AppController::class . ':addProduct')
        ->add(new JsonBodyParserMiddleware());

    $group->post('/vendors', AppController::class . ':addVendor')
    ->add(new JsonBodyParserMiddleware());

    $group->put('/vendors/{id}', AppController::class . ':updateVendor')
        ->add(new JsonBodyParserMiddleware());
    
    $group->post('/purchases', AppController::class . ':addPurchase')
        ->add(new JsonBodyParserMiddleware());

    $group->post('/sales', AppController::class . ':addSale')
        ->add(new JsonBodyParserMiddleware());

    $group->get('/purchases', AppController::class . ':showPurchases');

    $group->get('/sales', AppController::class . ':showSales');

    $group->get('/products', AppController::class . ':showInventories');

});