<?php
/**
* Site configuration, this file is changed by user per site.
*
*/

/**
* Set level of error reporting
*/
error_reporting(-1);
ini_set('display_errors', 1);


/**
 * Define session name
 */
$fl->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);


/**
* Set what to show as debug or developer information in the get_debug() theme helper.
*/
$fl->config['debug']['floyd'] = false;
$fl->config['debug']['session'] = false;
$fl->config['debug']['timer'] = true;
$fl->config['debug']['db-num-queries'] = true;
$fl->config['debug']['db-queries'] = true;

/**
* Set database(s).
*/
$fl->config['database'][0]['dsn'] = 'sqlite:' . FLOYD_SITE_PATH . '/data/.ht.sqlite';


/**
 * Set a base_url to use another than the default calculated
 */
$fl->config['base_url'] = null;



/**
 * What type of urls should be used?
 * 
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$fl->config['url_type'] = 1;




/**
 * Define server timezone
 */
$fl->config['timezone'] = 'Europe/Stockholm';


/**
 * Define internal character encoding
 */
$fl->config['character_encoding'] = 'UTF-8';


/**
 * Define language
 */
$fl->config['language'] = 'en';


/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is 
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $fl->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$fl->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
);

/**
 * Settings for the theme.
 */
$fl->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'core', 
);

/**
* Set session key
*/
$fl->config['session_key']  = 'floyd';
