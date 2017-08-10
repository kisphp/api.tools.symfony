<?php

namespace ApiBundle\Twig\Filters;

use Kisphp\Twig\AbstractTwigFilter;
use Kisphp\Twig\IsSafeHtml;

class RawCodeFilter extends AbstractTwigFilter
{
    use IsSafeHtml;

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
}
