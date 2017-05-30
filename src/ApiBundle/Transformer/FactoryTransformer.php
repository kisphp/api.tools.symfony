<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;
use ApiBundle\Transfer\ApiFormTransfer;

abstract class FactoryTransformer
{
    /**
     * @param ApiFormTransfer $formData
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public static function createResponse(ApiFormTransfer $formData, DecoderInterface $decoder)
    {
        $transformerName = '\\ApiBundle\\Transformer\\' . $formData->getType() . 'Transformer';

        if (class_exists($transformerName)) {
            /** @var TransformerInterface $transformer */
            $transformer = new $transformerName();

            return $transformer->transform($decoder);
        }

        return sprintf('Transformer %s not implemented', str_replace('\\', '\\\\', $transformerName));
    }
}
