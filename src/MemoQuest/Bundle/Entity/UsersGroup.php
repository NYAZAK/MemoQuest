<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * UsersGroup
 *
 * @ORM\Table(name="MQ_GROUP")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\UsersGroupRepository")
 */
class UsersGroup
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
     * @ORM\Column(name="NAME", type="string", length=255)
     */
    private $name;

	/**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
     **/
    private $members;

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
	private $createdBy = 0;

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
	private $updatedBy = 0;

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
     * Set name
     *
     * @param string $name
     * @return UsersGroup
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
