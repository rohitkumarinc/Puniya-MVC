<?php

namespace App\Controllers;

class ErrorController
{
    public function notFound()
    {
        // You can return a view or simply echo a message
        echo "<h1>404 - Page Not Found</h1>";
        echo "<p>The page you are looking for does not exist.</p>";
    }
}
