<?php

namespace SchemaBundle\Model;

use Kisphp\Kisdb;

class ModelService
{
    protected $db;

    public function __construct($dbHost, $dbUser, $dbPass, $dbName)
    {
        $this->db = Kisdb::getInstance();
        $this->db->connect($dbHost, $dbUser, $dbPass, $dbName);
    }
}
