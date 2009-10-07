<?php

class Resauce_Application_Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public function _initResauceFramework() {
		// NotFoundController will handle all URIs by default - Special resource controller for returning 404 response
		Zend_Controller_Front::getInstance()->setDefaultControllerName('not-found');
		// Remove default routes
		Zend_Controller_Front::getInstance()->getRouter()->removeDefaultRoutes();
		// Add route for root URI
		$this->addResauceRoutes(array(
			'/' => 'index'
		));
	}

	public function addResauceRoutes($routes) {
		$router = Zend_Controller_Front::getInstance()->getRouter();
		foreach ($routes as $pattern => $controller) {
			$router->addRoute(
                        	$controller,
                        	new Zend_Controller_Router_Route(
                                	$pattern,
                                	array(
                                        	'controller' => $controller
                                	)
                        	)
                	);
		}
	}

}
