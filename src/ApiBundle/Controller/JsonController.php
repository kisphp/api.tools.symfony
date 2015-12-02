<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class JsonController extends ApiController
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
    protected function serializeAction(Request $request)
    {
        return [];
    }
}
