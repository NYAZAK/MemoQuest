<?php

namespace MemoQuest\Bundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\HttpFoundation\Request;
use MemoQuest\Bundle\Entity\Liste;
use MemoQuest\Bundle\Entity\MotListe;
use MemoQuest\Bundle\Form\MotListeType;

class MotListeController extends FOSRestController implements ClassResourceInterface
{
    /**
     * Collection get action
     * @var Request $request
     * @var integer $userId Id of the entity's user
     * @var integer $listeId Id of the entity's liste
     * @return array
     *
     * @Rest\View()
     */
    public function cgetAction(Request $request, $userId, $listeId)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MemoQuestBundle:MotListe')->findBy(
            array(
                'liste' => $listeId,
            )
        );

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Get action
     * @var integer $userId Id of the entity's user
     * @var integer $listeId Id of the entity's liste
     * @var integer $id Id of the entity
     * @return array
     *
     * @Rest\View()
     */
    public function getAction($userId, $listeId, $id)
    {
        $entity = $this->getEntity($listeId, $id);

        return array(
            'entity' => $entity,
        );
    }

    /**
     * Collection post action
     * @var Request $request
     * @var integer $userId Id of the entity's user
     * @var integer $listeId Id of the entity's liste
     * @return View|array
     */
    public function cpostAction(Request $request, $userId, $listeId)
    {
        $liste = $this->getListe($listeId);
        $entity = new MotListe();
        $entity->setListe($liste);
        $form = $this->createForm(new MotListeType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirectView(
                $this->generateUrl(
                    'get_user_liste_mot',
                    array(
                        'userId' => $entity->getListe()->getOwner()->getId(),
                        'listeId' => $entity->getListe()->getId(),
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
     * @var integer $listeId Id of the entity's liste
     * @var integer $id Id of the entity
     * @return View|array
     */
    public function putAction(Request $request, $userId, $listeId, $id)
    {
        $entity = $this->getEntity($listeId, $id);
        $form = $this->createForm(new MotListeType(), $entity);
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
    public function deleteAction($userId, $listeId, $id)
    {
        $entity = $this->getEntity($listeId, $id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($entity);
        $em->flush();

        return $this->view(null, Codes::HTTP_NO_CONTENT);
    }

    /**
     * Get entity instance
     * @var integer $listeId Id of the entity's liste
     * @var integer $id Id of the entity
     * @return MotListe
     */
    protected function getEntity($listeId, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MemoQuestBundle:MotListe')->findOneBy(
            array(
                'id' => $id,
                'liste' => $listeId,
            )
        );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find liste entity');
        }

        return $entity;
    }

    /**
     * Get user instance
     * @var integer $id Id of the liste
     * @return Liste
     */
    protected function getListe($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MemoQuestBundle:Liste')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find liste entity');
        }

        return $entity;
    }
}