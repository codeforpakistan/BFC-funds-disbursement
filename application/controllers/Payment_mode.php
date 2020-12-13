<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_mode extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_payment_mode() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'payment_mode name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_payment_mode.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'name' => form_error('name'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->payment_mode_model->add_payment_mode();

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
		$data = $this->payment_mode_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_payment_mode() {

		$json = array();

		// $this->form_validation->set_rules('id', 'payment_mode ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'payment_mode name')), 'required|xss_clean|trim|min_length[3]|max_length[25]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
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
			$result = $this->payment_mode_model->update_payment_mode();

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

	public function view_payment_mode() {

		$data['page_title'] = 'View All payment_mode';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('payment_mode/view_payment_mode', $data);
		$this->load->view('templates/footer');
	}

	public function get_payment_mode() {

		$data = $row = array();

		// Fetch payment_mode's records
		$payment_modeData = $this->payment_mode_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($payment_modeData as $payment_modeInfo) {
			$i++;
			$status = ($payment_modeInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($payment_modeInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $payment_modeInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $payment_modeInfo->id . '/tbl_payment_mode') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $payment_modeInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			// $actionBtn = '<a href="' . site_url('payment_mode/edit_payment_mode/' . $payment_modeInfo->id) . '">
			//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
			//                    </a>';
			$data[] = array($i, $payment_modeInfo->name, $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->payment_mode_model->countAll(),
			"recordsFiltered" => $this->payment_mode_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
