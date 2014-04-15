<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  // Only if debug is wanted.
  $fl = CFloyd::Instance();  
  if(empty($fl->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($fl->config['debug']['db-num-queries']) && $fl->config['debug']['db-num-queries'] && isset($fl->db)) {
    $flash = $fl->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $fl->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($fl->config['debug']['db-queries']) && $fl->config['debug']['db-queries'] && isset($fl->db)) {
    $flash = $fl->session->GetFlash('database_queries');
    $queries = $fl->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }    
 // if(isset($fl->config['debug']['timer']) && $fl->config['debug']['timer']) {
 //   $html .= "<p>Page was loaded in " . round(microtime(true) - $fl->timer['first'], 5)*1000 . " msecs.</p>";
 // }    
  if(isset($fl->config['debug']['floyd']) && $fl->config['debug']['floyd']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CFloyd:</p><pre>" . htmlent(print_r($fl, true)) . "</pre>";
  }    
  if(isset($fl->config['debug']['session']) && $fl->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CFloyd->session:</p><pre>" . htmlent(print_r($fl->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }    
  return $html;
}


/**
* Get messages stored in flash-session.
*/
function get_messages_from_session() {
  $messages = CFloyd::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}



/**
 * Prepend the base_url.
 */
function base_url($url) {
  return CFloyd::Instance()->request->base_url . trim($url, '/');
}


/**
 * Create a url to an internal resource.
 */
function create_url($url) {
  return CFloyd::Instance()->request->CreateUrl($url);
}


/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
function theme_url($url) {
  $fl = CFloyd::Instance();
  return "{$fl->request->base_url}themes/{$fl->config['theme']['name']}/{$url}";
}


/**
 * Return the current url.
 */
function current_url() {
  return CFloyd::Instance()->request->current_url;
}


/**
 * Render all views.
 */
function render_views() {
  return CFloyd::Instance()->views->Render();
}
