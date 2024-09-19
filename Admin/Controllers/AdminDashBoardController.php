<?php

class AdminDashboardController{
    private $view;
    private $model;
    public function __construct()
    {
        $this->view=PATH_VIEW_ADMIN.'AdminDashBoard.php';
        $this->model=new AdminDashboardModel();
    }
    public function index(){
        $welcomeMessage=$this->model->getWelcomeMessage();
        $block=$this->model->getBlocks();
        $countRoom=$this->model->getTotalRooms();
        $bookedRooms=$this->model->getBookedRooms();
        $RoomStat=$this->model->getRoomStats();
        $blocks = $this->model->getBlocks();
        $selectedBlock = isset($_GET['block']) ? $_GET['block'] : null;
        $selectedCapacity = isset($_GET['capacity']) ? $_GET['capacity'] : null;
        $perpage=10;
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $rooms = $this->model->getRooms($selectedBlock, $selectedCapacity, $page, $perpage);
        $tmpTotalRoom=$this->model->getTotalRooms($selectedBlock,$selectedCapacity);
        $totalPages = ceil($tmpTotalRoom / $perpage);
       // $roomInfo=$this->model->getRooms();
       $currentTime = date('Y-m-d H:i:s');
       if (isset($_GET['ajax'])) {
        include PATH_VIEW.'room-table.php';
    } else {
     
        include $this->view;
    }

    }
}

?>
 
