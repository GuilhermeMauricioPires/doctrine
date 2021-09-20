<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEnityManager();

$id = $argv[1];
$nome = $argv[2];

$aluno = $entityManager->find(Aluno::class, $id);

if ($aluno) {
    $aluno->definirNomeAluno($nome);
    $entityManager->flush();
} else {
    echo "Aluno Id $id não encontrado";
}
