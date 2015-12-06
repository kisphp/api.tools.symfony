<?php

namespace ApiBundle\Transformer;

use ApiBundle\Manager\ManagerInterface;

interface TransformerInterface
{
    public function transform(ManagerInterface $manager);
}
