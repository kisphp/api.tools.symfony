<?php

namespace ApiBundle\Form;

use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MarkdownForm extends AbstractType
{
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
                'label' => 'Markdown source',
                'attr' => [
                    'rows' => 7,
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
        return 'markdown';
    }
}
