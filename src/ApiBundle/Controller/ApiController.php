<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class ApiController extends Controller
{
    const ACTION = 'Action';

    /**
     * @param Request $request
     * @param string $to
     *
     * @return mixed
     */
    public function indexAction(Request $request, $to)
    {
        $requiredAction = strtolower($to) . self::ACTION;

        if (method_exists($this, $requiredAction) && $requiredAction !== 'index' . self::ACTION) {
            return $this->$requiredAction($request);
        }

        throw new \InvalidArgumentException(sprintf('Transform to %s not allowed', $to));
    }
}
