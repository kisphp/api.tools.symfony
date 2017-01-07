<?php

namespace Test\AppBundle\Form;

use ApiBundle\Form\Base64Form;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\Test\TypeTestCase;

class Base64FormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            ApiFormTransfer::FIELD_SOURCE => 'this is my code',
        );

        $form = $this->factory->create(Base64Form::class);

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
        $form = new Base64Form();

        $this->assertNotEmpty($form->getName());
    }
}
