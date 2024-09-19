<?php
class SearchingEmptyRoomController{
    private $view;
    private $model;
    public function __construct()
    {
        $this->view=PATH_VIEW;
        $this->model=new EmptyRommModel();
    }
    public function index(){
        echo 'dddd';
    }
}
?>