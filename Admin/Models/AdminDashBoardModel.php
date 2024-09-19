<?php
class AdminDashboardModel{

public function __construct()
{
}
public function getWelcomeMessage() {
    return "Chào mừng đến với hệ thống quản lý phòng học";
}
public function getRooms($block = null, $capacity = null, $page = 1, $perPage = 10) {
    $currentTime = date('Y-m-d H:i:s');
    $query = "SELECT r.*, 
                CASE WHEN bd.room_id IS NULL THEN 'Trống' ELSE 'Đang mượn' END AS status
              FROM rooms r
              LEFT JOIN Booking_details bd ON r.room_id = bd.room_id 
                AND '".$currentTime. "' BETWEEN bd.start_time AND bd.end_time
              WHERE 1=1";
    if ($block) {
        $query .= " AND r.block = '".$block."'";
       
    }
    
    if ($capacity) {
        switch ($capacity) {
            case '0-50':
                $query .= " AND r.capacity <= 50";
                break;
            case '50-100':
                $query .= " AND r.capacity > 50 AND r.capacity <= 100";
                break;
            case '100+':
                $query .= " AND r.capacity > 100";
                break;
        }
    }
    
    $query .= " LIMIT " . intval($perPage) . " OFFSET " . intval(($page - 1) * $perPage);
  return getRaw($query);
}
public function getTotalRooms($block = null, $capacity = null) {
    $query = "SELECT * FROM rooms WHERE 1=1";
    $params = [];
    
    if ($block) {
        $query .= " AND block = '".$block."'";
    }
    
    if ($capacity) {
        switch ($capacity) {
            case '0-50':
                $query .= " AND capacity <= 50";
                break;
            case '50-100':
                $query .= " AND capacity > 50 AND capacity <= 100";
                break;
            case '100+':
                $query .= " AND capacity > 100";
                break;
        }
    }
    
 return getRow($query);
}

public function getBlocks() {
    $query = "SELECT DISTINCT block FROM rooms ORDER BY block";
    return getRaw($query);
}


public function getRoomStats() {
    $currentTime = date('Y-m-d H:i:s');
    
    $query = "SELECT 
                COUNT(*) as total_rooms,
                SUM(CASE WHEN room_id NOT IN (
                    SELECT DISTINCT room_id 
                    FROM Booking_details 
                    WHERE '.$currentTime.' BETWEEN start_time AND end_time
                ) THEN 1 ELSE 0 END) as available_rooms
              FROM rooms";
    
   return getRaw($query);
}

public function getBookedRooms() {
    $currentTime = date('Y-m-d H:i:s');
    
    $query = "SELECT r.room_name, r.block, r.capacity, bd.start_time, bd.end_time
              FROM rooms r
              JOIN Booking_details bd ON r.room_id = bd.room_id
              WHERE '.$currentTime.' BETWEEN bd.start_time AND bd.end_time";
    
   return getRaw($query);
}
}

?>