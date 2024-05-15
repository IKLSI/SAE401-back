<?php

use App\Controller\AvisController;
use App\Controller\UsersController;
use App\Modules\HttpMethod;
use App\Modules\Router;

// Router::request(HttpMethod::GET, "/path", [YourController::class, "someMethod"]);
 Router::request(HttpMethod::GET, "/api/users", [UsersController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/users/*", [UsersController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/avis", [AvisController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/avis/*", [AvisController::class, "show"]);