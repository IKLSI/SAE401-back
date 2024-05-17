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
 Router::request(HttpMethod::GET, "/api/etudiantCode/*", [EtudiantController::class, "getEtudiantByCode"]);
 Router::request(HttpMethod::POST, "/api/addEtudiant", [EtudiantController::class, "addEtudiant"]);
 Router::request(HttpMethod::PUT, "/api/updateEtudiant", [EtudiantController::class, "updateEtudiant"]);
 Router::request(HttpMethod::DELETE, "/api/deleteEtudiant/*", [EtudiantController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/annee", [AnneeController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/annee/*", [AnneeController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addAnnee", [AnneeController::class, "addAnnee"]);
 Router::request(HttpMethod::DELETE, "/api/deleteAnnee/*", [AnneeController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/semestre", [SemestreController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/semestre/*", [SemestreController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addSemestre", [SemestreController::class, "addSemestre"]);
 Router::request(HttpMethod::DELETE, "/api/deleteSemestre/*", [SemestreController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/competence", [CompetenceController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/competence/*", [CompetenceController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addCompetence", [CompetenceController::class, "addCompetence"]);
 Router::request(HttpMethod::OPTIONS, "/api/addCompetence", [CompetenceController::class, "options"]);
 Router::request(HttpMethod::DELETE, "/api/deleteCompetence/*", [CompetenceController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/module", [ModuleController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/module/*", [ModuleController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addModule", [ModuleController::class, "addModule"]);
 Router::request(HttpMethod::DELETE, "/api/deleteModule/*", [ModuleController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/coefficient", [CoefficientController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/coefficient/*", [CoefficientController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addCoefficient", [CoefficientController::class, "addCoefficient"]);
 Router::request(HttpMethod::PUT, "/api/updateCoefficient", [CoefficientController::class, "updateCoefficient"]);
 Router::request(HttpMethod::DELETE, "/api/deleteCoefficient/*", [CoefficientController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/etuSemestre", [EtuSemestreController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/etuSemestre/*", [EtuSemestreController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addEtuSemestre", [EtuSemestreController::class, "addEtuSemestre"]);
 Router::request(HttpMethod::DELETE, "/api/deleteEtuSemestre/*", [EtuSemestreController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/etuComp", [EtuCompController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/etuComp/*", [EtuCompController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addEtuComp", [EtuCompController::class, "addEtuComp"]);
 Router::request(HttpMethod::DELETE, "/api/deleteEtuComp/*", [EtuCompController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/etuModule", [EtuModuleController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/etuModule/*", [EtuModuleController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addEtuModule", [EtuModuleController::class, "addEtuModule"]);
 Router::request(HttpMethod::PUT, "/api/updateEtuModule", [EtuModuleController::class, "updateEtuModule"]);
 Router::request(HttpMethod::DELETE, "/api/deleteEtuModule/*", [EtuModuleController::class, "delete"]);

 Router::request(HttpMethod::GET, "/api/users", [UsersController::class, "getAll"]);
 Router::request(HttpMethod::GET, "/api/users/*", [UsersController::class, "get"]);
 Router::request(HttpMethod::POST, "/api/addUser", [UsersController::class, "addUser"]);
 Router::request(HttpMethod::DELETE, "/api/deleteUser/*", [UsersController::class, "delete"]);
 Router::request(HttpMethod::GET, "/api/verifyUser", [UsersController::class, "verifyUser"]);

 Router::request(HttpMethod::GET, "/api/avis", [AvisController::class, "index"]);
 Router::request(HttpMethod::GET, "/api/avis/*", [AvisController::class, "show"]);
 Router::request(HttpMethod::POST, "/api/addAvis", [AvisController::class, "addAvis"]);
 Router::request(HttpMethod::DELETE, "/api/deleteAvis/*", [AvisController::class, "delete"]);
