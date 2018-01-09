<?php

namespace ApiBundle\Transformer;

use ApiBundle\Business\DecoderInterface;
use ApiBundle\Business\TransformerInterface;

class UrlEncoderTransformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return urlencode($decoder->getData());
    }
}
