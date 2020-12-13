<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grantee_bank_branch extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_grantee_bank_branch() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'bank_branch name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_list_bank_branches.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

		$this->form_validation->set_rules('branch_code', ucwords(str_replace('_', ' ', 'bank_branch code')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_list_bank_branches.branch_code]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

		$this->form_validation->set_rules('tbl_banks_id', 'Selection', 'required|xss_clean');
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'name' => form_error('name'),
				'branch_code' => form_error('branch_code'),
				'tbl_banks_id' => form_error('tbl_banks_id'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->grantee_bank_branch_model->add_grantee_bank_branch();

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
		$data = $this->grantee_bank_branch_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_grantee_bank_branch() {

		$json = array();

		// $this->form_validation->set_rules('id', 'grantee_bank_branch ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'bank_branch name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

		$this->form_validation->set_rules('branch_code', ucwords(str_replace('_', ' ', 'bank_branch code')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_rules('tbl_banks_id', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'branch_code' => form_error('branch_code'),
				'tbl_banks_id' => form_error('tbl_banks_id'),
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->grantee_bank_branch_model->update_grantee_bank_branch();

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

	public function view_grantee_bank_branch() {
		$data['banks'] = $this->common_model->getAllRecordByArray('tbl_banks', array('status' => '1'));
		$data['page_title'] = 'View All grantee_bank_branch';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('grantee_bank_branch/view_grantee_bank_branch', $data);
		$this->load->view('templates/footer');
	}

	public function get_grantee_bank_branch() {

		$data = $row = array();

		// Fetch grantee_bank_branch's records
		$grantee_bank_branchData = $this->grantee_bank_branch_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($grantee_bank_branchData as $grantee_bank_branchInfo) {
			$i++;
			$status = ($grantee_bank_branchInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($grantee_bank_branchInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $grantee_bank_branchInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$getBanks = $this->admin->getRecordById($grantee_bank_branchInfo->tbl_banks_id, $tbl_name = 'tbl_banks');

			$actionBtn = '<a href="' . site_url('common/logger/' . $grantee_bank_branchInfo->id . '/tbl_list_bank_branches') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $grantee_bank_branchInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			$data[] = array($i, $grantee_bank_branchInfo->name, $grantee_bank_branchInfo->branch_code, $getBanks['name'], $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->grantee_bank_branch_model->countAll(),
			"recordsFiltered" => $this->grantee_bank_branch_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
