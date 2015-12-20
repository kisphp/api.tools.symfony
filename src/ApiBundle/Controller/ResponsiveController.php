<?php

namespace ApiBundle\Controller;

use ApiBundle\Form\ResponsiveForm;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
        $formDefault->setType(ResponsiveForm::getResolutionChoirces());
        $form = $this->createForm(ResponsiveForm::class, $formDefault)->handleRequest($request);

        $dimensions = [];
        $url = '';
        $isLarge = false;

        if ($form->isValid()) {
            /** @var ApiFormTransfer $response */
            $response = $form->getData();

            $url = $response->getSource();
            $dimensions = array_map(function ($row) use (&$isLarge) {
                $dimensions = explode('x', $row);
                if ($dimensions[0] > 600 || $dimensions[1] > 600) {
                    $isLarge = true;
                }

                return $dimensions;
            }, $response->getType());
        }

        return $this->render('ApiBundle:Responsive:index.html.twig', [
            'form' => $form->createView(),
            'url' => $url,
            'is_large' => $isLarge,
            'dimensions' => $dimensions,
        ]);
    }
}
