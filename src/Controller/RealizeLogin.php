<?php

namespace Leandro\Estacionamento\Controller;

use Doctrine\Persistence\ObjectRepository;
use Leandro\Estacionamento\Entity\Usuario;
use Leandro\Estacionamento\Helper\EntityManagerFactory;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class RealizeLogin implements RequestHandlerInterface
{
    /**
     * @var ObjectRepository
     */
    private $repositorioUsuarios;

    /**
     * @param ObjectRepository $repositorioUsuarios
     */
    public function __construct(ObjectRepository $repositorioUsuarios)
    {
        $entityManager = (new EntityManagerFactory())->getEntityManager();
        $this->repositorioUsuarios = $entityManager->getRepository(Usuario::class);
    }


    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
        $senha = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);

        if(is_null($email) || $email === false){
            return new Response(302,['Location' => '/login'],'');
        }
        $usuario = $this->repositorioUsuarios->findOneBy(['email' => $email]);#form -> classe
        if(is_null($usuario) || !$usuario->senhaEstaCorreta($senha)){
            return new Response(302,['Location' => '/login'],'');
        }#cria uma variavel de sessão logado e passamos valor true
        $_SESSION['logado'] = true;
        $_SESSION['email'] = $usuario->getEmail();
        return new Response(200,['Location:' =>'/'],'');
    }
}