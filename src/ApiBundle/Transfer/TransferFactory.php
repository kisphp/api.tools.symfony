<?php

namespace ApiBundle\Transfer;

class TransferFactory
{
    /**
     * @param string $type
     *
     * @return ApiFormTransfer
     */
    public static function createApiForm($type)
    {
        $form = new ApiFormTransfer();
        $form->setType($type);

        return $form;
    }

    /**
     * @return ResultTransfer
     */
    public static function crateResult()
    {
        return new ResultTransfer();
    }
}
