 <?php

 class View extends Response{
   protected $file;
   protected $template;
   protected $vars=array();

   public function __construct($file,$template,$vars=array()){ 
       $this->file=$file;
       $this->template = $template;
       $this->vars = $vars;    
   }

    public function getTemplate(){
    	 return $this->template;
    }

    public function getTemplateFileName(){
    	 return $this->file;
    }

    public function getVars(){
        return $this->vars;
    }

    public function execute(){
    $file =  $this->getTemplateFileName();
    $template = $this->getTemplate();
    $vars = $this->getVars();	
    
    call_user_func(function() use ($file,$template,$vars){
         extract($vars);
         ob_start();
         require "$file/$template.tpl.php";
         $contenido=ob_get_clean();
         require "$file/layout.tpl.php";
    }); 

   }

 }