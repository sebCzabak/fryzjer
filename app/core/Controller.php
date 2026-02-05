<?php
namespace App\Core;

class Controller {
   protected function view($viewPath, $data = []) {
    extract($data);

    ob_start();

    require_once "../views/" . $viewPath . ".php";

    $content = ob_get_clean();


    require_once "../views/layout.php";
}
}