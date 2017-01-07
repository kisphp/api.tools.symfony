<?php

namespace Test\AppBundle\Form;

use ApiBundle\Form\YamlForm;
use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\Test\TypeTestCase;

class YamlFormTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            ApiFormTransfer::FIELD_SOURCE => 'hello: ~',
        );

        $form = $this->factory->create(YamlForm::class);

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
        $form = new YamlForm();

        $this->assertNotEmpty($form->getName());
    }
}
