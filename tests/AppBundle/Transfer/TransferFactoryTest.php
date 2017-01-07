<?php

namespace Test\AppBundle\Transfer;

use ApiBundle\Form\JsonForm;
use ApiBundle\Transfer\TransferFactory;

class TransferFactoryTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateApiForm()
    {
        $form = TransferFactory::createApiForm(JsonForm::VALUE_PHP);

        $this->assertContains('ApiFormTransfer', get_class($form));
    }

    public function testCreateResultTransfer()
    {
        $transfer = TransferFactory::crateResult();

        $this->assertContains('ResultTransfer', get_class($transfer));
    }
}
