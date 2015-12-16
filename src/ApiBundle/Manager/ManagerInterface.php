<?php

namespace ApiBundle\Manager;

use ApiBundle\Transfer\ApiFormTransfer;

interface ManagerInterface
{

    /**
     * @param ApiFormTransfer $formTransfer
     *
     * @return self
     */
    public function transform(ApiFormTransfer $formTransfer);

    /**
     * @return mixed
     */
    public function getData();
}
