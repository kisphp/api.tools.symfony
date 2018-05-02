<?php

namespace ApiBundle\Controller;

use ApiBundle\Form\GeneratorForm;
use ApiBundle\TransferObjects\Generator;
use ApiBundle\TransferObjects\GeneratorRow;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Template()
 */
class GeneratorController extends Controller
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $form = $this->createGeneratorForm()->handleRequest($request);

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function createGeneratorForm()
    {
        $defaultData = new Generator();
        $defaultData->addRow(new GeneratorRow());

        return $this->createForm(GeneratorForm::class, $defaultData);
    }
}
