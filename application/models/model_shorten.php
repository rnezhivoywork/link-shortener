<?php
require_once "db_connector.php";
class Model_Shorten extends Model
{
    function __construct()
    {
        $this->DBConnector = new DBConnector();
    }
    public function new_link($code, $existurl)
    {
        $db_connect = $this->DBConnector->connect();
        $sql = "INSERT INTO urls (url, existsurl) VALUES('".$code."', '".$existurl."')";
        $result = mysqli_query($db_connect, $sql);
        if ($result == false) {
            echo mysqli_error($db_connect);
            mysqli_close($db_connect);
            return false;
        } else {
            mysqli_close($db_connect);
            return $result;
        }
    }
}