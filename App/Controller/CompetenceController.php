<?php

namespace App\Controller;

use App\Model\CompetenceModel;

class CompetenceController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new CompetenceModel instance to access the model layer
        $model = new CompetenceModel();
        
        // Call CompetenceModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new CompetenceModel instance to access the model layer
        $model = new CompetenceModel();
        // Call CompetenceModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }
}