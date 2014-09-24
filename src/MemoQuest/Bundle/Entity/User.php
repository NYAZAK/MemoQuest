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
     * @ORM\Column(name="PASSWORD", type="string", length=255)
     *
     * @Constraints\NotNull
     * @Constraints\NotBlank
     */
    private $password;

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
