<?php

namespace MemoQuest\Bundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use MemoQuest\Bundle\Entity\User;
use MemoQuest\Bundle\Entity\Liste;
use MemoQuest\Bundle\Form\ListeType;

class ListeController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Collection get action
     * @var Request $request
     * @var integer $userId Id of the entity's user
     * @return array
     *
     * @Rest\View()
     */
    public function cgetAction(Request $request, $userId)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MemoQuestBundle:Liste')->findBy(
            array(
                'owner' => $userId,
            )
        );

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Get action
     * @var integer $userId Id of the entity's user
     * @var integer $id Id of the entity
     * @return array
     *
     * @Rest\View()
     */
    public function getAction($userId, $id)
    {
        $entity = $this->getEntity($userId, $id);

        return array(
            'entity' => $entity,
        );
    }

    /**
     * Collection post action
     * @var Request $request
     * @var integer $userId Id of the entity's user
     * @return View|array
     */
    public function cpostAction(Request $request, $userId)
    {
        $user = $this->getMQUser($userId);
        $entity = new Liste();
        $entity->setOwner($user);
        $form = $this->createForm(new ListeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
//'userId' => $entity->getOwner()->getId()
            return $this->redirectView(
                $this->generateUrl(
                    'get_user_liste',
                    array(
                        'userId' => var_dump($entity->getOwner()),
                        'id' => $entity->getId()
                    )
                ),
                Codes::HTTP_CREATED
            );
        }

        return array(
            'form' => $form,
        );
    }

    /**
     * Put action
     * @var Request $request
     * @var integer $userId Id of the entity's user
     * @var integer $id Id of the entity
     * @return View|array
     */
    public function putAction(Request $request, $userId, $id)
    {
        $entity = $this->getEntity($userId, $id);
        $form = $this->createForm(new ListeType(), $entity);
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
    }

    /**
     * Delete action
     * @var integer $userId Id of the entity's user
     * @var integer $id Id of the entity
     * @return View
     */
    public function deleteAction($userId, $id)
    {
        $entity = $this->getEntity($userId, $id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return $this->view(null, Codes::HTTP_NO_CONTENT);
    }

    /**
     * Get entity instance
     * @var integer $userId Id of the entity's user
     * @var integer $id Id of the entity
     * @return Liste
     */
    protected function getEntity($userId, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MemoQuestBundle:Liste')->findOneBy(
            array(
                'id' => $id,
                'owner' => $userId,
            )
        );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find user entity');
        }

        return $entity;
    }

    /**
     * Get user instance
     * @var integer $id Id of the user
     * @return User
     */
    protected function getMQUser($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MemoQuestBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find user entity');
        }

        return $entity;
    }
}