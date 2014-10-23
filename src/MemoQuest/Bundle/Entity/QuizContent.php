<?php

namespace MemoQuest\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuizContent
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="MemoQuest\Bundle\Entity\QuizContentRepository")
 */
class QuizContent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="questionType", type="integer")
     */
    private $questionType;

    /**
     * @var string
     *
     * @ORM\Column(name="question", type="string", length=255)
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="answerA", type="string", length=255)
     */
    private $answerA;

    /**
     * @var string
     *
     * @ORM\Column(name="answerB", type="string", length=255)
     */
    private $answerB;

    /**
     * @var string
     *
     * @ORM\Column(name="answerC", type="string", length=255)
     */
    private $answerC;

    /**
     * @var string
     *
     * @ORM\Column(name="answerD", type="string", length=255)
     */
    private $answerD;

    /**
     * @var string
     *
     * @ORM\Column(name="solution", type="string", length=255)
     */
    private $solution;


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
