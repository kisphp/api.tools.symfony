<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class PhpTransformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return print_r($decoder->getData(), true);
    }
}
