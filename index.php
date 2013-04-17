<?php
/* -----------------------------------------------------------------------------
index.php

Beskrivning: index-fil
Skapare: RaJ

Vettiga länkar:
http://php.net/manual/en/language.constants.predefined.php

================================================================================
------------------------------------------------------------------------------*/



/* -------------------------------------------------
"bootstrap" är initieringsfasen där de oundvikliga grunderna etableras och defineras. 
Dessa behövs i varje förfrågan
------------------------------------------------- */
//
// PHASE: BOOTSTRAP
//

define('RAJ_INSTALL_PATH', dirname(__FILE__));
define('RAJ_SITE_PATH', RAJ_INSTALL_PATH . '/site');

require(RAJ_INSTALL_PATH.'/src/CRaj/bootstrap.php');

$raj = CRaj::Instance();

/* -------------------------------------------------
"frontController->route" tar hand om förfrågan och tolkar ut vilken kontroller och metod
som skall anropas. Därefter sker all bearbetning i kontrollern
------------------------------------------------- */
//
// PHASE: FRONTCONTROLLER ROUTE
//

$raj->FrontControllerRoute();

/* -------------------------------------------------
"themeEngine->render" skapar själva slutresultatet, webbsidan. Allt innehåll finns tillgängligt
och med hjälp av template-filer överförs innehållet till HTML-filer.
------------------------------------------------- */
//
// PHASE: THEME ENGINE RENDER
//

$raj->ThemeEngineRender();