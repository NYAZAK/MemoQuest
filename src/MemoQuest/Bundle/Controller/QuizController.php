<?php

namespace MemoQuest\Bundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use MemoQuest\Bundle\Entity\Quiz;
use MemoQuest\Bundle\Form\UserType;

class QuizController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Collection get action
     * @var Request $request
     * @return array
     *
     * @Rest\View()
     */
    public function cgetAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MemoQuestBundle:Quiz')->findAll();

        return ($entities);
    }

    /**
     * Get action
     * @var integer $id login of the entity
     * @return array
     *
     * @Rest\View()
     */
    public function getAction($id)
    {
        $em = $this->getDoctrine()->getManager();
    	
        $entity = $em->getRepository('MemoQuestBundle:Quiz')->findOneBy(
            array(
                'id' => $id,
            )
        );
        
        return array(
            'entity' => $entity,
        );
    }
}