<?php

namespace ApiBundle\Twig;

use ApiBundle\Twig\Filters\RawCodeFilter;

class ApiTwigExtensions extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            RawCodeFilter::create(),
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'api_extension';
    }
}
