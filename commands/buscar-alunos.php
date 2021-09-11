<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEnityManager();

$repoAluno = $entityManager->getRepository(Aluno::class);
/** @var Aluno[] $listaAluno */
$listaAluno = $repoAluno->findAll();

foreach ($listaAluno as $aluno){
    echo "ID: {$aluno->getId()} | Nome: {$aluno->getNome()}" . PHP_EOL;
}