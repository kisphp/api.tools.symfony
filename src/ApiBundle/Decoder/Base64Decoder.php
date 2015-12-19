<?php

namespace ApiBundle\Decoder;

use ApiBundle\Transfer\ApiFormTransfer;

class Base64Decoder implements DecoderInterface
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
        $this->data = base64_decode($formTransfer->getSource());

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
}
