<?php
class Frontend extends ApiFrontend {
    function init(){
        parent::init();

        $this->addLocation('atk4-addons',array(
                    'php'=>array(
                        'mvc',
                        'misc/lib',
                        )
                    ))
            ->setParent($this->pathfinder->base_location);

        $this->add('jUI');
        $this->js()->_load('atk4_univ');
        $this->dbConnect();

        $menu = $this->add('Menu',null,'Menu');
        $menu->addMenuItem($this->api->url('/admin/'),'Admin');
    }
}
