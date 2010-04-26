<?php

abstract class Resauce_Controller_Resource extends Zend_Controller_Action
{
	private $allow = 'GET, PUT, POST, DELETE, HEAD, OPTIONS';

	public function notAllowedAction() {
		// Set Allow header and 405 Code
		$this->getResponse()->setHeader('Allow', $this->allow);
		$this->getResponse()->setHttpResponseCode(405);
	}
	
	public final function indexAction() {
		return $this->__call('index',null);
	}
	
	public function getAction() {
		$this->notAllowedAction();
	}

	public function putAction() {
		$this->notAllowedAction();
	}

	public function postAction() {
		$this->notAllowedAction();
	}

	public function deleteAction() {
		$this->notAllowedAction();
	}

	public function headAction() {
		$this->notAllowedAction();
	}

	public function optionsAction() {
		$this->notAllowedAction();
	}

	public function __call($method, $args)
	{
		// Disable auto-rendering
		$this->_helper->viewRenderer->setNoRender();
		// Set action to <http_method>Action
		$action = strtolower($this->getRequest()->getMethod()) . 'Action';


		if(!is_array($args)) {
			 $args = array();
		}

		if (method_exists($this, $action)) {
			return call_user_func_array(array($this, $action), $args);
		}

		$this->notAllowedAction();
	}

}
