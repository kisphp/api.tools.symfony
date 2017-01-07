<?php

namespace Test\AppBundle\Form;

use ApiBundle\Form\JsonForm;
use ApiBundle\Form\ResponsiveForm;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\Test\TypeTestCase;

class ResponsiveFormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            ApiFormTransfer::FIELD_SOURCE => 'http://www.example.com',
        );

        $form = $this->factory->create(ResponsiveForm::class);

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
        $form = new ResponsiveForm();

        $this->assertNotEmpty($form->getName());
    }
}
