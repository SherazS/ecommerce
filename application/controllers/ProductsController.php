<?php

class ProductsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $products = new Application_Model_ProductsMapper();
        $this->view->entries = $products->fetchAll();
    }


}