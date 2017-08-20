<?php

namespace ApiBundle\Services;

use ApiBundle\Markdown\ApiMarkdownFactory;

class Markdown
{
    /**
     * @var Markdown
     */
    protected $markdown;

    public function __construct()
    {
        $this->markdown = ApiMarkdownFactory::createMarkdown();
    }

    /**
     * @param string $data
     *
     * @return string
     */
    public function transform($data)
    {
        if (is_array($data)) {
            $data = implode("\n", $data);
        }

        return $this->markdown->parse($data);
    }
}