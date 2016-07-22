<?php defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';
define('TABLE', 'user');

/**
 * Author : Knunu
 * Date: 2016. 7. 22.
 * Time: 오후 7:28
 */

class Api extends REST_Controller {

    public function __construct() {
        // Construct the parent class
        parent::__construct();

        $this->load->model('api_model');
    }

    public function users_get() {

        // user from a data store e.g. database
        $condition = array(
            'email' => $this->get('email'),
            'login_group' => $this->get('login_group'),
            'password' => $this->get('password')
        );

        foreach ($condition as $column => $value) {
            if (!$value) {
                unset($condition[$column]);
            }
        }

        if (isset($condition['password'])) {
            $condition['password'] = password_hash($condition['password'], PASSWORD_BCRYPT);
        }
        $users = $this->api_model->get(TABLE, $condition);

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
            'password' => $this->get('password'),
            'name' => $this->get('name')
        );

        if ($this->api_model->put(TABLE, $new_value)) {
            $this->response([
                'status' => True,
                'message' => 'Success'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => False,
                'message' => 'Failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function users_post() {
        $condition = array(
            'email' => $this->get('email'),
            'login_group' => $this->get('login_group')
        );

        $new_value = array(
            'password' => $this->get('password'),
            'name' => $this->get('name'),
            'profile_image' => $this->get('profile_image'),
            'thumbnail_image' => $this->get('thumbnail_image')
        );

        foreach ($new_value as $column => $value) {
            if (!$value) {
                unset($new_value[$column]);
            }
        }

        if ($this->api_model->post(TABLE, $condition, $new_value)) {
            $this->response([
                'status' => True,
                'message' => 'Success'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => False,
                'message' => 'Failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function users_delete() {
        $condition = array(
            'email' => $this->get('email'),
            'login_group' => $this->get('login_group')
        );

        if ($this->api_model->delete(TABLE, $condition)) {
            $this->response([
                'status' => True,
                'message' => 'Success'
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => False,
                'message' => 'Failed'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function theme_get() {

    }

    public function shop_get() {

    }
}