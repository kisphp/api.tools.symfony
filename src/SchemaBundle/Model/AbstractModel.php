<?php

namespace SchemaBundle\Model;

use Kisphp\Kisdb;

abstract class AbstractModel
{
    /**
     * @var Kisdb
     */
    protected $db;

    /**
     * @param Kisdb $db
     */
    public function __construct(Kisdb $db)
    {
        $this->db = $db;
    }
}
