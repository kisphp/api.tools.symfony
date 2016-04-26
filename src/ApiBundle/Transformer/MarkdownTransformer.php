<?php

namespace ApiBundle\Transformer;

use ApiBundle\Decoder\DecoderInterface;
use ApiBundle\Markdown\ApiMarkdownFactory;
use Kisphp\Markdown;

class MarkdownTransformer implements TransformerInterface
{
    /**
     * @var Markdown
     */
    protected $markdown;

    public function __construct()
    {
        $this->markdown = ApiMarkdownFactory::createMarkdown();
    }

    /**
     * @param DecoderInterface $decoder
     *
     * @return string
     */
    public function transform(DecoderInterface $decoder)
    {
        return $this->markdown->parse($decoder->getData());
    }
}