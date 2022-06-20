<?php
class Controller_Link extends Controller
{
	function __construct()
	{
		$this->model = new Model_Link();
		$this->view = new View();
	}
	function action_index(){
        $URIParts = explode('?',$_SERVER['REQUEST_URI']);
        $routes = explode('/',$URIParts[0]);
        $url = $this->model->get_link($routes[1])['existsurl'];
        if (!empty($url)){
            $url = parse_url($url);
            if(!empty($url['scheme'])){
                $existurl = $url['scheme'] . "://";
            } else {
                $existurl = "http://";
            }
            $existurl = $existurl . $url['host'] . "/" . $url['path'] . $url['query'];
            header("Location: " . $existurl . "");
        } else{
            header("Location: /404");
        }
	}
}