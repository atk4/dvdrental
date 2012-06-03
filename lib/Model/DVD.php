<?php
class Model_DVD extends Model_Table {
    public $table='dvd';
    function init(){
        parent::init();

        $this->hasOne('Movie');
        $this->addField('code');

        $self=$this;

        $this->addExpression('name')->set(function($m,$q)use($self){
        	return $q->dsql()->fx('concat',array(
        		$self->getField('movie'),
        		' (',
        		$self->getField('code'),
        		')'	
        		));
        });
    }
}
