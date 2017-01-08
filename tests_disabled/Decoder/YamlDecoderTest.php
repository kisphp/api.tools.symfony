<?php

namespace Test\AppBundle\Decoder;

use ApiBundle\Decoder\YamlDecoder;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class YamlDecoderTest extends TestCase
{
    public function testYamlDecoderLoadData()
    {
        $formData = new ApiFormTransfer();
        $formData->setSource($this->getYamlContent());

        $mdc = new YamlDecoder();
        $mdc->transform($formData);

        $this->assertSame(json_encode($this->getArrayContent()), json_encode($mdc->getData()));
    }

    /**
     * @return string
     */
    protected function getYamlContent()
    {
        return <<<EOF
services:
    hello:
        class: DateTime
        tag: "hello date"
EOF;
    }

    /**
     * @return array
     */
    protected function getArrayContent()
    {
        return [
            'services' => [
                'hello' => [
                    'class' => 'DateTime',
                    'tag' => 'hello date',
                ]
            ]
        ];
    }
}
