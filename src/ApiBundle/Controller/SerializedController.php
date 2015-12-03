<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class SerializedController extends ApiController
{

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function phpAction(Request $request)
    {
        return [];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function xmlAction(Request $request)
    {
        return [];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function jsonAction(Request $request)
    {
        return [];
    }
}
