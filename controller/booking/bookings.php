<?php

class conBooking extends ConnectDatabase
{
    public function allPaths()
    {
        try {
            $stmt = $this->connect()->query("SELECT * FROM paths");
            return $stmt;
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }
    public function allSests()
    {
        try {
            $stmt = $this->connect()->query("SELECT * FROM seat  ");
            return $stmt;
        } catch (Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }
    }


}



