<?php
require __DIR__ . '/../vendor/autoload.php';

use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7Server\ServerRequestCreator;

use Psr\Http\Server\RequestHandlerInterface;

// PSR15

$caminho = @$_SERVER['REQUEST_URI'];
$rotas = require __DIR__ . '/../config/routes.php';
if (!array_key_exists($caminho, $rotas)) {
    http_response_code(404);
    exit();
}

session_start();//importante para sistema de login
//que é o que permite trabalharmos com as variaveis de $_SESSION
#stripos -> método verificar se no $caminho existe login
$psr17Factory = new Psr17Factory();
$creator = new ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UrlFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory // StreamFactory
);
if($_SESSION['logado']){

}
$request = $creator->fromGlobals();

$classeControladora = $rotas[$caminho];
/** @var RequestHandlerInterface $controlador */
$controlador = new $classeControladora();
$resposta = $controlador->handle($request);

// pegar os cabeçalhos
foreach ($resposta->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}
// pegar o corpo da pagina
echo $resposta->getBody();
