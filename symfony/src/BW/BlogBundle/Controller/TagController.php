<?php

namespace BW\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TagController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BWBlogBundle:Default:index.html.twig', array('name' => $name));
    }
}
