<?php
/* -----------------------------------------------------------------------------
CRaj.php

Beskrivning: CRaj

Skapare: RaJ

Vettiga länkar:
http://php.net/manual/en/language.constants.predefined.php

================================================================================
------------------------------------------------------------------------------*/

class CRaj implements ISingleton {

	private static $instance = null;

	public static function Instance() {
		if(self::$instance == NULL ){
			self::$instance = new CRaj();
		}
	return self::$instance;
	}

	protected function __CONSTRUCT(){

		$raj = &$this;
		require(RAJ_SITE_PATH . '/config.php');
	}


/* -------------------------------------------------
FrontControllerRoute
------------------------------------------------- */

	public function FrontControllerRoute() {
    	$this->data['debug']  = "REQUEST_URI - {$_SERVER['REQUEST_URI']}\n";
    	$this->data['debug'] .= "SCRIPT_NAME - {$_SERVER['SCRIPT_NAME']}\n";
  
    	$this->request = new CRequest();
    	$this->request->Init();
      $this->request->Init($this->config['base_url']);
    	$controller = $this->request->controller;
    	$method     = $this->request->method;
    	$arguments  = $this->request->arguments;

    		$controllerExists     = isset($this->config['controllers'][$controller]);
		    $controllerEnabled    = false;
		    $className            = false;
		    $classExists          = false;

			    if($controllerExists) {
			      $controllerEnabled       = ($this->config['controllers'][$controller]['enabled'] == true);
			      $className               = $this->config['controllers'][$controller]['class'];
			      $classExists             = class_exists($className);
			    }

			   	if($controllerExists && $controllerEnabled && $classExists) {
      
      		$rc = new ReflectionClass($className);
      
      			if($rc->implementsInterface('IController')) {
       				
       				if($rc->hasMethod($method)) {
           				$controllerObj = $rc->newInstance();
          				$methodObj = $rc->getMethod($method);
          				$methodObj->invokeArgs($controllerObj, $arguments);
        			} else {
          				die("404. " . get_class() . ' error: Controller does not contain method.');
        			}

      				} else {
        				die('404. ' . get_class() . ' error: Controller does not implement interface IController.');
      				}

    				} else {
      					die('404. Page is not found.');
    }
}

/* -------------------------------------------------
ThemeEngineRender
------------------------------------------------- */

   	public function ThemeEngineRender() {

        // Get the paths and settings for the theme
        $themeName    = $this->config['theme']['name'];
        $themePath    = RAJ_INSTALL_PATH . "/themes/{$themeName}";
        $themeUrl     = $this->request->base_url . "themes/{$themeName}";
       
        // Add stylesheet path to the $raj->data array
        $this->data['stylesheet'] = "{$themeUrl}/style.css";

        // Include the global functions.php and the functions.php that are part of the theme
        $raj = &$this;
        $functionsPath = "{$themePath}/functions.php";
        if(is_file($functionsPath)) {
          include $functionsPath;
        }

        // Extract $raj->data to own variables and handover to the template file
        extract($this->data);     
        include("{$themePath}/default.tpl.php");
  }



}

