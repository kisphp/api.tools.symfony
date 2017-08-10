<?php

namespace ApiBundle\Decoder;

use ApiBundle\Business\DecoderInterface;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

class YamlDecoder implements DecoderInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * @param ApiFormTransfer $formTransfer
     *
     * @return DecoderInterface
     */
    public function transform(ApiFormTransfer $formTransfer)
    {
        $data = '-YAML IS NOT VALID-';
        try {
            $data = Yaml::parse($formTransfer->getSource());
        } catch (ParseException $e) {
            // pass
        }

        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}
