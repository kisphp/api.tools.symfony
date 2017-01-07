<?php

namespace Test\AppBundle\Decoder;

use ApiBundle\Decoder\MarkdownDecoder;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class MarkdownDecoderTest extends TestCase
{
    public function testMarkdownDecoderLoadData()
    {
        $formData = new ApiFormTransfer();
        $formData->setSource('# hello world');

        $mdc = new MarkdownDecoder();
        $mdc->transform($formData);

        $this->assertSame('# hello world', $mdc->getData());
    }
}
