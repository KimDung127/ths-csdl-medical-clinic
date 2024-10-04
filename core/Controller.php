<?php
class Controller {
    protected function view($view, $data = []) {
        extract($data);

        // Start output buffering to capture the view content
        ob_start();
        require_once __DIR__ . "/../app/views/{$view}.php";
        $content = ob_get_clean(); // Get the content of the view

        // Now require the layout file and pass $content to it
        require_once __DIR__ . "/../app/views/layout.php";
    }
}
