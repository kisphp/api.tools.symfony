<?php

namespace ApiBundle\Transform;

interface TransformerInterface
{
    /**
     * @param string $input
     *
     * @return TransformerInterface
     */
    public function normalize($input);

    /**
     * @return string
     */
    public function transform();
}
