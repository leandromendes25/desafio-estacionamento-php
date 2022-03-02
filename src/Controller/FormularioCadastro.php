<?php

namespace Leandro\Estacionamento\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class FormularioCadastro extends ControllerHtml implements RequestHandlerInterface
{

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderHtml('usuario/formularioCadastro.php',[
            'titulo' => 'Cadastro'
        ]);
        return new Response(302,[],$html);
    }
}