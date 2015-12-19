<?php

namespace ApiBundle\Controller;

use ApiBundle\Form\JsonForm;
use ApiBundle\Manager\JsonManager;
use ApiBundle\Transfer\ResultTransfer;
use ApiBundle\Transformer\FactoryTransformer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class ConvertController extends ApiController
{
    /**
     * @param Request $request
     * @param string $to
     *
     * @return array
     */
    public function indexAction(Request $request, $to)
    {
        return [];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function jsonAction(Request $request)
    {
        $form = $this->createForm(JsonForm::class)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            $jsonManager = new JsonManager();
            $jsonManager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $jsonManager);

            $result->setResult($response);
        }

        return [
            'form' => $form->createView(),
            'result' => $result->getResult(),
        ];
    }
}
