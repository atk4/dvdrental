<?php
class page_index extends Page {
    function init(){
        parent::init();

        $form = $this->add('Form',null,'LoginForm');
        $form->setFormClass('vertical');
        $form->addField('line','login');
        $form->addfield('password','password');
        $form->addSubmit('Login');

        if($form->isSubmitted()){

            $auth=$this->api->auth;
            $l=$form->get('login');
            $p=$form->get('password');

            // Manually encrypt password
            if($auth->verifyCredintials($l,$p)){

                // Manually log-in
                $auth->login($l);
                $form->js()->univ()->redirect('video')->execute();
            }
            $form->getElement('password')->displayFieldError('Incorrect login');
        }
    }
    function defaultTemplate(){
        return array('page/index');
    }
}
