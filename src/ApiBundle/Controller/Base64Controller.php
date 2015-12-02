<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class Base64Controller extends ApiController
{

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function encodeAction(Request $request)
    {
        return [];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function decodeAction(Request $request)
    {
        return [];
    }
}
