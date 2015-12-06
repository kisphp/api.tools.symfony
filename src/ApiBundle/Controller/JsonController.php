<?php

namespace ApiBundle\Controller;

use ApiBundle\Form\JsonForm;
use ApiBundle\Manager\JsonManager;
use ApiBundle\Transfer\ApiFormTransfer;
use ApiBundle\Transfer\ResultTransfer;
use ApiBundle\Transformer\PhpTransformer;
use ApiBundle\Transformer\XmlTransformer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Form\FormInterface;
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
        $form = $this->createForm(JsonForm::class);
        $form->handleRequest($request);

        $result = new ResultTransfer();
        if ($form->isValid()) {
            $jsonManager = $this->createDataManager($form);

            $transformer = new PhpTransformer();
            $result->setResult($transformer->transform($jsonManager));
        }

        return [
            'form' => $form->createView(),
            'result' => $result->getResult(),
        ];
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    protected function xmlAction(Request $request)
    {
        $form = $this->createForm(JsonForm::class);
        $form->handleRequest($request);

        $result = new ResultTransfer();
        if ($form->isValid()) {
            $jsonManager = $this->createDataManager($form);

            $transformer = new XmlTransformer();
            $result->setResult($transformer->transform($jsonManager));
        }

        return [
            'form' => $form->createView(),
            'result' => $result->getResult(),
        ];
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

    /**
     * @param FormInterface $form
     *
     * @return JsonManager
     */
    protected function createDataManager(FormInterface $form)
    {
        $jsonManager = new JsonManager();
        $jsonManager->transform($form->getData());

        return $jsonManager;
    }
}
