<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;
use Symfony\Component\Yaml\Yaml;

class YamlTransformer implements TransformerInterface
{
    const YAML_INLINE_LEVEL = 5;

    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return Yaml::dump($decoder->getData(), self::YAML_INLINE_LEVEL);
    }
}
