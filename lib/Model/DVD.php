<?php
class Model_DVD extends Model_Table {
    public $entity_code='dvd';
    function init(){
        parent::init();

        $this->addField('movie_id')->refModel('Model_Movie');
        $this->addField('code');

        $this->addfield('is_rented')
            ->type('boolean')
            ->calculated(true);
    }
    function toStringSQL($source_field, $dest_fieldname){
        return 'concat("DVD#",id,": ",(select name 
                    from movie m,dvd d where m.id=d.movie_id and d.id='.$source_field.')) as '.$dest_fieldname;
    }
    function calculate_is_rented(){
        $select=$this->add('Model_Rental')
            ->dsql()
            ->field('id')
            ->where('rental.dvd_id=dvd.id')
            ->where('is_returned!=','Y')
            ->select()
            ;

        return "if(($select) is null,'N','Y')";
    }
}
