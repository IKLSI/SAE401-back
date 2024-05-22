<?php

namespace App\Controller;

use App\Model\EtuModuleModel;
use Exception;

class EtuModuleController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new EtuModuleModel instance to access the model layer
        $model = new EtuModuleModel();
        
        // Call EtuModuleModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new EtuModuleModel instance to access the model layer
        $model = new EtuModuleModel();
        // Call EtuModuleModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function addEtuModule()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new EtuModuleModel instance
            $user = new EtuModuleModel();
			
            // Assign data from the POST request to the EtuModuleModel object
            $user->id_etu = $data['id_etu'];
            $user->id_coef = $data['id_coef'];
            $user->note = $data['note'];

            // Call the insert method of EtuModuleModel to insert the data into the database
            $user->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("EtuModule added successfully!");
    }

    public static function addManyEtuModule()
    {
        $manyData = parent::receiveJSONRequest();
        foreach($manyData as $data) {
            try {
                // Create a new EtuModuleModel instance
                $user = new EtuModuleModel();
                
                // Assign data from the POST request to the EtuModuleModel object
                $user->id_etu = $data['id_etu'];
                $user->id_coef = $data['id_coef'];
                $user->note = $data['note'];
    
                // Call the insert method of EtuModuleModel to insert the data into the database
                $user->insert();
            } catch (Exception $e) {
                // Handle the exception (e.g., return an error response)
                return "Error: " . $e->getMessage();
            }
                        
        }
        parent::sendJSONResponse("EtuModules added successfully!");

    }

    public static function updateEtuModule()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new EtuModuleModel instance
            $user = new EtuModuleModel();
			
            // Assign data from the POST request to the EtuModuleModel object
            $user->id_etu = $data['id_etu'];
            $user->id_coef = $data['id_coef'];
            $user->note = $data['note'];

            // Call the insert method of EtuModuleModel to insert the data into the database
            $user->update();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("EtuModule updated successfully!");
    }

    public static function delete(int $id): void
    {
        // Create a new EtuModuleModel instance to access the model layer
        $model = new EtuModuleModel();
        // Call EtuModuleModel getAll() method to get all records
        $model->delete($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse("EtuModule removed successfully!");
    }
}