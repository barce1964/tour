<?php
    class Router {
        
        private $routes;

        public function __construct() {
            $routesPath = ROOT . '/php/configs/routes.php';
            $this->routes = include($routesPath);
        }

        // метод возвращает строку запроса uri
        private function getURI() {
            // print_r($_SERVER['REQUEST_URI']);
            // echo '<br>';
            if(!empty($_SERVER['REQUEST_URI'])) {
                if ($_SERVER['REQUEST_URI'] == '/') {
                    return 'about';
                }
                return trim($_SERVER['REQUEST_URI'], '/');
            }
        }

        public function run() {
            // Получить строку запроса

            $uri = $this->getURI();
            // echo "uri = " . $uri . "<br>";
            // Проверить наличие такого запроса в routes.php

            $i = 0;
            $result = null;
            foreach ($this->routes as $uriPattern => $path) {
                // Сравнение uriPattern и uri
                // echo "uriPattern = " . $uriPattern . "<br>";
                // echo "path = " . $path . "<br>";
                if(preg_match("~$uriPattern~", $uri)) {
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                    // echo "internalRoute = " . $internalRoute . "<br>";
                    $segments = explode('/', $internalRoute);
                    // print_r($segments);
                    // echo "<br>";
                    // Если есть совпадения, определить какой контроллер
                    // и action обрабатывают запрос
                    // 
                    $controllerName = array_shift($segments) . 'Controller';
                    // echo "controllerName = " . $controllerName . "<br>";
                    $controllerName = ucfirst($controllerName);
                    $actionName = 'action' . ucfirst(array_shift($segments));
                    $parameters = $segments;
                    // echo "controllerName = " . $controllerName . "<br>";
                    // echo "actionName = " . $actionName . "<br>";
                    // Подключить файл класса контроллера

                    $controllerFile = ROOT . '/php/controllers/' . $controllerName . '.php';
                    // echo "controllerFile = " . $controllerFile . "<br>";
                    if(file_exists($controllerFile)) {
                        // echo 'test<br>';
                        // $fl = true;
                        include_once($controllerFile);
                    }

                    // Создать объект. Вызвать метод, т.е. action.

                    $controllerObject = new $controllerName;
                    // $result = $controllerObject->$actionName($parameters);
                    
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                    // echo $result . '<br>';                
                    if ($result != null) {
                        break;
                    }   
                    
                }
            }
        }
    }
?>
