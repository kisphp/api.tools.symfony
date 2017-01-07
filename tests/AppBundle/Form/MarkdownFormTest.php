<?php

namespace Test\AppBundle\Form;

use ApiBundle\Form\MarkdownForm;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\Test\TypeTestCase;

class MarkdownFormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            ApiFormTransfer::FIELD_SOURCE => '# hello world',
        );

        $form = $this->factory->create(MarkdownForm::class);

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
        $form = new MarkdownForm();

        $this->assertNotEmpty($form->getName());
    }
}
