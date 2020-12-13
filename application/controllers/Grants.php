<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grants extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_grants() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'grants name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_grants.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->grants_model->add_grants();

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
		$data = $this->grants_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_grants() {

		$json = array();

		// $this->form_validation->set_rules('id', 'grants ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'grants name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
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
			$result = $this->grants_model->update_grants();

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

	public function view_grants() {

		$data['page_title'] = 'View All grants';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('grants/view_grants', $data);
		$this->load->view('templates/footer');
	}

	public function get_grants() {

		$data = $row = array();

		// Fetch grants's records
		$grantsData = $this->grants_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($grantsData as $grantsInfo) {
			$i++;
			$status = ($grantsInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($grantsInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $grantsInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $grantsInfo->id . '/tbl_grants') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $grantsInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			// $actionBtn = '<a href="' . site_url('grants/edit_grants/' . $grantsInfo->id) . '">
			//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
			//                    </a>';
			$data[] = array($i, $grantsInfo->name, $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->grants_model->countAll(),
			"recordsFiltered" => $this->grants_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
