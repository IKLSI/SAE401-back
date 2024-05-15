<?php

namespace App\Controller;

use App\Model\AvisModel;

class AvisController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new AvisModel instance to access the model layer
        $model = new AvisModel;
        
        // Call AvisModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }
}