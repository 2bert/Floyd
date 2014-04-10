<?php
/**
* Holding a instance of CFloyd to enable use of $this in subclasses.
*
* @package FloydCore
*/
class CObject {

   public $config;
   public $request;
   public $data;

   /**
    * Constructor
    */
   protected function __construct() {
    $fl = CFloyd::Instance();
    $this->config   = &$fl->config;
    $this->request  = &$fl->request;
    $this->data     = &$fl->data;
  }

}