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

	$raj->config['base_url'] = null;

/* -------------------------------------------------
Define SESSION-name
------------------------------------------------- */
	
	$raj->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);

/* -------------------------------------------------
Define server timezone
------------------------------------------------- */

	$raj->config['timezone'] = 'Europe/Stockholm';

/* -------------------------------------------------
Define encoding
------------------------------------------------- */

	$raj->config['character_encoding'] = 'UTF-8';

/* -------------------------------------------------
Länkquery

    * default      = 0      => index.php/controller/method/arg1/arg2/arg3
    * clean        = 1      => controller/method/arg1/arg2/arg3
    * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
------------------------------------------------- */

    $raj->config['url_type'] = 1;

/* -------------------------------------------------
Controller Array
------------------------------------------------- */	

$raj->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
);

/* -------------------------------------------------
THEME
------------------------------------------------- */
	
$raj->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'core',
);