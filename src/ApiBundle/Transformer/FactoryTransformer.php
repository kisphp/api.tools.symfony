<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\DependencyInjection\Container;

final class FactoryTransformer
{
    /**
     * @var Container
     */
    protected $container;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param ApiFormTransfer $formData
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function createResponse(ApiFormTransfer $formData, DecoderInterface $decoder)
    {
        $transformerName = '\\ApiBundle\\Transformer\\' . $formData->getType() . 'Transformer';

        if (class_exists($transformerName)) {
            /** @var TransformerInterface $transformer */
            $transformer = new $transformerName($this->container);

            return $transformer->transform($decoder);
        }

        return sprintf('Transformer %s not implemented', str_replace('\\', '\\\\', $transformerName));
    }
}
