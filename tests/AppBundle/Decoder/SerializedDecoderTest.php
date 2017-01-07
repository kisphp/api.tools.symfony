<?php

namespace Test\AppBundle\Decoder;

use ApiBundle\Decoder\SerializedDecoder;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class SerializedDecoderTest extends TestCase
{
    const SERIALIZED = 'a:2:{i:0;a:2:{s:1:"a";s:1:"b";s:1:"c";s:1:"d";}i:1;a:2:{s:1:"e";s:1:"f";s:1:"g";s:1:"h";}}';

    const EXPECTED = [
        [
            'a' => 'b',
            'c' => 'd',
        ],
        [
            'e' => 'f',
            'g' => 'h',
        ]
    ];

    public function testSerializedDecoderTest()
    {
        $formData = new ApiFormTransfer();
        $formData->setSource(self::SERIALIZED);

        $mdc = new SerializedDecoder();
        $mdc->transform($formData);

        $this->assertSame(json_encode(self::EXPECTED), json_encode($mdc->getData()));
    }
}
