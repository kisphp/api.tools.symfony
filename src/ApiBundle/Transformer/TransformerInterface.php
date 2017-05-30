<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

interface TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder);
}
