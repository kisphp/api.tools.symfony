<?php

namespace ApiBundle\Form;

use ApiBundle\TransferObjects\GeneratorRow;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeneratorRowForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('type', ChoiceType::class, [
            'choices' => [
                'Number' => 'n',
                'String' => 's',
            ],
        ]);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GeneratorRow::class,
        ]);
    }


}
