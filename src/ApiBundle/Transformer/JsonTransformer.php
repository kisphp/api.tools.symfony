<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class JsonTransformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return json_encode($decoder->getData(), JSON_PRETTY_PRINT);
    }
}
