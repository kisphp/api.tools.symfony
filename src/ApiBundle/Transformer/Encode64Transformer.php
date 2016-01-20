<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class Encode64Transformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return base64_encode($decoder->getData());
    }
}