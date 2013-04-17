<?php
/* -----------------------------------------------------------------------------
Functions.php

Beskrivning: Functions.php
Skapare: RaJ

Vettiga länkar:
http://php.net/manual/en/language.constants.predefined.php

================================================================================
------------------------------------------------------------------------------*/

    /**
    * Helpers for the template file.
    */
    $raj->data['header'] = '<h1>Header: RaJ</h1>';
    $raj->data['main']   = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';
    $raj->data['footer'] = '<p>Footer: &copy; Robin A Jönsson, learning MVC</p>';


    /**
    * Print debuginformation from the framework.
    */
function get_debug() {
  
      $raj = CRaj::Instance();
      $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($raj->config, true)) . "</pre>";
      $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($raj->data, true)) . "</pre>";
      $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($raj->request, true)) . "</pre>";
      return $html;
    }


function base_url($url) {
      return CRaj::Instance()->request->base_url . trim($url, '/');
    }

function current_url() {
      return CRaj::Instance()->request->current_url;
    }