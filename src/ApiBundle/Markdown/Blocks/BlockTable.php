<?php

namespace ApiBundle\Markdown\Blocks;

use Kisphp\Blocks\BlockTable as KisphpBlockTable;

class BlockTable extends KisphpBlockTable
{
    /**
     * @return string
     */
    public function getStartTableTag()
    {
        return '<table class="table table-bordered table-condensed">';
    }

    /**
     * @param string $alignment
     *
     * @return array
     */
    protected function createColumnMetaDataArray($alignment)
    {
        return [
            'class' => 'text-' . $alignment,
        ];
    }
}