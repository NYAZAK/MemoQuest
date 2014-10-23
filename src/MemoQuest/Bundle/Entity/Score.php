<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * Score
 *
 * @ORM\Table(name="MQ_SCORE")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\ScoreRepository")
 */
class Score
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
     * @ORM\Column(name="ACHIEVEMENT", type="integer")
     */
    private $achievement;

    /**
     * @var integer
     *
     * @ORM\Column(name="TIME", type="integer")
     */
    private $time;

	/**
     * @OneToOne(targetEntity="Quiz")
     * @JoinColumn(name="QUIZ_ID", referencedColumnName="ROW_ID")
     **/
    private $quiz;
    
    /**
     * @OneToOne(targetEntity="User")
     * @JoinColumn(name="USER_ID", referencedColumnName="ROW_ID")
     **/
    private $quiz;

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
     * Set achievement
     *
     * @param integer $achievement
     * @return Score
     */
    public function setAchievement($achievement)
    {
        $this->achievement = $achievement;

        return $this;
    }

    /**
     * Get achievement
     *
     * @return integer 
     */
    public function getAchievement()
    {
        return $this->achievement;
    }

    /**
     * Set time
     *
     * @param integer $time
     * @return Score
     */
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    }

    /**
     * Get time
     *
     * @return integer 
     */
    public function getTime()
    {
        return $this->time;
    }
}
