<?php

namespace App\Controller;

use App\Model\EtuSemestreModel;
use Exception;

class EtuSemestreController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new EtuSemestreModel instance to access the model layer
        $model = new EtuSemestreModel();
        
        // Call AnneeModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new EtuSemestreModel instance to access the model layer
        $model = new EtuSemestreModel();
        // Call EtuSemestreModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function addUser()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new EtuSemestreModel instance
            $user = new EtuSemestreModel();
			
            // Assign data from the POST request to the EtuSemestreModel object
            $user->id_etu = $data['id_etu'];
            $user->id_semestre = $data['id_semestre'];
            $user->absences = $data['absences'];
            $user->rang = $data['rang'];
            $user->moyenne = $data['moyenne'];

            // Call the insert method of EtuSemestreModel to insert the data into the database
            $user->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("User added successfully!");
    }
}