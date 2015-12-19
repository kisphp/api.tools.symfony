<?php

namespace ApiBundle\Form;

use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResponsiveForm extends AbstractType
{
    const VALUE_PHP = 'Php';
    const VALUE_XML = 'Xml';
    const VALUE_SERIALIZED = 'Serialized';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(ApiFormTransfer::FIELD_SOURCE, TextType::class, [
                'label' => 'Url',
            ])
            ->add(ApiFormTransfer::FIELD_TYPE, ChoiceType::class, [
                'expanded' => true,
                'multiple' => true,
                'attr' => [
                    'class' => 'form-inline',
                ],
                'choices' => [
                    '320x568' => '320x568',
                    '320x534' => '320x534',
                    '320x480' => '320x480',
                    '360x640' => '360x640',
                    '375x667' => '375x667',
                    '480x800' => '480x800',
                    '768x1024' => '768x1024',
                    '1280x800' => '1280x800',
                ],
            ])
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
            'attr' => [
                'class' => 'form-horizontal',
            ],
            'data_class' => ApiFormTransfer::class,
        ]);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'responsive';
    }
}
