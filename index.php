 <?php

  require 'config.php';
  require 'clases/Request.php';
  require 'clases/Inflector.php';
  require 'clases/Response.php';
  require 'clases/View.php';

  if(empty($_GET['url'])){
     $url="";
  }
  else{
  	$url=$_GET['url'];
  }

  $request=new Request($url);
  //exit($request->getControllerFileName());
 exit($request->execute());

 



 
