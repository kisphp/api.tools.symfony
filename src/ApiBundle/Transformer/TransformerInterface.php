<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;

interface TransformerInterface
{
    public function transform(DecoderInterface $manager);
}
