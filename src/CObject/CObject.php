<?php
/**
* Holding a instance of CFloyd to enable use of $this in subclasses.
*
* @package FloydCore
*/
class CObject {

	/**
	 * Members
	 */
	protected $fl;
	protected $config;
	protected $request;
	protected $data;
	protected $db;
	protected $views;
	protected $session;
	protected $user;

  /**
   * Constructor, can be instantiated by sending in the $fl reference.
   */
  protected function __construct($fl=null) {
    if(!$fl) {
      $fl = CFloyd::Instance();
    }
    $this->fl       = &$fl;
    $this->config   = &$fl->config;
    $this->request  = &$fl->request;
    $this->data     = &$fl->data;
    $this->db       = &$fl->db;
    $this->views    = &$fl->views;
    $this->session  = &$fl->session;
    $this->user     = &$fl->user;
  }
  
/**
	 * Wrapper for same method in CFloyd. See there for documentation.
	 */
	protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
    $this->fl->RedirectTo($urlOrController, $method, $arguments);
  }


	/**
	 * Wrapper for same method in CFloyd. See there for documentation.
	 */
	protected function RedirectToController($method=null, $arguments=null) {
    $this->fl->RedirectToController($method, $arguments);
  }


	/**
	 * Wrapper for same method in CFloyd. See there for documentation.
	 */
	protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
    $this->fl->RedirectToControllerMethod($controller, $method, $arguments);
  }


	/**
	 * Wrapper for same method in CFloyd. See there for documentation.
	 */
  protected function AddMessage($type, $message, $alternative=null) {
    return $this->fl->AddMessage($type, $message, $alternative);
  }


	/**
	 * Wrapper for same method in CFloyd. See there for documentation.
	 */
	protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
    return $this->fl->CreateUrl($urlOrController, $method, $arguments);
  }

  
}