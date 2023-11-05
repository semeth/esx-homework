<?php

class Api extends CI_Controller{

    public function __construct()    {
        parent::__construct();
        $this->load->database();
    }

    public function users($id = null)    {

        // Retrieve user data from API_model
        $users = $this->api_model->get_users($id);

        // Check if data is available
        if (!empty($users)) {
            // Set the response content type to JSON
            $this->output->set_content_type('application/json');

            // Encode and echo the data as JSON
            echo json_encode($users);
        } else {
            // Handle the case when no data is found (e.g., return an empty JSON object or an error message)
            $this->output->set_content_type('application/json');
            echo json_encode(['message' => 'No data found']);
        }
    }

    // Soft deletion. To process, use /api/soft_delete/id where id is the user's id in the database
    public function soft_delete($id){
        $this->api_model->delete_soft_delete($id);
        echo json_encode(['message' => 'user with id ' . $id . ' is now softly deleted']);
    }


    // Reactivate user. To process, use /api/reactivate/id where id is the user's id in the database
    public function reactivate($id){
        $this->api_model->activate_soft_delete($id);
        echo json_encode(['message' => 'user with id ' . $id . ' is now reactivated']);
    }

    public function hard_delete($id){
        $this->api_model->delete_hard_delete($id);
        echo json_encode(['message'=> 'user with id '. $id . ' was permanently deleted']);
    }
}