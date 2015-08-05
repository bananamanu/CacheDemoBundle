<?php

namespace Bananamanu\CacheDemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BananamanuCacheDemoBundle:Default:index.html.twig', array('name' => $name));
    }
}
