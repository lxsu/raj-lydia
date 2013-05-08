<?php
/* -----------------------------------------------------------------------------
CRequest.php

Beskrivning: CRequest
Skapare: RaJ

Vettiga länkar:
http://php.net/manual/en/language.constants.predefined.php

================================================================================
------------------------------------------------------------------------------*/

class CRequest {

/* -------------------------------------------------
INIT
------------------------------------------------- */

	public function init() {

		$requestUri = $_SERVER['REQUEST_URI'];
   		$scriptName = $_SERVER['SCRIPT_NAME'];    

        if(substr_compare($requestUri, $scriptName, 0, strlen($scriptName))) {
          $scriptPart = dirname($scriptName);
        }

        $query = trim(substr($requestUri, strlen(rtrim($scriptPart, '/'))), '/'); 

        // Check if this looks like a querystring approach link
        if(substr($query, 0, 1) === '?' && isset($_GET['q'])) {
          $query = trim($_GET['q']);
        }
        $splits = explode('/', $query);

		$controller = !empty($splits[0]) ? $splits[0] : 'index';
		$method		= !empty($splits[1]) ? $splits[1] : 'index';
		$arguments = $splits;

			unset($arguments[0], $arguments[1]);

		$this->request_uri = $_SERVER['REQUEST_URI'];
		$this->script_name = $_SERVER['SCRIPT_NAME'];

		$this->query		= $query;
		$this->splits		= $splits;
		$this->controller	= $controller;
		$this->method 		= $method;
		$this->arguments	= $arguments;


    
	    // Prepare to create current_url and base_url
	    $currentUrl = $this->GetCurrentUrl();
	    $parts       = parse_url($currentUrl);

	    // Store it
	    $this->base_url     = rtrim("{$parts['scheme']}://{$parts['host']}" . (isset($parts['port']) ? ":{$parts['port']}" : '') . rtrim(dirname($scriptName), '/'), '/') . '/';
	    $this->current_url  = $currentUrl;
	    $this->request_uri  = $requestUri;
	    $this->script_name  = $scriptName;
	    $this->query        = $query;
	    $this->splits        = $splits;
	    $this->controller    = $controller;
	    $this->method        = $method;
	    $this->arguments    = $arguments;
   }  

/* -------------------------------------------------
GetCurrentURL
------------------------------------------------- */
    public function GetCurrentUrl() {
        $url = "http";
        $url .= (@$_SERVER["HTTPS"] == "on") ? 's' : '';
        $url .= "://";

        $serverPort = ($_SERVER["SERVER_PORT"] == "80") ? '' :
        (($_SERVER["SERVER_PORT"] == 443 && @$_SERVER["HTTPS"] == "on") ? '' : ":{$_SERVER['SERVER_PORT']}");

        $url .= $_SERVER["SERVER_NAME"] . $serverPort . htmlspecialchars($_SERVER["REQUEST_URI"]);
        return $url;
      }
/* -------------------------------------------------
CreatetURL
------------------------------------------------- */

    public function CreateUrl($url=null) {
        $prepend = $this->base_url;
    
    		if($this->cleanUrl) {;
    			
        	} elseif ($this->querystringUrl) {
          		$prepend .= 'index.php?q=';

        	} else {
          		$prepend .= 'index.php/';

        	}
        		return $prepend . rtrim($url, '/');
      }
}