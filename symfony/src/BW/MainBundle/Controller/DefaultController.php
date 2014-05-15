<?php

namespace BW\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BWMainBundle:Default:index.html.twig', array('name' => $name));
    }
}
