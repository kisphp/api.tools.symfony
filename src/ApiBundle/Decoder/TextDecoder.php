<?php

namespace ApiBundle\Decoder;

use ApiBundle\Transfer\ApiFormTransfer;

class TextDecoder implements DecoderInterface
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
        $this->data = $formTransfer->getSource();

        return $this;
    }

    public function getData()
    {
        return $this->data;
    }
}
