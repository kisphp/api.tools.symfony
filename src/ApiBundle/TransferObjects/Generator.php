<?php

namespace ApiBundle\TransferObjects;

class Generator
{
    /**
     * @var \ApiBundle\TransferObjects\GeneratorRow[]
     */
    protected $rows = [];

    public function __construct()
    {
        $this->rows = new \ArrayObject();
    }

    /**
     * @return \ApiBundle\TransferObjects\GeneratorRow[]
     */
    public function getRows()
    {
        return $this->rows;
    }

    /**
     * @param \ApiBundle\TransferObjects\GeneratorRow[] $rows
     */
    public function setRows($rows)
    {
        $this->rows = $rows;
    }

    public function addRow(GeneratorRow $row)
    {
        $this->rows->append($row);
    }
}
