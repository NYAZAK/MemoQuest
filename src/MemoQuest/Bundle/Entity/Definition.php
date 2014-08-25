<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Definition
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\DefinitionRepository")
 */
class Definition
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="definition", type="string", length=255)
     */
    private $definition;


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
     * Set definition
     *
     * @param string $definition
     * @return Definition
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return string 
     */
    public function getDefinition()
    {
        return $this->definition;
    }
}
