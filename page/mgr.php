<?php
class page_mgr extends Page {
    function init(){
        parent::init();

        $tabs=$this->add('Tabs');
        $tabs->addTab('Customers')->add('CRUD')->setModel('Customer');
        $tabs->addTab('Movies')->add('CRUD')->setModel('Movie');
        $tabs->addTab('DVDs')->add('CRUD')->setModel('DVD');
        $tabs->addTab('Rentals')->add('CRUD')->setModel('Rental');
    }
}
