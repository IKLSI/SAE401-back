<?php

use App\Controller\AnneeController;
use App\Controller\AvisController;
use App\Controller\CoefficientController;
use App\Controller\CompetenceController;
use App\Controller\EtuCompController;
use App\Controller\EtudiantController;
use App\Controller\EtuModuleController;
use App\Controller\EtuSemestreController;
use App\Controller\ModuleController;
use App\Controller\SemestreController;
use App\Controller\UsersController;
use App\Modules\HttpMethod;
use App\Modules\Router;

// Router::request(HttpMethod::GET, "/path", [YourController::class, "someMethod"]);
 Router::request(HttpMethod::GET, "/api/etudiant", [EtudiantController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/etudiant/*", [EtudiantController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/annee", [AnneeController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/annee/*", [AnneeController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/semestre", [SemestreController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/semestre/*", [SemestreController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/competence", [CompetenceController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/competence/*", [CompetenceController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/module", [ModuleController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/module/*", [ModuleController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/coefficient", [CoefficientController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/coefficient/*", [CoefficientController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/etusemestre", [EtuSemestreController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/etusemestre/*", [EtuSemestreController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/etucomp", [EtuCompController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/etucomp/*", [EtuCompController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/etumodule", [EtuModuleController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/etumodule/*", [EtuModuleController::class, "show"]);

 Router::request(HttpMethod::GET, "/api/users", [UsersController::class, "getAll"]);
 Router::request(HttpMethod::GET, "/api/users/*", [UsersController::class, "get"]);
 Router::request(HttpMethod::POST, "/api/addUser", [UsersController::class, "addUser"]);
 

 Router::request(HttpMethod::GET, "/api/avis", [AvisController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/avis/*", [AvisController::class, "show"]);
 