<?php

namespace Test\AppBundle\Decoder;

use ApiBundle\Decoder\TextDecoder;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class TextDecoderTest extends TestCase 
{
    public function testTextDecoderLoadData()
    {
        $formData = new ApiFormTransfer();
        $formData->setSource('hello world');

        $mdc = new TextDecoder();
        $mdc->transform($formData);

        $this->assertSame('hello world', $mdc->getData());
    }
}
