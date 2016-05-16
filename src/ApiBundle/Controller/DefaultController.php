<?php

namespace ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class DefaultController extends Controller
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $url = $request->request->get('url');
        $requestData = $request->request->get('request');

        return [
            'url' => $url,
            'request' => $requestData,
            'result' => 'aa',
            'post_array' => '',
        ];
    }
}
