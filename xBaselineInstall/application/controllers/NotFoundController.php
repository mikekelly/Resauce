<?php

class NotFoundController extends Resauce_Controller_Resource
{
	public function __call($method, $args) {
		$this->getResponse()->setHttpResponseCode(404);
		$this->render('not-found');
	}
}
