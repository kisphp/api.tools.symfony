<?php

namespace Test\AppBundle\Twig;

use ApiBundle\Twig\Filters\RawCodeFilter;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class TwigFilterTest extends TestCase
{
    public function testRawCodeFilter()
    {
        $filter = new RawCodeFilter();

        $callable = $filter->getTwigFilter()->getCallable();

        $this->assertSame('asd', $callable('asd'));
    }
}
