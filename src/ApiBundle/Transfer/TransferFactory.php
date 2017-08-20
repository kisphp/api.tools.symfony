<?php

namespace ApiBundle\Transfer;

class TransferFactory
{
    /**
     * @param string $type
     *
     * @return ApiFormTransfer
     */
    public function createApiForm($type)
    {
        $form = new ApiFormTransfer();
        $form->setType($type);

        return $form;
    }

    /**
     * @return ResultTransfer
     */
    public function createResult()
    {
        return new ResultTransfer();
    }
}
