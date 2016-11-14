<?php

namespace ApiBundle\Controller;

use ApiBundle\Decoder\MarkdownDecoder;
use ApiBundle\Decoder\YamlDecoder;
use ApiBundle\Form\Base64Form;
use ApiBundle\Form\JsonForm;
use ApiBundle\Decoder\TextDecoder;
use ApiBundle\Decoder\JsonDecoder;
use ApiBundle\Decoder\SerializedDecoder;
use ApiBundle\Form\MarkdownForm;
use ApiBundle\Form\SerializedForm;
use ApiBundle\Form\YamlForm;
use ApiBundle\Transfer\ApiFormTransfer;
use ApiBundle\Transfer\ResultTransfer;
use ApiBundle\Transformer\FactoryTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ConvertController extends Controller
{
    const TEMPLATE_CONVERTOR = 'ApiBundle::form.html.twig';

    /**
     * @param Request $request
     *
     * @return array
     */
    public function jsonAction(Request $request)
    {
        $formDefault = (new ApiFormTransfer())->setType(JsonForm::VALUE_PHP);
        $form = $this->createForm(JsonForm::class, $formDefault)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            $manager = new JsonDecoder();
            $manager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render(self::TEMPLATE_CONVERTOR, [
            'form' => $form->createView(),
            'result' => $result->getResult(),
            'page_title' => 'Json',
        ]);
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function yamlAction(Request $request)
    {
        $formDefault = (new ApiFormTransfer())->setType(YamlForm::VALUE_PHP);
        $form = $this->createForm(YamlForm::class, $formDefault)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            $manager = new YamlDecoder();
            $manager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render(self::TEMPLATE_CONVERTOR, [
            'form' => $form->createView(),
            'result' => $result->getResult(),
            'page_title' => 'Yaml',
        ]);
    }

    public function base64Action(Request $request)
    {
        $formDefault = (new ApiFormTransfer())->setType(Base64Form::VALUE_ENCODE_64);
        $form = $this->createForm(Base64Form::class, $formDefault)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            $manager = new TextDecoder();
            $manager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render(self::TEMPLATE_CONVERTOR, [
            'form' => $form->createView(),
            'result' => $result->getResult(),
            'page_title' => 'Base 64',
        ]);
    }

    public function serializedAction(Request $request)
    {
        $formDefault = (new ApiFormTransfer())->setType(JsonForm::VALUE_PHP);
        $form = $this->createForm(SerializedForm::class, $formDefault)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            $manager = new SerializedDecoder();
            $manager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render(self::TEMPLATE_CONVERTOR, [
            'form' => $form->createView(),
            'result' => $result->getResult(),
            'page_title' => 'Serialized',
        ]);
    }

    public function markdownAction(Request $request)
    {
        $formDefault = (new ApiFormTransfer())->setType('Markdown');
        $form = $this->createForm(MarkdownForm::class, $formDefault)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            $manager = new MarkdownDecoder();
            $manager->transform($form->getData());

            $response = FactoryTransformer::createResponse($form->getData(), $manager);

            $result->setResult($response);
        }

        return $this->render('ApiBundle:Markdown:index.html.twig', [
            'form' => $form->createView(),
            'result' => $result->getResult(),
            'page_title' => 'Markdown online parser',
        ]);
    }
}
