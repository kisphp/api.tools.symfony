<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class JsonController extends Controller
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request, $to)
    {
        $requiredAction = strtolower($to) . 'Action';

        if (method_exists($this, $requiredAction) && $requiredAction !== 'indexAction') {
            return $this->$requiredAction($request);
        }

        throw new \InvalidArgumentException(sprintf('Transform to %s not allowed', $to));
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function phpAction(Request $request)
    {
        return [];
    }
}
