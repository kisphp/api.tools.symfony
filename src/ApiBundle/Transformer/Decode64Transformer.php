<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class Decode64Transformer
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return base64_decode($decoder->getData());
    }
}
