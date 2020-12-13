<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 */
class Auth extends CI_Controller {
	function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();
	}
	public function index() {
		if ($this->session->has_userdata('is_admin_login')) {
			redirect('dashboard');
		} elseif ($this->session->has_userdata('is_user_login')) {
			redirect('dashboard');
		} else {
			redirect(base_url(), 'refresh');
		}
	}

	// admin login
	public function admin_login() {
		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('username', 'Username', 'required|xss_clean|trim|htmlspecialchars|min_length[5]|max_length[15]|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
			$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|htmlspecialchars|min_length[5]|max_length[15]|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

			// $this->form_validation->set_rules('username', 'Username', 'required',
			// 	array('required' => 'You must provide a %s.')
			// );

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->session->sess_destroy();
				$this->load->view('login');
			} else {
				$data = array(
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
				);
				$result = $this->admin_model->admin_login($data);
				if ($result == TRUE) {
					$admin_data = array(
						'admin_id' => $result['id'],
						'username' => $result['username'],
						'name' => $result['name'],
						'tbl_admin_role_id' => $result['tbl_admin_role_id'],
						'is_admin_login' => TRUE,
					);
					$this->session->set_userdata($admin_data);
					redirect('dashboard', 'refresh');
				} else if ($result == FALSE) {
					$this->session->set_flashdata('error_msg', 'Invalid Username or Password!');
					redirect('admin', 'refresh');
					//$this->session->sess_destroy();
					//die();
					//$this->load->view('login');
				}
			}
		} else {
			$this->session->sess_destroy();
			$this->load->view('login');
			$this->session->sess_destroy();
			//die();
		}
	}
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
		//$this->session->sess_destroy();
		//die();
	}
}
?>