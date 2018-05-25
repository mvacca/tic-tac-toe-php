<?php

use Slim\Http\Request;
use Slim\Http\Response;
use TicTacToe\Services\GameService;
// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    $this->logger->info("access root '/' route");
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->post('/api/makeMove', function (Request $request, Response $response, array $args) {
    $this->logger->info("called API");
    $data = $request->getParsedBody();
    $level = $data['level'];
    $name = $data['name'];
    $boardState = $data['boardState'];
    $playerUnit = $data['playerUnit'];
    $service = new GameService($name,$level);
    return $response->withJson($service->makeMove($boardState,$playerUnit));
});
