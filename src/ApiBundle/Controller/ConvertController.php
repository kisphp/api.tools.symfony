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
use ApiBundle\Transfer\TransferFactory;
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
        $form = $this->createApiForm($request, JsonForm::VALUE_PHP, JsonForm::class);
        $result = TransferFactory::crateResult();

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
        $form = $this->createApiForm($request, YamlForm::VALUE_PHP, YamlForm::class);
        $result = TransferFactory::crateResult();

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

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function base64Action(Request $request)
    {
        $form = $this->createApiForm($request, Base64Form::VALUE_ENCODE_64, Base64Form::class);
        $result = TransferFactory::crateResult();

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

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function serializedAction(Request $request)
    {
        $form = $this->createApiForm($request, JsonForm::VALUE_PHP, SerializedForm::class);

        $result = TransferFactory::crateResult();

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

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function markdownAction(Request $request)
    {
        $form = $this->createApiForm($request, MarkdownForm::VALUE_MARKDOWN, MarkdownForm::class);
        $result = TransferFactory::crateResult();

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

    /**
     * @param Request $request
     * @param $formType
     * @param $formClassNamespace
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function createApiForm(Request $request, $formType, $formClassNamespace)
    {
        $formDefault = TransferFactory::createApiForm($formType);
        $form = $this->createForm($formClassNamespace, $formDefault)
            ->handleRequest($request)
        ;

        return $form;
    }
}
