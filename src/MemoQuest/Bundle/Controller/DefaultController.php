<?php

namespace MemoQuest\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MemoQuestBundle:Default:index.html.twig', array('name' => $name));
    }
}
