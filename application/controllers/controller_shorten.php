<?php
class Controller_Shorten extends Controller
{
	function __construct()
	{
		$this->model = new Model_Shorten();
		$this->view = new View();
	}
	function action_index(){
        $mask = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890";
		$url = $_GET['url'];
        if($url != ""){
            $randomstr = $mask[rand(0, 61)] . $mask[rand(0, 61)] . $mask[rand(0, 61)] . $mask[rand(0, 61)] . $mask[rand(0, 61)] . $mask[rand(0, 61)];
            $shorten = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . "/" . $randomstr;
            if($this->model->new_link($randomstr, $url) === TRUE){
                echo $shorten;
            } else{
                echo "Error";
            }
        }
        else{
            header('Location: /');
        }
	}
}