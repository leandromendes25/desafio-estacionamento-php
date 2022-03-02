<?php

namespace Leandro\Estacionamento\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ListarOpcoes extends ControllerHtml implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderHtml('estacionamento/listarOpcoes.php',[

            ]);
        return new Response('302',[], $html);
    }
}