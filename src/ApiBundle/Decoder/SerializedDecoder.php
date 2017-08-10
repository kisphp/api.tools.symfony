<?php

namespace ApiBundle\Decoder;

use ApiBundle\Business\DecoderInterface;
use ApiBundle\Transfer\ApiFormTransfer;

class SerializedDecoder implements DecoderInterface
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
        $this->data = unserialize($formTransfer->getSource());

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
}
