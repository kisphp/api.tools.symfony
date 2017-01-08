<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class SerializedTransformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return serialize($decoder->getData());
    }
}
