<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

class SerializedTransformer
{
    /**
     * @param DecoderInterface $manager
     *
     * @return string
     */
    public function transform(DecoderInterface $manager)
    {
        return serialize($manager->getData());
    }
}
