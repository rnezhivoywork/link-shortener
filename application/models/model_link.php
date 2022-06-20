<?php
require_once "db_connector.php";
class Model_Link extends Model
{
    function __construct()
    {
        $this->DBConnector = new DBConnector();
    }
    public function get_link($code)
    {
        $db_connect = $this->DBConnector->connect();
        $sql = "SELECT existsurl FROM urls WHERE url='" . $code . "'";
        $result = mysqli_query($db_connect, $sql);
        if ($result == false) {
            echo mysqli_error($db_connect);
            mysqli_close($db_connect);
            return false;
        } else {
            $result = mysqli_fetch_assoc($result);
            mysqli_close($db_connect);
            return $result;
        }
    }
}