<?php

namespace SchemaBundle\Model;

use Kisphp\Kisdb;

class ModelService
{
    /**
     * @var Kisdb
     */
    protected $db;

    /**
     * @param string $dbHost
     * @param string $dbUser
     * @param string $dbPass
     * @param string $dbName
     */
    public function __construct($dbHost, $dbUser, $dbPass, $dbName)
    {
        $this->db = Kisdb::getInstance();
        $this->db->connect($dbHost, $dbUser, $dbPass, $dbName);
    }

    /**
     * @return UrlModel
     */
    public function createUrlModel()
    {
        return new UrlModel($this->db);
    }
}
