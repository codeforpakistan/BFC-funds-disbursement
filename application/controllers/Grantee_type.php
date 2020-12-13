<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grantee_type extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_grantee_type() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'grantee_type name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_grantee_type.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->grantee_type_model->add_grantee_type();

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
		$data = $this->grantee_type_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_grantee_type() {

		$json = array();

		// $this->form_validation->set_rules('id', 'grantee_type ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'grantee_type name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
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
			$result = $this->grantee_type_model->update_grantee_type();

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

	public function view_grantee_type() {

		$data['page_title'] = 'View All grantee_type';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('grantee_type/view_grantee_type', $data);
		$this->load->view('templates/footer');
	}

	public function get_grantee_type() {

		$data = $row = array();

		// Fetch grantee_type's records
		$grantee_typeData = $this->grantee_type_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($grantee_typeData as $grantee_typeInfo) {
			$i++;
			$status = ($grantee_typeInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($grantee_typeInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $grantee_typeInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $grantee_typeInfo->id . '/tbl_grantee_type') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $grantee_typeInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			// $actionBtn = '<a href="' . site_url('grantee_type/edit_grantee_type/' . $grantee_typeInfo->id) . '">
			//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
			//                    </a>';
			$data[] = array($i, $grantee_typeInfo->name, $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->grantee_type_model->countAll(),
			"recordsFiltered" => $this->grantee_type_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
