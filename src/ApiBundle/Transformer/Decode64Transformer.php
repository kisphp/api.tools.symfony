<?php

namespace ApiBundle\Transformer;

use ApiBundle\Business\DecoderInterface;
use ApiBundle\Business\TransformerInterface;

class Decode64Transformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        $data = $decoder->getData();

        if (is_array($data)) {
            $data = implode("\n", $data);
        }

        return base64_decode($data);
    }
}
