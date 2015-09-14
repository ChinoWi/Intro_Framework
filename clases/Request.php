 <?php

 class Request{
 	 protected $url;
 	 protected $controller;
 	 protected $defaultController="home";
 	 protected $action;
 	 protected $defaultAction="index";
 	 protected $params=array();


 public function __construct($url){
       $this->url = $url;
       $segmentos=explode("/",$this->getUrl());
       $this->resolveController($segmentos);
       $this->resolveAction($segmentos);
       $this->resolveParametros($segmentos);
 }

 	public function getUrl(){
 		return $this->url;
 	}

 	public function resolveController(&$segmentos){
      $this->controller=array_shift($segmentos);
       if(empty($this->controller)){
         $this->controller=$this->defaultController;	
       }
       //exit($this->controller);
 	}

 	public function resolveAction(&$segmentos){
      $this->action=array_shift($segmentos);

       if(empty($this->action)){
       	$this->action=$this->defaultAction;
       }	
 	}

 	public function resolveParametros(&$segmentos){

       $this->params=$segmentos;
 	}

 	public function getController(){
 		 return $this->controller; //home
 	}

 	public function getControllerClassName(){
      return Inflector::camel($this->getController()).'Controller';       //home-users 
 	}

 	public function getControllerFileName(){
       return 'controladores/'.$this->getControllerClassName().'.php';
 	}

 	public function getAction(){
 		return $this->action;
 	}

 	public function getActionMethod(){   //metoddo = holaMetodo Pimera minuscula

      return Inflector::lower($this->getAction()).'Action';
 	}

 	public function getParametros(){
 		  return $this->params;
 	}
 	

 	public function execute(){
 	   $controllerClassName = $this->getControllerClassName();
 	   $controllerFileName = $this->getControllerFileName();
     $controllerMethod = $this->getActionMethod();
     $params = $this->getParametros();
     //exit($controllerClassName);

     if(!file_exists($controllerFileName)){
     	exit("no existe file");
     }
      require $controllerFileName;

      $controller=new $controllerClassName();
      $resp = call_user_func_array([$controller,$controllerMethod], $params);
      $this->executeResponse($resp);
 	}


  public function executeResponse($resp){
      
      if($resp instanceof Response){
         $resp->execute();
      }
      else{
        exit("respuesta no valida");
      }

  }
 


 }