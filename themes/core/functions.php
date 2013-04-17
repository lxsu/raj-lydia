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
    $ly->data['header'] = '<h1>Header: Lydia</h1>';
    $ly->data['main']   = '<p>Main: Now with a theme engine, Not much more to report for now.</p>';
    $ly->data['footer'] = '<p>Footer: &copy; Robin A Jönsson, learning Lydia</p>';


    /**
    * Print debuginformation from the framework.
    */
function get_debug() {
  
      $ly = CLydia::Instance();
      $html = "<h2>Debuginformation</h2><hr><p>The content of the config array:</p><pre>" . htmlentities(print_r($ly->config, true)) . "</pre>";
      $html .= "<hr><p>The content of the data array:</p><pre>" . htmlentities(print_r($ly->data, true)) . "</pre>";
      $html .= "<hr><p>The content of the request array:</p><pre>" . htmlentities(print_r($ly->request, true)) . "</pre>";
      return $html;
    }


function base_url($url) {
      return CLydia::Instance()->request->base_url . trim($url, '/');
    }

function current_url() {
      return CLydia::Instance()->request->current_url;
    }