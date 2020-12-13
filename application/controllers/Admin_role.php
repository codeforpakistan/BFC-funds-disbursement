<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_role extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_admin_role() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'admin_role name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_admin_role.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->admin_role_model->add_admin_role();

			$json = array(
				'success' => false,
			);
			if ($result) {
				$json = array(
					'success' => true,
				);
			}
			echo json_encode($json);
		}
		// echo json_encode($json);

	}

	public function getData($id) {
		$data = $this->admin_role_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_admin_role() {

		$json = array();

		// $this->form_validation->set_rules('id', 'admin_role ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'admin_role name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				// 'id' => form_error('id'),
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->admin_role_model->update_admin_role();

			$json = array(
				'success' => false,
			);
			if ($result) {
				$json = array(
					'success' => true,
				);
			}

			echo json_encode($json);
		}
		// echo json_encode($json);

	}

	public function view_admin_role() {

		$data['page_title'] = 'View All admin_roles';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('admin_role/view_admin_role', $data);
		$this->load->view('templates/footer');
	}

	public function get_admin_role() {

		$data = $row = array();

		// Fetch admin_role's records
		$admin_roleData = $this->admin_role_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($admin_roleData as $admin_roleInfo) {
			$i++;
			$status = ($admin_roleInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($admin_roleInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $admin_roleInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $admin_roleInfo->id . '/tbl_admin_role') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $admin_roleInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			$data[] = array($i, $admin_roleInfo->name, $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->admin_role_model->countAll(),
			"recordsFiltered" => $this->admin_role_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
