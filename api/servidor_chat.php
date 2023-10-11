<?php

require __DIR__ . '/vendor/autoload.php';

use Api\Websocket\SistemaChat;
use Ratchet\Http\HttpServer;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;

$server = IoServer::factory(new HttpServer(new WsServer(new SistemaChat)), 8080);
$server->run();