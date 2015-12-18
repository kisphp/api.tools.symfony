<?php

namespace ApiBundle\Transformer;

use ApiBundle\Manager\ManagerInterface;

class PhpTransformer
{
    /**
     * @param ManagerInterface $manager
     *
     * @return string
     */
    public function transform(ManagerInterface $manager)
    {
        return print_r($manager->getData(), true);
    }
}
