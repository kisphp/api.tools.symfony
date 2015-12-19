<?php

namespace ApiBundle\Transformer;

use ApiBundle\Manager\ManagerInterface;

class SerializedTransformer
{
    /**
     * @param ManagerInterface $manager
     *
     * @return string
     */
    public function transform(ManagerInterface $manager)
    {
        return serialize($manager->getData());
    }
}
