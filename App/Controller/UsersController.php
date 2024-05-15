<?php

namespace App\Controller;

use App\Model\UsersModel;
;

class UsersController extends Controller
{
    // Static method that will be executed when the corresponding route is accessed
    public static function getAll(): void
    {
        // Create a new UserModel instance to access the model layer
        $model = new UsersModel();
        
        // Call UsersModel getAll() method to get all records
        $model->getAll();
		
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }
    public static function get(int $id): void
    {
		
        // Create a new UserModel instance to access the model layer
        $model = new UsersModel();
        // Call UsersModel getAll() method to get all records
        $model->get($id);
        
        // Sends the response in JSON format containing the records obtained
        parent::sendJSONResponse($model->rows);
    }
	public static function addUser() {
		$php = parent::receiveJSONRequest();
		
		parent::sendJSONResponse($php);
	}
}