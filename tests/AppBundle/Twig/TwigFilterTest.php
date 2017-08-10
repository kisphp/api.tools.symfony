<?php

namespace Test\AppBundle\Twig;

use ApiBundle\Twig\Filters\RawCodeFilter;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class TwigFilterTest extends TestCase
{
    public function testRawCodeFilter()
    {
        $filter = RawCodeFilter::create();

        $callable = $filter->getCallable();

        $this->assertSame('asd', $callable('asd'));
    }
}
