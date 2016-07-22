<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Creating User: Knunu
 * Date: 2016. 7. 22.
 * Time: 오후 7:42
 */
class Api_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }

    public function get($table, $condition = array(), $target = '*') {
        $query = "
            SELECT $target
              FROM whesiknow.$table
             WHERE 1=1
        ";

        foreach($condition as $column => $value) {
            $query .= " AND $column = '$value'";
        }

        return $this->db->query($query);
    }

    public function put($table, $condition = array(), $new_value = array()) {
        $query = "
            UPDATE $table
               SET
        ";

        foreach($new_value as $column => $value) {
            $query .= " $column = '$value',";
        }
        $query = substr_replace($query, ' WHERE 1=1', -1);

        foreach($condition as $column => $value) {
            $query .= " AND $column = '$value'";
        }

        $this->db->query($query);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function post($table, $new_value = array()) {
        return $this->db->insert($table, $new_value);
    }

    public function delete($table, $condition = array()) {
        print_r($condition);
        return $this->db->delete($table, $condition);
    }
}