<?php

abstract class Resauce_Controller_Resource extends Zend_Controller_Action
{
	private $allow = 'GET, PUT, POST, DELETE, HEAD, OPTIONS';

	public function notAllowedAction() {
		$this->getResponse()->setHeader('Allow', $this->allow);
		$this->getResponse()->setHttpResponseCode(405);
		
		$this->_helper->json(array(
			'error' => array(
				'message' => 'Method Not Supported',
				'statuscode' => 405
				)
			)
		);	
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
		$action = strtolower($this->getRequest()->getMethod()) . 'Action';

		if (method_exists($this, $action)) {
			return call_user_func_array(array($this, $action), $args);
		}

		$this->notAllowedAction();
	}

}
