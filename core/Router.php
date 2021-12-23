<?php

namespace app\core;

/**
 * @package app\core
 */
class Router
{
    public Request $request;
    protected array $routes = [];
    /*  co nghia la     'get'=> [
               '/' => callback,
               'contact' => callback
           ],
           post' => callback'
    */
    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
        //chu thich dong 12
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            return "Not found ";
        }
        if (is_string($callback)) {
            return $this->rendrView($callback);
        }
        return call_user_func($callback);
        //call_user_func la goi lai ham noi khac.
    }

    public function rendrView($view)
    {
        $layoutContent = $this->layoutContent();
        $viewContent = $this->rendrOnlyViews($view);
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

    protected function rendrOnlyViews($view)
    {
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}