<?php

namespace ApiBundle\Form;

use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JsonForm extends AbstractType
{
    const FIELD_CONTENT = 'content';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(self::FIELD_CONTENT, TextareaType::class)
        ;
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ApiFormTransfer::class,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'json_form';
    }
}
