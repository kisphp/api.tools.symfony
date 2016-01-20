<?php

namespace ApiBundle\Twig;

class ApiTwigExtensions extends \Twig_Extension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('raw_code', [$this, 'rawCode'], [
                'is_safe' => ['html'],
            ])
        ];
    }

    /**
     * @param string $code
     *
     * @return string
     */
    public function rawCode($code)
    {
        return stripslashes($code);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'api_extension';
    }

}
