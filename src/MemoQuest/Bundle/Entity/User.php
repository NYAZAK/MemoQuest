<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * User
 *
 * @ORM\Table(name="MQ_USER")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @ExclusionPolicy("all")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ROW_ID", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Expose
     */
    private $id;

	/**
     * @var string
     *
     * @ORM\Column(name="LAST_NAME", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     * @Expose
     */
    private $lastName;

	/**
     * @var string
     *
     * @ORM\Column(name="FIRST_NAME", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     * @Expose
     */
    private $firstName;

	/**
     * @var integer
     *
     * @ORM\Column(name="ROLE", type="integer")
     *
     * @Constraints\NotNull
     * @Expose
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="EMAIL", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     * @Expose
     */
    private $email;

	/**
     * @var string
     *
     * @ORM\Column(name="LOGIN", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     * @Expose
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="PASSWORD", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     */
    private $password;

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
     * @ORM\OneToMany(targetEntity="Quiz", mappedBy="owner", cascade={"remove", "persist"})
     */
    private $quiz;

	/**
     * @ManyToMany(targetEntity="UsersGroup")
     * @JoinTable(name="MQ_GROUP_USER",
     *      joinColumns={@JoinColumn(name="USER_ID", referencedColumnName="ROW_ID")},
     *      inverseJoinColumns={@JoinColumn(name="GROUP_ID", referencedColumnName="ROW_ID")}
     *      )
     **/
     private $groups;

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
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->quiz = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
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
     * @return User
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
     * @return User
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
     * @return User
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
    
    /**
 	 * @ORM\PrePersist
 	 */
	public function setCreatedValue()
	{
    	$this->created = new \DateTime();
    	$this->updated = new \DateTime();
	}
	
	/**
 	 * @ORM\PreUpdate
 	 */
	public function setUpdatedValue()
	{
    	$this->updated = new \DateTime();
	}
}
