<?php

class PatternRouter {
    private function stripParameters($uri) {
        if(str_contains($uri, '?')) {
            $uri = substr($uri, 0, strpos($uri, '?'));
        }
        return $uri;
    }

    public function route($uri)
    {
        // check for api route
        $api = false;
        if (str_starts_with($uri, "api/")) {
            $uri = substr($uri, 4);
            $api = true;
        }


        // set default controller/method
        $defaultcontroller = 'home';
        $defaultmethod = 'index';

        $uri = $this->stripParameters($uri);
        $explodedUri = explode('/', $uri);


        // check and set default or other value
        if (!isset($explodedUri[0]) || empty($explodedUri[0])) {
            $explodedUri[0] = $defaultcontroller;
        }
        $controllerName = $explodedUri[0] . "controller";

        if (!isset($explodedUri[1]) || empty($explodedUri[1])) {
            $explodedUri[1] = $defaultmethod;
        }
        $methodName = $explodedUri[1];


        // load the file with the controller class
        $filename = __DIR__ . '/controller/' . $controllerName . '.php';
        if ($api) {
            $filename = __DIR__ . '/api/controller/' . $controllerName . '.php';
        }
        if (file_exists($filename)) {
            require $filename;
        } else {
            http_response_code(404);
            die();
        }

        
        // dynamically call relevant controller method
        try {
            $controllerObj = new $controllerName;
            $controllerObj->{$methodName}();
        } catch (Exception $e) {
            http_response_code(404);
            die();
        }
    }
}
?>
