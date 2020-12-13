<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bfc_bank_branch extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_bfc_bank_branch() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'bank_branch name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_bfc_list_bank.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

		$this->form_validation->set_rules('branch_code', ucwords(str_replace('_', ' ', 'bank_branch code')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_bfc_list_bank.branch_code]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

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
			$result = $this->bfc_bank_branch_model->add_bfc_bank_branch();

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
		$data = $this->bfc_bank_branch_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_bfc_bank_branch() {

		$json = array();

		// $this->form_validation->set_rules('id', 'bfc_bank_branch ID', 'required|xss_clean');
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
			$result = $this->bfc_bank_branch_model->update_bfc_bank_branch();

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

	public function view_bfc_bank_branch() {
		$data['banks'] = $this->common_model->getAllRecordByArray('tbl_banks', array('status' => '1'));
		$data['page_title'] = 'View All bfc_bank_branch';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('bfc_bank_branch/view_bfc_bank_branch', $data);
		$this->load->view('templates/footer');
	}

	public function get_bfc_bank_branch() {

		$data = $row = array();

		// Fetch bfc_bank_branch's records
		$bfc_bank_branchData = $this->bfc_bank_branch_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($bfc_bank_branchData as $bfc_bank_branchInfo) {
			$i++;
			$status = ($bfc_bank_branchInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($bfc_bank_branchInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $bfc_bank_branchInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$getBanks = $this->admin->getRecordById($bfc_bank_branchInfo->tbl_banks_id, $tbl_name = 'tbl_banks');

			$actionBtn = '<a href="' . site_url('common/logger/' . $bfc_bank_branchInfo->id . '/tbl_bfc_list_bank') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $bfc_bank_branchInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			$data[] = array($i, $bfc_bank_branchInfo->name, $bfc_bank_branchInfo->branch_code, $getBanks['name'], $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->bfc_bank_branch_model->countAll(),
			"recordsFiltered" => $this->bfc_bank_branch_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
