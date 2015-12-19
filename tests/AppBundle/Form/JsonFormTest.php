<?php

namespace Test\AppBundle\Form;

use ApiBundle\Form\JsonForm;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\Test\TypeTestCase;

class JsonFormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            ApiFormTransfer::FIELD_SOURCE => '{"a":"AA"}',
        );

        $form = $this->factory->create(JsonForm::class);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertInstanceOf(ApiFormTransfer::class, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
