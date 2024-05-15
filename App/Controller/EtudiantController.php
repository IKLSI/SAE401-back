<?php

namespace App\Controller;

use App\Model\EtudiantModel;
use Exception;

class EtudiantController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function index(): void
    {
        // Create a new EtudiantModel instance to access the model layer
        $model = new EtudiantModel();
        
        // Call EtudiantModel getAll() method to get all records
        $model->getAll();
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public static function show(int $id): void
    {
        // Create a new EtudiantModel instance to access the model layer
        $model = new EtudiantModel();
        // Call EtudiantModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }

    public function addEtudiant($data)
    {
        try {
            // Create a new EtudiantModel instance
            $etudiant = new EtudiantModel();

            // Assign data from the POST request to the EtudiantModel object
            $etudiant->code_etu = $data['code_etu'];
            $etudiant->nom_etu = $data['nom_etu'];
            $etudiant->prenom_etu = $data['prenom_etu'];
            $etudiant->groupe_TD = $data['groupe_TD'];
            $etudiant->groupe_TP = $data['groupe_TP'];
            $etudiant->cursus = $data['cursus'];
            $etudiant->alternant = $data['alternant'];

            // Call the insert method of EtudiantModel to insert the data into the database
            $etudiant->insert();
        } catch (Exception $e) {
            // Handle the exception (e.g., return an error response)
            return "Error: " . $e->getMessage();
        }
        
        // If everything is successful, return a success message or redirect to another page
        return "Etudiant added successfully!";
    }
}