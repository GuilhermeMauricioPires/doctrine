<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @Entity
 */
class Aluno
{

    /**
     * @Id
     * @GeneratedValue
     * @Column (type="integer")
     */
    private $id;

    /**
     * @Column(type="string")
     */
    private $nome;

    /**
     * @OneToMany(targetEntity="Telefone", mappedBy="aluno", cascade={"remove", "persist"})
     */
    private $telefones;

    /**
     * Aluno constructor.
     * @param string $nome
     */
    public function __construct(string $nome)
    {
        $this->definirNomeAluno($nome);
        $this->telefones = new ArrayCollection();
    }

    /**
     * @param string $nome
     */
    public function definirNomeAluno(string $nome)
    {
        $this->nome = $nome;
    }

    /**
     * @param string $numero
     */
    public function adicionarTelefone(string $numero)
    {
        $telefone = new Telefone($numero, $this);
        $this->telefones->add($telefone);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return Collection
     */
    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

}