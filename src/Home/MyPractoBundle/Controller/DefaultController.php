<?php

namespace Home\MyPractoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HomeMyPractoBundle:Default:index.html.twig', array('name' => $name));
    }
}
