<?php

namespace ApiBundle\Business;

abstract class Factory
{
    /**
     * @param DecoderInterface $decoder
     * @param string $transformerName
     *
     * @return string|TransformerInterface
     */
    public static function createResponse(DecoderInterface $decoder, $transformerName)
    {
        $transformerNamespace = '\\ApiBundle\\Transformer\\' . $transformerName . 'Transformer';

        if (class_exists($transformerNamespace)) {
            /** @var TransformerInterface $transformer */
            $transformer = new $transformerNamespace();

            return $transformer->transform($decoder);
        }

        return sprintf('Transformer %s not implemented', $transformerNamespace);
    }

    /**
     * @param string $decoderName
     *
     * @return string|DecoderInterface
     */
    public static function createDecoder($decoderName)
    {
        $decoderNamespace = '\\ApiBundle\\Decoder\\' . $decoderName . 'Decoder';

        if (class_exists($decoderNamespace)) {
            /* @var TransformerInterface $transformer */
            return new $decoderNamespace();
        }

        return sprintf('Decoder %s not implemented', $decoderName);
    }
}
