<?php
class MainpageController{
    private $view;
    private $model;
    public function __construct()
    {
        $this->view=PATH_VIEW.'Mainpage.php';
        $this->model=new MainpageModel();
    }
    public function index(){
        $welcomeMessage=$this->model->getWelcomeMessage();
        $block=$this->model->getBlocks();
        $countRoom=$this->model->getTotalRooms();
        $BookedRoom=$this->model->getBookedRooms();
        $RoomStat=$this->model->getRoomStats();
        $blocks = $this->model->getBlocks();
        $selectedBlock = isset($_GET['block']) ? $_GET['block'] : null;
        $selectedCapacity = isset($_GET['capacity']) ? $_GET['capacity'] : null;

       // $roomInfo=$this->model->getRooms();
       $currentTime = date('Y-m-d H:i:s');

       include $this->view;

    }
}

?>