<?php

namespace Test\AppBundle\Transformer;

use ApiBundle\Transform\JsonTransformer;
use ApiBundle\Transform\SerializeTransformer;
use ApiBundle\Transform\Transformer;
use ApiBundle\Transform\TransformerNotFoundException;
use ApiBundle\Transform\UnserializeTransformer;

/**
 * @group transform
 */
class TransformTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Transformer
     */
    protected $tr;

    protected function setUp()
    {
        $this->tr = new Transformer();

        parent::setUp();
    }

    /**
     * @expectedException \ApiBundle\Transform\TransformerNotFoundException
     */
    public function testUnexistantTransformer()
    {
        $this->tr->convert('', JsonTransformer::class);
    }

    public function testJson()
    {
        $this->tr->addRule(new JsonTransformer());

        $input = '{"a": "b", "c": "d"}';

        $out = $this->tr->convert($input, JsonTransformer::class);

        self::assertArrayHasKey('a', $out);
        self::assertArrayHasKey('c', $out);
    }

    public function testSerialize()
    {
        $this->tr->addRule(new SerializeTransformer());

        $input = '{"a": "b", "c": "d"}';
        $out = $this->tr->convert($input, SerializeTransformer::class);

        self::assertContains('s:20', $out);
    }

    public function testUnserialize()
    {
        $this->tr->addRule(new UnserializeTransformer());

        $out = $this->tr->convert('a:1:{s:1:"a";s:1:"b";}', UnserializeTransformer::class);

        self::assertArrayHasKey('a', $out);
    }
}
