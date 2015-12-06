<?php

namespace ApiBundle\Manager;

use ApiBundle\Transfer\ApiFormTransfer;

interface ManagerInterface
{
    public function transform(ApiFormTransfer $formTransfer);

    public function getData();
}
