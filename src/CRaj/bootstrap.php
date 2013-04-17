<?php
/* -----------------------------------------------------------------------------
boostrap.php

Beskrivning: bootstrap
Skapare: RaJ

Vettiga länkar:
http://php.net/manual/en/language.constants.predefined.php

================================================================================
------------------------------------------------------------------------------*/

function autoload($aClassName) {

	$classFile = "/src/{$aClassName}/{$aClassName}.php";
	$file1 = RAJ_INSTALL_PATH . $classFile;
	$file2 = RAJ_SITE_PATH . $classFile;

		if(is_file($file1)) {
			require_once($file1);
		} elseif (is_file($file2)) {
			require_once($file2);
		}
}

spl_autoload_register('autoload');