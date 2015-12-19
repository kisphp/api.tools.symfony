<?php

namespace ApiBundle\Transfer;

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
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     */
    public function setSource($source)
    {
        $this->source = $source;
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
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
