<?php

/** @file
 * @brief Empty unit testing template/database version
 * @cond 
 * @brief Unit tests for the class 
 */
require __DIR__ . "/../../vendor/autoload.php";

class EmptyDBTest extends \PHPUnit_Extensions_Database_TestCase
{
    const SEED = 1477563892;

    protected static $site;

    public static function setUpBeforeClass() {
        self::$site = new SketchParty\Site();
        $localize = require 'localize.inc.php';
        if(is_callable($localize)) {
            $localize(self::$site);
        }
    }

	/**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    public function getConnection()
    {

        return $this->createDefaultDBConnection(self::$site->pdo(), self::$site->getDbUser());
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {
        return new PHPUnit_Extensions_Database_DataSet_DefaultDataSet();

        //return $this->createFlatXMLDataSet(dirname(__FILE__) . '/db/users.xml');
    }
	
}

/// @endcond
?>
