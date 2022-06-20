<?php

class DBConnector
{
    public function connect()
    {
        $server = "localhost";
        $db_name = "shrt_db";
        $db_username = "root";
        $db_password = "root";
        $res = mysqli_connect($server, $db_username, $db_password, $db_name);
        if ($res == false){
            echo mysqli_connect_error();
        }
        else{
            return $res;
        }
    }
}

