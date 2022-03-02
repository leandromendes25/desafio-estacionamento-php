<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Leandro\Estacionamento\Helper\EntityManagerFactory;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerCreator = new EntityManagerFactory();
$entityManager = $entityManagerCreator->getEntityManager();
return ConsoleRunner::createHelperSet($entityManager);