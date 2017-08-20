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
use ApiBundle\Form\TextForm;
use ApiBundle\Form\YamlForm;
use ApiBundle\Services\Markdown;
use ApiBundle\Transfer\TransferFactory;
use ApiBundle\Transformer\MarkdownTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MarkdownController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $result = '';
        $form = $this->createForm(MarkdownForm::class)
            ->handleRequest($request)
        ;

        if ($form->isValid()) {
            $data = $form->getData();

            $markdown = new Markdown();

            $result = $markdown->transform($data->getSource());
        }

        return $this->render('ApiBundle:Markdown:index.html.twig', [
            'form' => $form->createView(),
            'result' => $result,
            'page_title' => 'Markdown online parser',
        ]);
    }
}
