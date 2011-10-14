<?php
class page_video extends Page {
    function init(){
        parent::init();
        $this->api->auth->check();

        $grid=$this->add('MVCGrid');
        $grid->setModel('Movie_Available');
        $grid->addColumn('button','rent');
        if($_GET['rent']){
            $rental = $grid->getModel()->loadData($_GET['rent'])->rent($this->api->auth->get('id'));

            $grid->js(null,
                    $this->js()->reload())->univ()->successMessage('Rented successfully #'.$rental->get('id'))
                ->execute();
        }

        $grid=$this->add('MVCGrid');
        $grid->setModel('Rental')
            ->addCondition('customer_id',$this->api->auth->get('id'))
            ->addCondition('is_returned',false)
            ;
        $grid->addColumn('button','return');

        if($_GET['return']){
            $rental = $grid->getModel()->loadData($_GET['return'])->returnMovie();

            $grid->js(null,
                    $this->js()->reload())->univ()->successMessage('Returned #'.$_GET['return'])
                ->execute();
        }

    }
}
