<?php

namespace Test\AppBundle\Transfer;

use ApiBundle\Transfer\ResultTransfer;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class ResultTransferTest extends TestCase
{
    public function testResult()
    {
        $rt = new ResultTransfer();
        $rt->setResult('result');

        $this->assertSame('result', $rt->getResult());
    }
}
