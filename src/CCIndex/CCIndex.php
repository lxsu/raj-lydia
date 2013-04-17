<?php
/* -----------------------------------------------------------------------------
CCIndex.php

Beskrivning: CCIndex
Skapare: RaJ

Vettiga länkar:
http://php.net/manual/en/language.constants.predefined.php

================================================================================
------------------------------------------------------------------------------*/

class CCIndex implements IController {

    public function Index() {   
    global $raj;
         
       	$raj->data['title'] = "The Index Controller";
       }

    } 