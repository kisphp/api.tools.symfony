<?php

namespace ApiBundle\Transfer;

class TransferFactory
{
    /**
     * @return ApiFormTransfer
     */
    public static function createApiForm()
    {
        return new ApiFormTransfer();
    }

    /**
     * @return ResultTransfer
     */
    public static function crateResult()
    {
        return new ResultTransfer();
    }
}
