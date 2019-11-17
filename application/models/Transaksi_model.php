<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    function get_pelanggan()
    {
        return $this->db->get('pelanggan')->result_array();
    }

}
?>