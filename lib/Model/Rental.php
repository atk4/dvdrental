<?php
class Model_Rental extends Model_Table {
    public $entity_code='rental';
    function init(){
        parent::init();

        $this->hasOne('Customer');
        $this->hasOne('DVD');
        $this->addField('date_rented')->defaultValue(date('Y-m-d'))->type('date');
        $this->addField('date_returned')->type('date');
        
        $this->addField('is_returned')->type('boolean')->defaultValue(false);
    }
    function returnMovie(){
        $this
            ->set('date_returned',date('Y-m-d'))
            ->set('is_returned',true)
            ->save();
    }
}
