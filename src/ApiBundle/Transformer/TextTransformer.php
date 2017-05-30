<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class TextTransformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return $decoder->getData();
    }
}
