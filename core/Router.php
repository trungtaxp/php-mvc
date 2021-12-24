<?php

namespace app\core;

/**
 * @package app\core
 */
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];
    /*  co nghia la     'get'=> [
               '/' => callback,
               'contact' => callback
           ],
           post' => callback'
    */
    /**
     * @param Request $request
     * @param Request $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
        //chu thich dong 12
    }
    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
        //chu thich dong 12
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->rendrView("_404");
        }
        if (is_string($callback)) {
            return $this->rendrView($callback);
        }
        if(is_array($callback)) {
            $callback[0] = new $callback[0]();
        }
        //fix loi controller class khong ho tro trong php 7.4 va nhan duong dan them duoi
        return call_user_func($callback);
        //call_user_func la goi lai ham noi khac.
    }

    public function rendrView($view, $params = [])
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->rendrOnlyViews($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        // thay the {{content}} -> layout khac (frontend).
    }
    public function rendrContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {

        ob_start();
        // cải thiện hiệu suất máy chủ vì có nhiều dữ liệu lớn .ví dụ: 4KB (cuộc gọi obhst ob_start, php sẽ gửi từng tiếng vang tới trình duyệ
        include_once Application::$ROOT_DIR . "/views/layouts/main.php";
        return ob_get_clean();
        // đóng cải thiện.
    }

    protected function rendrOnlyViews($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}