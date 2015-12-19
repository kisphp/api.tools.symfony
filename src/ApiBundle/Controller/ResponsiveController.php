<?php

namespace ApiBundle\Controller;

use ApiBundle\Form\ResponsiveForm;
use ApiBundle\Transfer\ApiFormTransfer;
use ApiBundle\Transfer\ResultTransfer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class ResponsiveController extends Controller
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $formDefault = new ApiFormTransfer();
        $form = $this->createForm(ResponsiveForm::class, $formDefault)->handleRequest($request);
        $result = new ResultTransfer();

        if ($form->isValid()) {
            dump($form->getData());
//            $manager = new TextDecoder();
//            $manager->transform($form->getData());
//
//            $response = FactoryTransformer::createResponse($form->getData(), $manager);
//
//            $result->setResult($response);
        }

        return $this->render('ApiBundle:Convert:form.html.twig', [
            'form' => $form->createView(),
            'result' => $result->getResult(),
        ]);
    }
}
