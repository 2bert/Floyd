<?php
/**
* A guestbook controller as an example to show off some basic controller and model-stuff.
* 
* @package FloydCore
*/
class CCGuestbook extends CObject implements IController {

  private $guestbookModel;
  
  

  /**
   * Constructor
   */
  public function __construct() {
    parent::__construct();
    $this->guestbookModel = new CMGuestbook();
  }


  /**
   * Implementing interface IController. All controllers must have an index action.
   * Show a standard frontpage for the guestbook.
   */
  public function Index() {
    $this->views->SetTitle('Floyd Guestbook Example');
    $this->views->AddInclude(__DIR__ . '/index.tpl.php', array(
      'entries'=>$this->guestbookModel->ReadAll(), 
      'formAction'=>$this->request->CreateUrl('guestbook/handler')
    ));
  }
  

  public function Handler() { 
    if(isset($_POST['doAdd'])) { 
      
      if(!empty($_POST['email'])){ 
        
      } 
      else{ 
        $this->guestbookModel->Add(strip_tags($_POST['newEntry'])); 
      } 
    } 
    elseif(isset($_POST['doClear'])) { 
      $this->guestbookModel->DeleteAll(); 
    } 
    elseif(isset($_POST['doCreate'])) { 
      $this->guestbookModel->Init(); 
    } 
    $this->RedirectTo($this->request->CreateUrl($this->request->controller)); 
  } 

}