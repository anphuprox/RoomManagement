<?php
class MainpageController{
    private $view;
    private $model;
    public function __construct()
    {
        $this->view='';
        $this->model=new MainpageModel();
    }
    public function index(){
       
    }
}

?>