<?php
class Model_DVD_InStore extends Model_DVD {
    function init(){
        parent::init();
        $this->addCondition('is_rented',false);
    }
    function dsql_count(){
        return $this
            ->dsql(null,false)
            ->field('count(*)')
            ->where('('.$this->calculate_is_rented().')!=','Y')
            ->where('dvd.movie_id=movie.id')
            ;
    }
}
