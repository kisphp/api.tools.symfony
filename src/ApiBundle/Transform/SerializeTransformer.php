<?php

namespace ApiBundle\Transform;

class SerializeTransformer extends AbstractTransformer
{
    /**
     * @return string
     */
    public function transform()
    {
        return serialize($this->data);
    }
}
