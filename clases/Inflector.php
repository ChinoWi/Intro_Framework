 <?php

 class Inflector{

  public static function camel($value){
  $segmentos=explode("-",$value);

  array_walk($segmentos,function(&$item){
  	 $item=ucfirst($item);  
  });
  
     return implode('',$segmentos);
  }


  public static function lower($value){
   return lcfirst(static::camel($value));
  }

  


 }