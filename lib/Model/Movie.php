<?php
class Model_Movie extends Model_Table {
    public $entity_code='movie';
    function init(){
        parent::init();

        $this->addField('name');
        $this->addField('year')->type('int');
        $this->addField('imdb')->caption('IMDB Link');

        $this->addField('available')->calculated(true);
    }
    function calculate_available(){
        return $this->add('Model_DVD_InStore')
            ->dsql_count()->select();
    }
}
