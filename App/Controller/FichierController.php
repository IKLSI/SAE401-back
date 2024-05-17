<?php

namespace App\Controller;

use App\Model\FichierModel;
use Exception;

class FichierController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new FichierModel instance to access the model layer
        $model = new FichierModel();
        
        // Call FichierModel getAll() method to get all records
        $model->index();
		
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }
    public static function show(int $id): void
    {
		
        // Create a new FichierModel instance to access the model layer
        $model = new FichierModel();
        // Call FichierModel getAll() method to get all records
        $model->show($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function addFichier()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new FichierModel instance
            $fichier = new FichierModel();
			
            // Assign data from the POST request to the FichierModel object
            $fichier->nom_fichier = $data['nom_fichier'];
            $fichier->type = $data['type'];
            $fichier->id_annee = $data['id_annee'];
            $fichier->id_semestre = $data['id_semestre'];

            // Call the insert method of FichierModel to insert the data into the database
            $fichier->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("Fichier added successfully!");
    }

    public static function updateFichier()
    {
        $data = parent::receiveJSONRequest()[0];

        try {
            // Create a new FichierModel instance
            $fichier = new FichierModel();
			
            // Assign data from the POST request to the FichierModel object
            $fichier->id_fichier = $data['id_fichier'];
            $fichier->nom_fichier = $data['nom_fichier'];

            // Call the insert method of FichierModel to insert the data into the database
            $fichier->update();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        parent::sendJSONResponse("Fichier updated successfully!");
    }

    public static function delete(int $id): void
    {
		
        // Create a new UserModel instance to access the model layer
        $model = new FichierModel();
        // Call UsersModel getAll() method to get all records
        $model->delete($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse("Fichier removed successfully!");
    }
}