<?php

namespace ApiBundle\Transform;

class JsonTransformer extends AbstractTransformer
{
    /**
     * @return array
     */
    public function transform()
    {
        return json_decode($this->data, true);
    }
}
