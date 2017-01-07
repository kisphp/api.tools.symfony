<?php

namespace Test\AppBundle\Form;

use ApiBundle\Form\JsonForm;
use ApiBundle\Form\SerializedForm;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\Test\TypeTestCase;

class SerializedFormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            ApiFormTransfer::FIELD_SOURCE => 'this is my code',
        );

        $form = $this->factory->create(SerializedForm::class);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertInstanceOf(ApiFormTransfer::class, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }

    public function testFormName()
    {
        $form = new SerializedForm();

        $this->assertNotEmpty($form->getName());
    }
}
