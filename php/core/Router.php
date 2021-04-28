<?php
require_once 'Controller.php';
session_start();

class Router
{
    public function __construct()
    {
        $controllerName = isset($_GET["controller"])
            ? $_GET["controller"]
            : "home";

        $actionName = isset($_GET["action"])
            ? $_GET["action"]
            : "index";

        $params = array_merge($this->GetParams($_GET), $this->GetParams($_POST));

        require_once "./php/controllers/$controllerName.php";

        $controller = new $controllerName();

        call_user_func_array(array($controller, $actionName), $params);
    }

    private function GetParams(array $arr)
    {
        $params = [];

        foreach ($arr as $key => $value) {
            if ($key == "controller" || $key == "action")
                continue;

            $params[$key] = $value;
        }

        return $params;
    }
}
