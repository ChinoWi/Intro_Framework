 <?php

 class HomeController {

   public function  indexAction(){
     return  new View('vistas','home',['usuario'=>'phpjava','clave'=>'12345']);
   }






 }
