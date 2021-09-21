<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEnityManager();

$aluno = null;

for ($i = 1; $i < $argc; $i++){
    $param = $argv[$i];
    if($i === 1){
      $aluno = new Aluno($param);
    } else {
        $aluno->adicionarTelefone($param);
    }
}

$entityManager->persist($aluno);
$entityManager->flush();