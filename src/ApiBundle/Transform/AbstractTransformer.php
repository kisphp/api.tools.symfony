<?php

namespace ApiBundle\Transform;

abstract class AbstractTransformer implements TransformerInterface
{
    /**
     * @var string|array
     */
    protected $data;

    /**
     * @param string $input
     *
     * @return TransformerInterface
     */
    public function normalize($input)
    {
        $this->data = $input;

        return $this;
    }
}
