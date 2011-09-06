<?php
class page_index extends Page {
    function init(){
        parent::init();
        $this->add('H2')->set('Welcome to DVD Rental');
    }
}
