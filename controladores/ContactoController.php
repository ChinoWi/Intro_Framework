 <?php

class ContactoController{

	public function indexAction(){
      return new View('vistas','contacto',['c1'=>'jorge','c2'=>'juana','c3'=>'william']);
	}

	public function ciudadAction($ciudad){
         exit("ciudad:".$ciudad);     
	}



}




