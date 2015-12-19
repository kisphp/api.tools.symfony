<?php

namespace ApiBundle\Controller;

use ApiBundle\Form\JsonForm;
use ApiBundle\Decoder\Base64Decoder;
use ApiBundle\Decoder\JsonDecoder;
use ApiBundle\Decoder\SerializedDecoder;
use ApiBundle\Transfer\ResultTransfer;
use ApiBundle\Transformer\FactoryTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConvertController extends Controller
{
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
            $manager = new JsonDecoder();
            $manager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render('ApiBundle:Convert:form.html.twig', [
            'form' => $form->createView(),
            'result' => $result->getResult(),
        ]);
    }

    public function base64Action(Request $request)
    {
        $form = $this->createForm(JsonForm::class)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            $manager = new Base64Decoder();
            $manager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render('ApiBundle:Convert:form.html.twig', [
            'form' => $form->createView(),
            'result' => $result->getResult(),
        ]);
    }

    public function serializedAction(Request $request)
    {
        $form = $this->createForm(JsonForm::class)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            $manager = new SerializedDecoder();
            $manager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render('ApiBundle:Convert:form.html.twig', [
            'form' => $form->createView(),
            'result' => $result->getResult(),
        ]);
    }
}
