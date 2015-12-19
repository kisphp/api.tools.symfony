<?php

namespace Test\AppBundle\Decoder;

use ApiBundle\Decoder\JsonDecoder;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class JsonDecoderTest extends TestCase
{
    public function testJsonToArray()
    {
        $formData = new ApiFormTransfer();
        $formData->setSource('{"a": "AA"}');

        $jsonManager = new JsonDecoder();
        $this->assertSame(['a' => 'AA'], $jsonManager->transform($formData)->getData());
    }

    public function testInvalidJsonToArray()
    {
        $formData = new ApiFormTransfer();
        $formData->setSource('{"a"}');

        $jsonManager = new JsonDecoder();
        $this->assertNull($jsonManager->transform($formData)->getData());
    }
}
