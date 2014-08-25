<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="MQ_USER")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ROW_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="LAST_NAME", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="FIRST_NAME", type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity="Liste", mappedBy="owner", cascade={"remove", "persist"})
     */
    private $listes;

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
     * Set nom
     *
     * @param string $nom
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->listes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add listes
     *
     * @param \MemoQuest\Bundle\Entity\Liste $listes
     * @return User
     */
    public function addListe(\MemoQuest\Bundle\Entity\Liste $listes)
    {
        $this->listes[] = $listes;

        return $this;
    }

    /**
     * Remove listes
     *
     * @param \MemoQuest\Bundle\Entity\Liste $listes
     */
    public function removeListe(\MemoQuest\Bundle\Entity\Liste $listes)
    {
        $this->listes->removeElement($listes);
    }

    /**
     * Get listes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getListes()
    {
        return $this->listes;
    }
}
