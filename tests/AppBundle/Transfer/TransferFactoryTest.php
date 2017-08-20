<?php

namespace Test\AppBundle\Transfer;

use ApiBundle\Form\JsonForm;
use ApiBundle\Transfer\TransferFactory;
use PHPUnit\Framework\TestCase;

class TransferFactoryTest extends TestCase
{
    public function testCreateApiForm()
    {
        $form = TransferFactory::createApiForm(JsonForm::VALUE_PHP);

        self::assertContains('ApiFormTransfer', get_class($form));
    }

    public function testCreateResultTransfer()
    {
        $transfer = TransferFactory::createResult();

        self::assertContains('ResultTransfer', get_class($transfer));
    }
}
