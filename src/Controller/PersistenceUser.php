<?php

namespace Leandro\Estacionamento\Controller;

use Leandro\Estacionamento\Entity\Usuario;
use Leandro\Estacionamento\Helper\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class PersistenceUser implements RequestHandlerInterface
{
    /**
     * @var EntityManagerFactory
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerFactory())->getEntityManager();
    }
    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
    $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);
    $usuarioRepository = $this->entityManager->createQuery('SELECT email FROM usuario where email = $email');
    if(is_null($email) || $email === false || $usuarioRepository === true){
        return new Response(302,['Location' => '/cadastrar']);
    }
    $usuario = new Usuario();
    $usuario->setEmail($email);
    $usuario->setSenha($senha);
    $this->entityManager->persist($usuario);
    $_SESSION['logado'] = true;
    $_SESSION['email'] = $usuario->getEmail();
    $this->entityManager->flush();
        return New Response(200,['Location' => '/listarOpcoes']);
    }

}