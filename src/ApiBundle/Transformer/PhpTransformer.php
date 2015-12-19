<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class PhpTransformer
{
    /**
     * @param DecoderInterface $manager
     *
     * @return string
     */
    public function transform(DecoderInterface $manager)
    {
        return print_r($manager->getData(), true);
    }
}
