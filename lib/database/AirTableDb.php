<?php


namespace lib\database;

//This file cannot be accessed from browser
defined('_EXEC_APP') or die('Ups! access not allowed');

use interfaces\Idatabase;
use interfaces\stdClass;
use lib\database\airtable\Airtable;
use lib\Config;
use Exception;


class AirTableDb extends \lib\database\Config implements Idatabase
{
    /**
     * @var null|Airtable
     */
    private $_airTable = null;

    /**
     * AirTableDb constructor.
     * @param bool $_DEFAULT_CONNECTION_
     */
    function __construct($_DEFAULT_CONNECTION_ = TRUE)
    {

        if ($_DEFAULT_CONNECTION_) {
            $this->connect();
        }

    }

    public function connect()
    {
        // TODO: Implement connect() method.
        if (Config::$_USE_DB === FALSE) {
            return NULL;
        }
        $this->_airTable = new Airtable(array(
            'api_key' => $this->_USER_,
            'base'    => $this->_DB_
        ));
    }

    public function beginTransaction()
    {
        // TODO: Implement beginTransaction() method.
    }

    public function commitTransaction()
    {
        // TODO: Implement commitTransaction() method.
    }

    public function rollbackTransaction($_EXCEPTION_MSG = 'Rollback executing...', $_THROW_EXCEPTION = TRUE)
    {
        // TODO: Implement rollbackTransaction() method.
    }

    public function closeConnection()
    {
        // TODO: Implement closeConnection() method.
    }

    /**
     * @param array $query ["table"=>"",filters=>[]]
     */
    public function query($query)
    {
        // TODO: Implement query() method.
    }

    public function exec()
    {
        // TODO: Implement exec() method.
    }

    public function getListCount($resource = NULL)
    {
        // TODO: Implement getListCount() method.
    }

    public function setQuery($query)
    {
        // TODO: Implement setQuery() method.
    }

    /**
     * @param string $query
     * @return airtable\Response
     * @throws Exception
     */
    public function getObjectList($query)
    {
        // TODO: Implement getObjectList() method.
        if(empty($query["table"]))
            throw new Exception("Table not found");

        if(!empty($query["filters"]))
            $request = $this->_airTable->getContent( $query["table"], $query["filters"] );
        else
            $request = $this->_airTable->getContent( $query["table"] );

        do {
            $response = $request->getResponse();
        }
        while( $request = $response->next() );

        if(!empty($response["records"])) {
            $records = array();
            foreach ($response["records"] as $record) {
                array_push($records, $record->fields);
            }
            return $records;
        }

        return null;
    }

    /**
     * @param string $query
     * @return stdClass|null
     * @throws Exception
     */
    public function getRowObjectList($query)
    {
        // TODO: Implement getRowObjectList() method.
        if(empty($query["table"]))
            throw new Exception("Table not found");
        if(empty($query["field"]))
            throw new Exception("Field not found");
        if(empty($query["value"]))
            throw new Exception("Value not found");
        $check = $this->_airTable->quickCheck($query["table"],$query["field"],$query["value"]);

        if($check->count > 0){
            // the value is already there
            return $check->records[0]->fields;
        }

        return null;
    }

    public function getArrayList($query)
    {
        // TODO: Implement getArrayList() method.
        return $this->_airTable->getContent( $query["table"]."/".$query["id"], false, [
            $query['relation']
        ] );
    }

    public function getRowArrayList($query)
    {
        // TODO: Implement getRowArrayList() method.
    }

    public function insert(array $values, $table, $id)
    {
        // TODO: Implement insert() method.
        return $this->_airTable->saveContent($table,$values);
    }

    public function insertObject(\stdClass $values, $table, $id = '')
    {
        // TODO: Implement insertObject() method.
    }

    public function getInsert($values, $table)
    {
        // TODO: Implement getInsert() method.
    }

    public function update(array $values, $table, $filters)
    {
        // TODO: Implement update() method.
        return $this->_airTable->updateContent($table."/".$filters,$values);
    }

    public function updateObject(\stdClass $values, $table, $filters)
    {
        // TODO: Implement updateObject() method.
    }

    public function getLink()
    {
        // TODO: Implement getLink() method.
    }

    public function rowAffect($resource = NULL)
    {
        // TODO: Implement rowAffect() method.
    }

    public function Escape($escapestring)
    {
        // TODO: Implement Escape() method.
    }

}