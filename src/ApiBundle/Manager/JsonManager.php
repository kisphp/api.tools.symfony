<?php

namespace ApiBundle\Manager;

use ApiBundle\Transfer\ApiFormTransfer;

class JsonManager implements ManagerInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param ApiFormTransfer $formTransfer
     *
     * @return self
     */
    public function transform(ApiFormTransfer $formTransfer)
    {
        $this->data = json_decode($formTransfer->getSource(), true);

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
}
