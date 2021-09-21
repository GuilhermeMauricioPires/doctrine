<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEnityManager();

$repoAluno = $entityManager->getRepository(Aluno::class);
/** @var Aluno[] $listaAluno */
$listaAluno = $repoAluno->findAll();

foreach ($listaAluno as $aluno) {
    $strTelefones = '';
    if (count($aluno->getTelefones()) > 0) {
        $telefone = $aluno->getTelefones()->map(function (Telefone $telefone) {
            return $telefone->getNumero();
        })->toArray();
        $strTelefones = "| Telefones: " . implode(', ', $telefone);
    }
    echo "ID: {$aluno->getId()} | Nome: {$aluno->getNome()} $strTelefones " . PHP_EOL;
}