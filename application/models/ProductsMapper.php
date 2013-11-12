<?php

class Application_Model_ProductsMapper
{
    protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Products');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Products $products)
    {
        $data = array(
            'category'   => $products->getCategory(),
            'description' => $products->getDescription(),
            'cost' => $products->getCost(),
        );
 
        if (null === ($id = $products->getId())) {
            unset($data['id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Products $products)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $products->setId($row->id)
                  ->setCategory($row->Category)
                  ->setDescription($row->Description)
                  ->setCost($row->cost);
    }
 
    public function fetchAll()
    {
        $resultSet = $this->getDbTable()->fetchAll();
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Products();
            $entry->setId($row->id)
                  ->setCategory($row->category)
                  ->setDescription($row->description)
                  ->setCost($row->cost);
            $entries[] = $entry;
        }
        return $entries;
    }
}