<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table(name="MQ_EVALUATION")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\EvaluationRepository")
 */
class Evaluation
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
     * @var integer
     *
     * @ORM\Column(name="NOTE", type="integer")
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="COMMENT", type="string", length=255)
     */
    private $commentaire;
    
    /**
     * @ORM\ManyToOne(targetEntity="Liste", inversedBy="evaluations", cascade={"remove"})
     * @ORM\JoinColumn(name="LIST_ID", referencedColumnName="ROW_ID")
     */
	private $liste;


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
     * Set note
     *
     * @param integer $note
     * @return Evaluation
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     * @return Evaluation
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set liste
     *
     * @param \MemoQuest\Bundle\Entity\Liste $liste
     * @return Evaluation
     */
    public function setListe(\MemoQuest\Bundle\Entity\Liste $liste = null)
    {
        $this->liste = $liste;

        return $this;
    }

    /**
     * Get liste
     *
     * @return \MemoQuest\Bundle\Entity\Liste 
     */
    public function getListe()
    {
        return $this->liste;
    }
}
