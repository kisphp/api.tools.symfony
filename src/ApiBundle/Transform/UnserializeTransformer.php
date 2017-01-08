<?php

namespace ApiBundle\Transform;

class UnserializeTransformer extends AbstractTransformer
{
    /**
     * @return array|object
     */
    public function transform()
    {
        return unserialize($this->data);
    }
}
