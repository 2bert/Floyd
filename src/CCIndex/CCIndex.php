<?php
/**
* Standard controller layout.
* 
* @package FloydCore
*/
class CCIndex implements IController {

   /**
    * Implementing interface IController. All controllers must have an index action.
    */
   public function Index() {   
      global $fl;
      $fl->data['title'] = "The Index Controller";
      $fl->data['main'] = "<h1>The Index Controller</h1>";
   }

}