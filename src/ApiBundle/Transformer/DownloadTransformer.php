<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;
use ApiBundle\Tools\DownloadManager;
use Symfony\Component\DependencyInjection\Container;

class DownloadTransformer implements TransformerInterface
{
    /**
     * @var Container
     */
    protected $container;

    /**
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        $cmd = new DownloadManager($this->container->get('model.service'));
        $cmd->saveUrlToFile($decoder->getData());

        return sprintf('Url: %s was successfully saved', $decoder->getData());
    }
}
