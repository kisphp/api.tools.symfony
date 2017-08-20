<?php

namespace ApiBundle\Transfer;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class ApiFormTransfer
{
    const FIELD_SOURCE = 'source';

    const FIELD_TYPE = 'type';

    /**
     * @var string
     */
    protected $source;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $from_decoder;

    /**
     * @var string
     */
    protected $to_transformer;

    /**
     * @param ClassMetadata $metadata
     */
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraints('source', [
            new NotBlank(),
        ]);
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return ApiFormTransfer
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return ApiFormTransfer
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromDecoder()
    {
        return $this->from_decoder;
    }

    /**
     * @param string $from_decoder
     */
    public function setFromDecoder($from_decoder)
    {
        $this->from_decoder = $from_decoder;
    }

    /**
     * @return string
     */
    public function getToTransformer()
    {
        return $this->to_transformer;
    }

    /**
     * @param string $to_transformer
     */
    public function setToTransformer($to_transformer)
    {
        $this->to_transformer = $to_transformer;
    }
}
