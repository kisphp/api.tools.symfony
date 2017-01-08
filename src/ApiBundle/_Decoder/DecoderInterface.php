<?php

namespace ApiBundle\Decoder;

use ApiBundle\Transfer\ApiFormTransfer;

interface DecoderInterface
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
