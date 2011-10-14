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
                    $this->js()->reload())->univ()->successMessage('Rented successfully #'.$rental->get('id'));
        }

    }
}
