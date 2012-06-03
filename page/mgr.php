<?php
class page_mgr extends Page {
	function init(){
		parent::init();
		$this->api->redirect('/');
	}
}