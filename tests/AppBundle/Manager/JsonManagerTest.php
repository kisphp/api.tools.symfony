<?php

namespace Test\AppBundle\Manager;

use ApiBundle\Manager\JsonManager;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class JsonManagerTest extends TestCase
{

    public function testJsonToArray()
    {
        $formData = new ApiFormTransfer();
        $formData->setContent('{"a": "AA"}');

        $jsonManager = new JsonManager();
        $this->assertSame(['a' => 'AA'], $jsonManager->transform($formData)->getData());
    }
}
