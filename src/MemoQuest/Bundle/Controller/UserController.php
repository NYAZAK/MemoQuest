<?php

namespace MemoQuest\Bundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use MemoQuest\Bundle\Entity\User;
use MemoQuest\Bundle\Form\UserType;

class UserController extends FOSRestController implements ClassResourceInterface
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

        $entities = $em->getRepository('MemoQuestBundle:User')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Get action
     * @var integer $login login of the entity
     * @return array
     *
     * @Rest\View()
     */
    public function getAction($login)
    {
        $em = $this->getDoctrine()->getManager();
    	
        $entity = $em->getRepository('MemoQuestBundle:User')->findOneBy(
            array(
                'login' => $login,
            )
        );
        
        return array(
            'entity' => $entity,
        );
    }

	public function postAction(Request $request)
	{
		$em = $this->getDoctrine()->getManager();
		$login = $request->get("login");
		$password = $request->get("password");
		
		$user = $em->getRepository('MemoQuestBundle:User')->findBy(
        	array(
                'login' => $login,
            )
        );
		
		
		if ($user->id == $password)
			return ($this->view(null, Codes::HTTP_OK));
			
		return ($this->view(null, Codes::HTTP_FORBIDDEN));
	}

    /**
     * Get entity instance
     * @var $login login of the user
     * @return User
     */
    protected function getEntity($login)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MemoQuestBundle:User')->findBy(
        	array(
                'login' => $login,
            )
        );

        if (!$entity) {
            throw $this->createNotFoundException('User inexistant');
        }

        return $entity;
    }
    
    /**
     * Collection post action
     * @var Request $request
     * @return View|array
     */
  /*  public function cpostAction(Request $request)
    {
        $entity = new User();
        $form = $this->createForm(new UserType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->view(null, Codes::HTTP_CREATED);
        }

        return array(
            'form' => $form,
        );
    }*/
    
    /**
     * Put action
     * @var Request $request
     * @var integer $id Id of the entity
     * @return View|array
     */
    /*public function putAction(Request $request, $id)
    {
        $entity = $this->getEntity($id);
        $form = $this->createForm(new UserType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->view(null, Codes::HTTP_NO_CONTENT);
        }

        return array(
            'form' => $form,
        );
    }*/

    /**
     * Delete action
     * @var integer $id Id of the entity
     * @return View
     */
    /*public function deleteAction($id)
    {
        $entity = $this->getEntity($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return $this->view(null, Codes::HTTP_NO_CONTENT);
    }*/
}