<?php

use App\Controller\UsersController;
use App\Modules\HttpMethod;
use App\Modules\Router;

// Router::request(HttpMethod::GET, "/path", [YourController::class, "someMethod"]);
 Router::request(HttpMethod::GET, "/users", [UsersController::class, "index"]);
 Router::request(HttpMethod::GET, "/users/*", [UsersController::class, "show"]);