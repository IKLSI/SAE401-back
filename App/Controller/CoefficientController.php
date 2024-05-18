<?php

namespace App\Controller;

use App\Model\CoefficientModel;
use Exception;

class CoefficientController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new AnneeModel instance to access the model layer
        $model = new CoefficientModel();
        
        // Call AnneeModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new CoefficientModel instance to access the model layer
        $model = new CoefficientModel();
        // Call CoefficientModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function addCoefficient()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new CoefficientModel instance
            $coef = new CoefficientModel();

            // Assign data from the POST request to the CoefficientModel object
            $coef->id_comp = $data['id_comp'];
            $coef->id_module = $data['id_module'];
            $coef->coef = $data['coef'];

            // Call the insert method of CoefficientModel to insert the data into the database
            $coef->insert();    
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("Coefficient added successfully!");
    }

    public static function addManyCoefficient()
    {
        $manyData = parent::receiveJSONRequest();

        foreach ($manyData as $data) {
            try {
                // Create a new CoefficientModel instance
                $coef = new CoefficientModel();
    
                // Assign data from the POST request to the CoefficientModel object
                $coef->id_comp = $data['id_comp'];
                $coef->id_module = $data['id_module'];
                $coef->coef = $data['coef'];
    
                // Call the insert method of CoefficientModel to insert the data into the database
                $coef->insert();    
            } catch (Exception $e) {
                // Handle the exception (e.g., return an error response)
                return "Error: " . $e->getMessage();
            }
            
            // If everything is successful, return a success message or redirect to another page
            
        }
        parent::sendJSONResponse("Coefficients added successfully!");
    }

    public static function updateCoefficient()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new CoefficientModel instance
            $coef = new CoefficientModel();

            // Assign data from the POST request to the CoefficientModel object
            $coef->id_coef = $data["id_coef"];
            $coef->coef = $data['coef'];

            // Call the insert method of CoefficientModel to insert the data into the database
            $coef->update();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("Coefficient updated successfully!");
    }

    public static function delete(int $id): void
    {
        // Create a new CoefficientModel instance to access the model layer
        $model = new CoefficientModel();
        // Call CoefficientModel getAll() method to get all records
        $model->delete($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse("Coefficient removed successfully!");
    }
}