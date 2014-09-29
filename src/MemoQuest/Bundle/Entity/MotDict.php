<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MotDict
 *
 * @ORM\Table(name="MQ_MOT_DICT")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\MotDictRepository")
 */
class MotDict
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
     * @ORM\Column(name="MOT", type="string", length=255)
     */
    private $mot;

	/**
	 * @var datetime $created
	 *
	 * @ORM\Column(name="CREATED", type="datetime")
	 *
	 * @Expose
	 */
	private $created;

	/**
	 * @var integer $createdBy
	 *
	 * @ORM\Column(name="CREATED_BY", type="integer")
	 *
	 * @Expose
	 */
	private $createdBy;

	/**
	 * @var datetime $updated
	 *
	 * @ORM\Column(name="UPDATED", type="datetime")
	 *
	 * @Expose
	 */
	private $updated;

	/**
	 * @var integer $updatedBy
	 *
	 * @ORM\Column(name="UPDATED_BY", type="integer")
	 *
	 * @Expose
	 */
	private $updatedBy;

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
     * @return MotDict
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
