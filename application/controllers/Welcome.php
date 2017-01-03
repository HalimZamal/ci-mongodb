<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {

		parent::__construct();
		$this->load->model("usersmodel");

	}

	public function index() {	
		
		$data = array(
			'user' => $this->usersmodel->viewUsers(),
			);
		$this->load->view('welcome_message', $data);
	}

	public function insertUser() {

		$this->load->view('insertusers');
	}

	public function insertProcess() {

		$this->usersmodel->insertusers();
		$this->session->set_flashdata('notif','successfully insert new data');
		redirect('welcome','refresh');

	}

	public function editUser() {

		$id =$this->uri->segment(3);
		$data = array(
			'user' => $this->usersmodel->getUsers($id),
			);
		
		

		$this->load->view('editusers',$data);
		

	}

	public function editUserProcess($id) {

	
		$process = $this->usersmodel->editProcess($id);
		if ($process) {
			$this->session->set_flashdata('notif','successfully edited');
			redirect('welcome');
		} else {
			# code...
		}


	}

	public function deleteUser($id) {

		$this->usersmodel->deleteUser($id);
		$this->session->set_flashdata('notif','successfully delete');
		redirect('welcome','refresh');

	}


}
