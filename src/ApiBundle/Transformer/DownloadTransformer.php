<?php

namespace ApiBundle\Transformer;

use ApiBundle\Business\DecoderInterface;
use ApiBundle\Business\TransformerInterface;
use ApiBundle\Tools\DownloadManager;

class DownloadTransformer implements TransformerInterface
{
    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        $cmd = new DownloadManager();
        $cmd->saveUrlToFile($decoder->getData());

        return sprintf('Url: %s was successfully saved', $decoder->getData());
    }
}
