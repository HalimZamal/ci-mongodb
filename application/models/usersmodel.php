<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersmodel extends CI_Model {

	function insertUsers() {

		$data = array(
					'username' 	=> $this->input->post('username'), 
					'phone' 	=> $this->input->post('phone'),
					'unik'		=> $this->input->post('unik') 
					);

		$this->mongo_db->insert('users', $data);
		return true; 

	}

	function editProcess($id) {

		

		$data = array(

				'username' 	=> $this->input->post('username'), 
				'phone' 	=> $this->input->post('phone'),
				'unik'		=> $this->input->post('unik') 
			);
		// print_r($data);
		// exit();

		// $this->mongo_db->where(array('_id' => new mongoId($id)));
		// return $this->mongo_db->update('users', $data);
		
		return $this->mongo_db->where(array('_id'=>new mongoId($id)))->set($data)->update('users');

	} 

	function viewUsers() {

		return $this->mongo_db->get('users');

	}

	function getUsers($id) {

		return $this->mongo_db->where(array('_id' => new mongoId($id)))->get('users');
		
	}

	function deleteUser($id) {

		return $this->mongo_db->where(array('_id' => new mongoId($id)))->delete('users');
	}
	

}

/* End of file usersmodel.php */
/* Location: ./application/models/usersmodel.php */