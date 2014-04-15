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
   public $config;
   public $request;
   public $data;
   public $db;
   public $views;
   public $session;

   /**
    * Constructor
    */
   protected function __construct() {
    $fl = CFloyd::Instance();
    $this->config   = &$fl->config;
    $this->request  = &$fl->request;
    $this->data     = &$fl->data;
    $this->db       = &$fl->db;
    $this->views    = &$fl->views;
    $this->session  = &$fl->session;
  }
  
  /** 
  * Redirect to another url and store the session 
  */ 
  protected function RedirectTo($url) { 
      $fl = CFloyd::Instance(); 
      if(isset($fl->config['debug']['db-num-queries']) && $fl->config['debug']['db-num-queries'] && isset($fl->db)) { 
        $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries()); 
      } 
      if(isset($fl->config['debug']['db-queries']) && $fl->config['debug']['db-queries'] && isset($fl->db)) { 
        $this->session->SetFlash('database_queries', $this->db->GetQueries()); 
      } 
      /*if(isset($fl->config['debug']['timer']) && $fl->config['debug']['timer']) { 
        $this->session->SetFlash('timer', $fl->timer); 
      }*/ 
      $this->session->StoreInSession(); 
      header('Location: ' . $this->request->CreateUrl($url)); 
  } 
}