<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MotListe
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\MotListeRepository")
 */
class MotListe
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
     * @ORM\Column(name="mot", type="string", length=255)
     */
    private $mot;


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
     * Set mot
     *
     * @param string $mot
     * @return MotListe
     */
    public function setMot($mot)
    {
        $this->mot = $mot;

        return $this;
    }

    /**
     * Get mot
     *
     * @return string 
     */
    public function getMot()
    {
        return $this->mot;
    }
}
