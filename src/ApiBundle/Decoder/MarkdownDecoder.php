<?php

namespace ApiBundle\Decoder;

use ApiBundle\Transfer\ApiFormTransfer;

class MarkdownDecoder implements DecoderInterface
{
    /**
     * @var string
     */
    protected $data;

    /**
     * @param ApiFormTransfer $formTransfer
     *
     * @return $this
     */
    public function transform(ApiFormTransfer $formTransfer)
    {
        $this->data = $formTransfer->getSource();

        return $this;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->data;
    }
}