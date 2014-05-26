<?php

namespace BW\SkeletonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BWSkeletonBundle:Default:index.html.twig', array('name' => $name));
    }
}
