<?php

namespace ApiBundle\Markdown;

use Kisphp\MarkdownFactory;

class ApiMarkdownFactory extends MarkdownFactory
{
    protected function getAvailableNamespaces()
    {
        $projectNamespaces = [
            'ApiBundle\\Markdown\\Blocks\\',
        ];

        $coreNamespaces = parent::getAvailableNamespaces();

        return array_merge($projectNamespaces, $coreNamespaces);
    }
}
