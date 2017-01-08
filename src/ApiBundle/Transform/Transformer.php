<?php

namespace ApiBundle\Transform;

class Transformer
{
    /**
     * @var array
     */
    protected $rules = [];

    /**
     * @param TransformerInterface $rule
     */
    public function addRule(TransformerInterface $rule)
    {
        $key = get_class($rule);

        $this->rules[$key] = $rule;
    }

    /**
     * @param string $input
     * @param string $namespace
     *
     * @throws TransformerNotFoundException
     *
     * @return string
     */
    public function convert($input, $namespace)
    {
        if (!array_key_exists($namespace, $this->rules)) {
            throw new TransformerNotFoundException();
        }

        /** @var TransformerInterface $tr */
        $tr = $this->rules[$namespace];
        $tr->normalize($input);

        return $tr->transform();
    }
}
