<?php

class Resauce_Application_Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{

	public function _initResauceFramework() {
		$front = Zend_Controller_Front::getInstance();
		// NotFoundController will handle all URIs by default - Special resource controller for returning 404 response
		$front->setDefaultControllerName('not-found');
		// Remove default routes
		$front->getRouter()->removeDefaultRoutes();
		// add put handler controller module
		$front->registerPlugin(new Zend_Controller_Plugin_PutHandler());
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
