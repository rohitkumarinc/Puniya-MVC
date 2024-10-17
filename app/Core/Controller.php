<?php

namespace App\Core;

class Controller
{
    protected function view($view, $data = [])
    {
        extract($data);
        require_once "../app/Views/{$view}.php";
    }
}
