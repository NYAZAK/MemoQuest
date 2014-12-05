<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;

/**
 * QuizContent
 *
 * @ORM\Table(name="MQ_QUIZZ_CONTENT")
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\QuizContentRepository")
 */
class QuizContent
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
     * @ORM\ManyToOne(targetEntity="Quiz")
     * @ORM\JoinColumn(name="QUIZ_ID", referencedColumnName="ROW_ID")
     **/
	private $quiz;

    /**
     * @var integer
     *
     * @ORM\Column(name="QUESTION_TYPE", type="integer")
     */
    private $questionType;

    /**
     * @var string
     *
     * @ORM\Column(name="QUESTION", type="string", length=255)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="ANSWER_A", type="string", length=255)
     */
    private $answerA;

    /**
     * @var string
     *
     * @ORM\Column(name="ANSWER_B", type="string", length=255)
     */
    private $answerB;

    /**
     * @var string
     *
     * @ORM\Column(name="ANSWER_C", type="string", length=255)
     */
    private $answerC;

    /**
     * @var string
     *
     * @ORM\Column(name="ANSWER_D", type="string", length=255)
     */
    private $answerD;

    /**
     * @var string
     *
     * @ORM\Column(name="SOLUTION", type="string", length=255)
     */
    private $solution;

	/**
     * @ORM\ManyToOne(targetEntity="Quiz")
     * @ORM\JoinColumn(name="QUIZ_ID", referencedColumnName="ROW_ID")
     **/
	private $skill;

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
     * Set questionType
     *
     * @param integer $questionType
     * @return QuizContent
     */
    public function setQuestionType($questionType)
    {
        $this->questionType = $questionType;

        return $this;
    }

    /**
     * Get questionType
     *
     * @return integer 
     */
    public function getQuestionType()
    {
        return $this->questionType;
    }

    /**
     * Set question
     *
     * @param string $question
     * @return QuizContent
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set answerA
     *
     * @param string $answerA
     * @return QuizContent
     */
    public function setAnswerA($answerA)
    {
        $this->answerA = $answerA;

        return $this;
    }

    /**
     * Get answerA
     *
     * @return string 
     */
    public function getAnswerA()
    {
        return $this->answerA;
    }

    /**
     * Set answerB
     *
     * @param string $answerB
     * @return QuizContent
     */
    public function setAnswerB($answerB)
    {
        $this->answerB = $answerB;

        return $this;
    }

    /**
     * Get answerB
     *
     * @return string 
     */
    public function getAnswerB()
    {
        return $this->answerB;
    }

    /**
     * Set answerC
     *
     * @param string $answerC
     * @return QuizContent
     */
    public function setAnswerC($answerC)
    {
        $this->answerC = $answerC;

        return $this;
    }

    /**
     * Get answerC
     *
     * @return string 
     */
    public function getAnswerC()
    {
        return $this->answerC;
    }

    /**
     * Set answerD
     *
     * @param string $answerD
     * @return QuizContent
     */
    public function setAnswerD($answerD)
    {
        $this->answerD = $answerD;

        return $this;
    }

    /**
     * Get answerD
     *
     * @return string 
     */
    public function getAnswerD()
    {
        return $this->answerD;
    }

    /**
     * Set solution
     *
     * @param string $solution
     * @return QuizContent
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;

        return $this;
    }

    /**
     * Get solution
     *
     * @return string 
     */
    public function getSolution()
    {
        return $this->solution;
    }
}
