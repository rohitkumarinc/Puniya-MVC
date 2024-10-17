<?php

namespace App\Middleware;

class AuthMiddleware
{
    public function handle($request, $next)
    {
        // Check if the user is authenticated
        // if (!isset($_SESSION['user'])) { // Example: Check session for user
        //     // Redirect to login if not authenticated
        //     header('Location: /login');
        //     exit; // Stop further execution
        // }

        // Continue to the next middleware or the request handler
        return $next($request);
    }
}
