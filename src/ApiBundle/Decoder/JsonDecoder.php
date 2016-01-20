<?php

namespace ApiBundle\Decoder;

use ApiBundle\Transfer\ApiFormTransfer;

class JsonDecoder implements DecoderInterface
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