<?php

class Resauce_Application_Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public function _initResauceFramework() {
		// NotFoundController will handle all URIs by default - Special resource controller for returning 404 response
		Zend_Controller_Front::getInstance()->setDefaultControllerName('not-found');
		$router = Zend_Controller_Front::getInstance()->getRouter();
		// Get rid of default routing; take control of your Resauces :-)
		$router->removeDefaultRoutes();
		// Add route for root URI
		$router->addRoute(
			'index',
			new Zend_Controller_Router_Route(
				'/',
				array(
					'controller' => 'index'
				)
			)
		);
	}
}
