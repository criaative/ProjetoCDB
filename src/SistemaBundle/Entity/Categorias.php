<?php

namespace SistemaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Categorias
 *
 * @ORM\Table(name="categorias")
 * @ORM\Entity(repositoryClass="SistemaBundle\Repository\CategoriasRepository")
 */
class Categorias
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255)
     */
    private $nome;  

    /**
     * @ORM\OneToMany(targetEntity="Produtos", mappedBy="categorias")
     */
    private $produtos;

    public function __construct()
    {
        $this->produtos = new ArrayCollection();
    }
    

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Categorias
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Add produto
     *
     * @param \SistemaBundle\Entity\Produtos $produto
     *
     * @return Categorias
     */
    public function addProduto(\SistemaBundle\Entity\Produtos $produto)
    {
        $this->produtos[] = $produto;

        return $this;
    }

    /**
     * Remove produto
     *
     * @param \SistemaBundle\Entity\Produtos $produto
     */
    public function removeProduto(\SistemaBundle\Entity\Produtos $produto)
    {
        $this->produtos->removeElement($produto);
    }

    /**
     * Get produtos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProdutos()
    {
        return $this->produtos;
    }
    
    public function __toString() 
    {
        return $this->id .'-'. $this->nome;
    }
}
