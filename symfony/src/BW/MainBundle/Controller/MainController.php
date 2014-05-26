<?php

namespace BW\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function homeAction()
    {
        return $this->render('BWMainBundle:Main:home.html.twig');
    }
}
