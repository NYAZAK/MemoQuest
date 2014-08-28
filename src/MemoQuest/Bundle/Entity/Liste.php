<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Liste
 *
 * @ORM\Table(name="MQ_LISTE")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\ListeRepository")
 *
 * @ExclusionPolicy("all")
 */
class Liste
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ROW_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * * @Expose
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     * @Expose
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="THEME", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     * @Expose
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="CATEGORY", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     * @Expose
     */
    private $category;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="listes", cascade={"persist"})
     * @ORM\JoinColumn(name="USER_ID", referencedColumnName="ROW_ID")
     */
	private $owner;
	
	/**
     * @ORM\OneToMany(targetEntity="MotListe", mappedBy="liste", cascade={"persist"})
     */
    private $mots;
    
    /**
     * @ORM\OneToMany(targetEntity="Evaluation", mappedBy="liste", cascade={"persist"})
     */
    private $evaluations;


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
     * @return Liste
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
     * Set theme
     *
     * @param string $theme
     * @return Liste
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set category
     *
     * @param string $category
     * @return Liste
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mots = new \Doctrine\Common\Collections\ArrayCollection();
        $this->evaluations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set owner
     *
     * @param \MemoQuest\Bundle\Entity\User $owner
     * @return Liste
     */
    public function setOwner(\MemoQuest\Bundle\Entity\User $owner = null)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return \MemoQuest\Bundle\Entity\User 
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Add mots
     *
     * @param \MemoQuest\Bundle\Entity\MotListe $mots
     * @return Liste
     */
    public function addMot(\MemoQuest\Bundle\Entity\MotListe $mots)
    {
        $this->mots[] = $mots;

        return $this;
    }

    /**
     * Remove mots
     *
     * @param \MemoQuest\Bundle\Entity\MotListe $mots
     */
    public function removeMot(\MemoQuest\Bundle\Entity\MotListe $mots)
    {
        $this->mots->removeElement($mots);
    }

    /**
     * Get mots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMots()
    {
        return $this->mots;
    }

    /**
     * Add evaluations
     *
     * @param \MemoQuest\Bundle\Entity\Evaluation $evaluations
     * @return Liste
     */
    public function addEvaluation(\MemoQuest\Bundle\Entity\Evaluation $evaluations)
    {
        $this->evaluations[] = $evaluations;

        return $this;
    }

    /**
     * Remove evaluations
     *
     * @param \MemoQuest\Bundle\Entity\Evaluation $evaluations
     */
    public function removeEvaluation(\MemoQuest\Bundle\Entity\Evaluation $evaluations)
    {
        $this->evaluations->removeElement($evaluations);
    }

    /**
     * Get evaluations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvaluations()
    {
        return $this->evaluations;
    }
}
