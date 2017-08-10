<?php

namespace ApiBundle\Form;


use ApiBundle\Transfer\ApiFormTransfer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TextForm extends AbstractType
{
    const VALUE_TEXT = 'Text';

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->add(ApiFormTransfer::FIELD_SOURCE, TextareaType::class, [
                'attr' => [
                    'rows' => 7,
                ],
            ])
            ->add('from_decoder', ChoiceType::class, [
                'choices' => $this->getDecodersList(),
                'expanded' => true,
                'attr'     => [
                    'class' => 'form-inline',
                ],
                'preferred_choices' => ['Text', 'Json'],
            ])
            ->add('to_transformer', ChoiceType::class, [
                'choices' => $this->getTransformersList(),
                'expanded' => true,
                'attr'     => [
                    'class' => 'form-inline',
                ],
                'preferred_choices' => ['Php', 'Text'],
            ])
//            ->add('explode_by', TextType::class)
//            ->add(
//                ApiFormTransfer::FIELD_TYPE, ChoiceType::class, [
//                'expanded' => true,
//                'attr'     => [
//                    'class' => 'form-inline',
//                ],
//                'choices'  => [
//                    'PHP'        => self::VALUE_PHP,
//                    'XML'        => self::VALUE_XML,
//                    'Serialized' => self::VALUE_SERIALIZED,
//                    'Yaml'       => self::VALUE_YAML,
//                ],
//            ])
        ;
    }

    /**
     * @return array
     */
    protected function getTransformersList()
    {
        $transformers = [];
        $dir = new \DirectoryIterator(__DIR__ . '/../Transformer/');
        foreach ($dir as $fileInfo) {
            if($fileInfo->isDot() || strpos($fileInfo->getBasename(), 'Interface') !== false) {
                continue;
            }
            $name = str_replace('Transformer.php', '', $fileInfo->getBasename());
            $transformers[$name] = $name;
        }

        return $transformers;
    }

    /**
     * @return array
     */
    protected function getDecodersList()
    {
        $decoders = [];
        $dir = new \DirectoryIterator(__DIR__ . '/../Decoder/');
        foreach ($dir as $fileInfo) {
            if($fileInfo->isDot() || strpos($fileInfo->getBasename(), 'Interface') !== false) {
                continue;
            }
            $name = str_replace('Decoder.php', '', $fileInfo->getBasename());
            $decoders[$name] = $name;
        }

        return $decoders;
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver) {
      $resolver->setDefaults(
          [
              'attr'       => [
                  'class' => 'form-horizontal',
              ],
              'data_class' => ApiFormTransfer::class,
          ]
      );
    }

    /**
     * @return string
     */
    public function getName() {
      return 'text';
    }
}
