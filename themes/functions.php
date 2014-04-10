<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  $fl = CFloyd::Instance();  
  $html = null;
  if(isset($fl->config['debug']['display-floyd'])) {
    $html = "<hr><h3>Debuginformation</h3><p>The content of CFloyd:</p><pre>" . htmlentities(print_r($fl, true)) . "</pre>";
  }    
  return $html;
}



/**
 * Prepend the base_url.
 */
function base_url($url) {
  return $fl->request->base_url . trim($url, '/');
}


/**
 * Return the current url.
 */
function current_url() {
  return $fl->request->current_url;
}

