<?php

namespace MemoQuest\Bundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use MemoQuest\Bundle\Entity\Quiz;
use MemoQuest\Bundle\Entity\QuizContent;
use MemoQuest\Bundle\Form\UserType;

class QuizContentController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Collection get action
     * @var Request $request
     * @return array
     *
     * @Rest\View()
     */
    public function cgetAction(Request $request, $quizId)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MemoQuestBundle:Quiz')->findBy(
        	array(
                'quiz' => $quizId,
            )
        );

        return array(
            'entities' => $entities,
        );
    }
}