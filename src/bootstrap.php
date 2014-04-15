<?php
/**
* Bootstrapping, setting up and loading the core.
*
* @package FloydCore
*/

/** 
* Helper, wrap html_entites with correct character encoding 
*/ 
function htmlent($str, $flags = ENT_COMPAT) { 
  return htmlentities($str, $flags, CFloyd::Instance()->config['character_encoding']); 
} 

/**
* Enable auto-load of class declarations.
*/
function autoload($aClassName) {
  $classFile = "/src/{$aClassName}/{$aClassName}.php";
   $file1 = FLOYD_SITE_PATH . $classFile;
   $file2 = FLOYD_INSTALL_PATH . $classFile;
   if(is_file($file1)) {
      require_once($file1);
   } elseif(is_file($file2)) {
      require_once($file2);
   }
}
spl_autoload_register('autoload');

/**
* Set a default exception handler and enable logging in it.
*/
function exception_handler($exception) {
  echo "Floyd: Uncaught exception: <p>" . $exception->getMessage() . "</p><pre>" . $exception->getTraceAsString(), "</pre>";
}
set_exception_handler('exception_handler');