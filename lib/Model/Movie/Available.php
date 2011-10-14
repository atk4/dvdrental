<?php
class Model_Movie_Available extends Model_Movie {
    function init(){
        parent::init();
        $this->addCondition('available>',0);
    }
    function rent($customer_id){
        $m=$this->add('Model_DVD_InStore')
            ->loadBy('movie_id',$this->get('id'));

        return $m->rent($customer_id);
    }
}
