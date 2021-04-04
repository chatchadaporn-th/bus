<?php

class conPathfrom extends ConnectDatabase
{

    public function allProvinces()
    {
        try {
            $stmt = $this->connect()->query("SELECT  DISTINCT traveling_name FROM traveling");
            return $stmt;
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
    public function conSearchLog($search_start, $search_end)
    {
        try {
            if($search_start && $search_end){
                $stmt = $this->connect()->prepare("SELECT * FROM paths AS t1 INNER JOIN traveling_time AS t2 ON (t1.path_id =t2.path_id) INNER JOIN bus_table AS t3 ON (t1.bus_id =t3.bus_id) WHERE t1.origin=? AND t1.destination=?");
                $stmt->execute([$search_start, $search_end]);
                return $stmt;
            }
            return null;
           
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
}
