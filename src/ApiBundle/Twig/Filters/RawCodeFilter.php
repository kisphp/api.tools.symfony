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
    protected function getExtensionName()
    {
        return 'raw_code';
    }

    /**
     * @return callable|\Closure
     */
    protected function getExtensionCallback()
    {
        return function ($code) {
            return htmlentities(stripslashes($code), ENT_QUOTES, 'UTF-8');
        };
    }
}
