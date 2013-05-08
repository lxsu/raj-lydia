<?php
/* -----------------------------------------------------------------------------
config.php

Beskrivning: config
Skapare: RaJ

Vettiga länkar:
http://php.net/manual/en/language.constants.predefined.php

================================================================================
------------------------------------------------------------------------------*/

error_reporting(-1);
ini_set('display_errors', 1);

/* -------------------------------------------------
Base URL
------------------------------------------------- */

	$ly->config['base_url'] = null;

/* -------------------------------------------------
Define SESSION-name
------------------------------------------------- */
	
	$ly->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);

/* -------------------------------------------------
Define server timezone
------------------------------------------------- */

	$ly->config['timezone'] = 'Europe/Stockholm';

/* -------------------------------------------------
Define encoding
------------------------------------------------- */

	$ly->config['character_encoding'] = 'UTF-8';

/* -------------------------------------------------
Länkquery

    * default      = 0      => index.php/controller/method/arg1/arg2/arg3
    * clean        = 1      => controller/method/arg1/arg2/arg3
    * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
------------------------------------------------- */

    $ly->config['url_type'] = 1;

/* -------------------------------------------------
Controller Array
------------------------------------------------- */	

$ly->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
);

/* -------------------------------------------------
THEME
------------------------------------------------- */
	
$ly->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'core',
);