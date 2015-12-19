<?php

namespace ApiBundle\Transformer;

use ApiBundle\Manager\ManagerInterface;
use ApiBundle\Transfer\ApiFormTransfer;

abstract class FactoryTransformer
{
    /**
     * @param ApiFormTransfer $formData
     * @param ManagerInterface $manager
     *
     * @return string
     */
    public static function createResponse(ApiFormTransfer $formData, ManagerInterface $manager)
    {
        $transformerName = '\\ApiBundle\\Transformer\\' . $formData->getType() . 'Transformer';

        if (class_exists($transformerName)) {
            /** @var TransformerInterface $transformer */
            $transformer = new $transformerName();

            return $transformer->transform($manager);
        }

        return 'Transformer not implemented';
    }
}