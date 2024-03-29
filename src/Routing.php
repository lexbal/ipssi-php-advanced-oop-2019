<?php

namespace src;

class Routing
{

    public static $routeFile = "routes.yml";

    public static function getRoute($slug){
        $routes = yaml_parse_file(self::$routeFile);

        if( isset($routes[$slug])){
            if(empty($routes[$slug]["controller"]) || empty($routes[$slug]["action"])){
                die("Il y a une erreur dans le fichier routes.yml");
            }

            $c = ucfirst($routes[$slug]["controller"])."Controller";
            $a = $routes[$slug]["action"]."Action";
            $cPath = "src/Controllers/".$c.".php";
        }else{
            return ["c"=>null, "a"=>null,"cPath"=>null ];
        }

        return ["c"=>$c, "a"=>$a,"cPath"=>$cPath ];
    }
}










