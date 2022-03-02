<?php

namespace Leandro\Estacionamento\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     *
     */
    public function getEntityManager():EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration([
            $rootDir . '/src'],/*Tudo que estiver dentro src, se tiver anotações poderão ser geradas*/
        true#tudo aqui vai fazer a geração de entidades
        ); // modo desenvolmeito)
$connection = [
    'driver' => 'pdo_mysql',
    'host' => 'db',
    'dbname' => 'php',
    'user' => 'leandro',
    'password' => '1234',
    ];
return EntityManager::create($connection,$config);
    }
}