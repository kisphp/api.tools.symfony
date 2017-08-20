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
        $defaultData = new ApiFormTransfer();
        $defaultData->setFromDecoder('Json');
        $defaultData->setToTransformer('Php');

        $form =$this->createForm(TextForm::class, $defaultData);
        $form->handleRequest($request);

        $result = $this->get('api.transfer_factory')->createResult();

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var ApiFormTransfer $data */
            $data = $form->getData();

            $factory = $this->get('api.factory');

            $decoder = $factory->createDecoder($data->getFromDecoder());

            $response = $factory->createResponse($decoder->transform($data), $data->getToTransformer());

            $result->setResult($response);
        }

        return [
            'form' => $form->createView(),
            'result' => $result->getResult(),
            'page_title' => 'Markdown online parser',
        ];
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function downloadAction(Request $request)
    {
        $form = $this->createApiForm($request, TextForm::VALUE_DOWNLOAD, TextForm::class);

        $result = $this->get('api.transfer_factory')->createResult();

        if ($form->isValid()) {
            $manager = new TextDecoder();
            $manager->transform($form->getData());

            $response = $this->get('api.factory')->createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render('ApiBundle::form.html.twig', [
            'form' => $form->createView(),
            'result' => $result->getResult(),
            'page_title' => 'Serialized',
        ]);
    }
}
