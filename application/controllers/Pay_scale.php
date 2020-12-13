<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pay_scale extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_pay_scale() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'pay_scale name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_pay_scale.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->pay_scale_model->add_pay_scale();

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
		$data = $this->pay_scale_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_pay_scale() {

		$json = array();

		// $this->form_validation->set_rules('id', 'pay_scale ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'pay_scale name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
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
			$result = $this->pay_scale_model->update_pay_scale();

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

	public function view_pay_scale() {

		$data['page_title'] = 'View All pay_scale';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('pay_scale/view_pay_scale', $data);
		$this->load->view('templates/footer');
	}

	public function get_pay_scale() {

		$data = $row = array();

		// Fetch pay_scale's records
		$pay_scaleData = $this->pay_scale_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($pay_scaleData as $pay_scaleInfo) {
			$i++;
			$status = ($pay_scaleInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($pay_scaleInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $pay_scaleInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $pay_scaleInfo->id . '/tbl_pay_scale') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $pay_scaleInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			// $actionBtn = '<a href="' . site_url('pay_scale/edit_pay_scale/' . $pay_scaleInfo->id) . '">
			//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
			//                    </a>';
			$data[] = array($i, $pay_scaleInfo->name, $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->pay_scale_model->countAll(),
			"recordsFiltered" => $this->pay_scale_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
