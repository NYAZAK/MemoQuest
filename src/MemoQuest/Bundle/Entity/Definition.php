<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Definition
 *
 * @ORM\Table(name="MQ_DEFINITION")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\DefinitionRepository")
 */
class Definition
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
     * @ORM\Column(name="DEFINITION", type="string", length=255)
     */
    private $definition;

	/**
	 * @var datetime $created
	 *
	 * @ORM\Column(name="CREATED", type="datetime")
	 */
	private $created;

	/**
	 * @var integer $createdBy
	 *
	 * @ORM\Column(name="CREATED_BY", type="integer")
	 */
	private $createdBy;

	/**
	 * @var datetime $updated
	 *
	 * @ORM\Column(name="UPDATED", type="datetime")
	 */
	private $updated;

	/**
	 * @var integer $updatedBy
	 *
	 * @ORM\Column(name="UPDATED_BY", type="integer")
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

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Definition
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Definition
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Definition
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set updatedBy
     *
     * @param integer $updatedBy
     * @return Definition
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return integer 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }
}
