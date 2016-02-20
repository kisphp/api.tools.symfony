<?php

namespace ApiBundle\Twig;

abstract class AbstractTwigFilterExtension extends \Twig_SimpleFilter
{
    public function __construct()
    {
        parent::__construct(
            $this->getFilterName(),
            $this->getFilter(),
            $this->getOptions()
        );
    }

    /**
     * @return string
     */
    abstract protected function getFilterName();

    /**
     * @return Callable
     */
    abstract protected function getFilter();

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
