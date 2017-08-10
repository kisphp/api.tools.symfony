<?php

namespace ApiBundle\Controller;

use ApiBundle\Business\Factory;
use ApiBundle\Form\TextForm;
use ApiBundle\Transfer\ApiFormTransfer;
use ApiBundle\Transfer\TransferFactory;
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
        return [];
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function textAction(Request $request)
    {
        $defaultData = new ApiFormTransfer();
        $defaultData->setFromDecoder('Json');
        $defaultData->setToTransformer('Php');

        $form =$this->createForm(TextForm::class, $defaultData);
        $form->handleRequest($request);

        $result = TransferFactory::crateResult();

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ApiFormTransfer $data */
            $data = $form->getData();

            $decoder = Factory::createDecoder($data->getFromDecoder());

            $response = Factory::createResponse($decoder->transform($data), $data->getToTransformer());

            $result->setResult($response);
        }

        return $this->render('ApiBundle:Markdown:index.html.twig', [
            'form' => $form->createView(),
            'result' => $result->getResult(),
            'page_title' => 'Markdown online parser',
        ]);
    }
}
