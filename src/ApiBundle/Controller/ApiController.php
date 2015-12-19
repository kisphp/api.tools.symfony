<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

abstract class ApiController extends Controller
{
    /**
     * @param Request $request
     * @param string $to
     *
     * @return mixed
     */
    abstract public function indexAction(Request $request, $to);
}
