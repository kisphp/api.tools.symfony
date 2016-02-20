<?php

namespace ApiBundle\Twig\Filters;

use ApiBundle\Twig\AbstractTwigFilterExtension;

class RawCodeFilter extends AbstractTwigFilterExtension
{
    /**
     * @return string
     */
    protected function getFilterName()
    {
        return 'raw_code';
    }

    /**
     * @return \Closure
     */
    protected function getFilter()
    {
        return function ($code) {
            return htmlentities(stripslashes($code), ENT_QUOTES, 'UTF-8');
        };
    }

    /**
     * @return array
     */
    protected function getOptions()
    {
        return [
            'is_safe' => ['html'],
        ];
    }
}
