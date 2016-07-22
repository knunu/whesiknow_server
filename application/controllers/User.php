<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * Author : Knunu
 * Date: 2016. 7. 22.
 * Time: 오후 7:28
 */

class api extends REST_Controller {

    public function __construct() {
        // Construct the parent class
        parent::__construct();

        $this->load->model('api_model');
    }

    public function users_get() {

        // Users from a data store e.g. database
        $condition = array(
            'email' => $this->get('email'),
            'login_group' => $this->get('login_group'),
            'password' => $this->get('password')
        );

        if (count($condition['password'] != 0)) {
//            $condition['password'] = password_hash($condition['password'], )
        } else {
            unset($condition['password']);
        }
        $users = $this->api_model->get('user', $condition);

        // Check if there is user-data that user want to get
        if ($users) {
            // Set the response and exit
            $this->response($users->result_arrays(), REST_Controller::HTTP_OK);
        } else {
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => 'No users were found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function users_put() {

        $new_value = array(
            'email' => $this->get('email'),
            'login_group' => $this->get('login_group'),
            'password' => $this->get('password')
        )
    }

    public function users_post() {

    }

    public function users_delete() {

    }

    public function themes_get() {

    }

    public function shop_get() {

    }
}