<?php

namespace ApiBundle\Form;

use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SerializedForm extends AbstractType
{
    const VALUE_PHP = 'Php';
    const VALUE_XML = 'Xml';
    const VALUE_JSON = 'Json';

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(ApiFormTransfer::FIELD_SOURCE, TextareaType::class, [
                'attr' => [
                    'rows' => 7,
                ],
            ])
            ->add(ApiFormTransfer::FIELD_TYPE, ChoiceType::class, [
                'expanded' => true,
                'attr' => [
                    'class' => 'form-inline',
                ],
                'choices' => [
                    'PHP' => self::VALUE_PHP,
                    'XML' => self::VALUE_XML,
                    'Json' => self::VALUE_JSON,
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
        return 'json';
    }
}
