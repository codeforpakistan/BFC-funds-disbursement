<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Grant_payments extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_grant_payments() {

		$json = array();
		$this->form_validation->set_rules('tbl_grants_id', 'Selection', 'required|xss_clean');
		$this->form_validation->set_rules('tbl_pay_scale_id', 'Selection', 'required|xss_clean');
		$this->form_validation->set_rules('from_date', ucwords(str_replace('_', ' ', 'from date')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
		$this->form_validation->set_rules('to_date', ucwords(str_replace('_', ' ', 'to date')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
		$this->form_validation->set_rules('amount', ucwords(str_replace('_', ' ', 'amount')), 'required|xss_clean|trim|min_length[3]|max_length[20]|numeric');

		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'tbl_grants_id' => form_error('tbl_grants_id'),
				'tbl_pay_scale_id' => form_error('tbl_pay_scale_id'),
				'from_date' => form_error('from_date'),
				'to_date' => form_error('to_date'),
				'amount' => form_error('amount'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->grant_payments_model->add_grant_payments();

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
		$data = $this->grant_payments_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_grant_payments() {

		$json = array();

		$this->form_validation->set_rules('tbl_grants_id', 'Selection', 'required|xss_clean');
		$this->form_validation->set_rules('tbl_pay_scale_id', 'Selection', 'required|xss_clean');
		$this->form_validation->set_rules('from_date', ucwords(str_replace('_', ' ', 'from date')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
		$this->form_validation->set_rules('to_date', ucwords(str_replace('_', ' ', 'to date')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
		$this->form_validation->set_rules('amount', ucwords(str_replace('_', ' ', 'amount')), 'required|xss_clean|trim|min_length[3]|max_length[20]|numeric');

		$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'tbl_grants_id' => form_error('tbl_grants_id'),
				'tbl_pay_scale_id' => form_error('tbl_pay_scale_id'),
				'from_date' => form_error('from_date'),
				'to_date' => form_error('to_date'),
				'amount' => form_error('amount'),
				'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
			$result = $this->grant_payments_model->update_grant_payments();

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

	public function view_grant_payments() {
		$data['pay_scale'] = $this->common_model->getAllRecordByArray('tbl_pay_scale', array('status' => '1'));
		$data['grants'] = $this->common_model->getAllRecordByArray('tbl_grants', array('status' => '1'));
		$data['page_title'] = 'View grants_payments';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('grant_payments/view_grant_payments', $data);
		$this->load->view('templates/footer');
	}

	public function get_grant_payments() {

		$data = $row = array();

		// Fetch grant_payments's records
		$grant_paymentsData = $this->grant_payments_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($grant_paymentsData as $grant_paymentsInfo) {
			$i++;
			$status = ($grant_paymentsInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($grant_paymentsInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = date("d-M-Y", strtotime($grant_paymentsInfo->record_add_date));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$getGrant = $this->admin->getRecordById($grant_paymentsInfo->tbl_grants_id, $tbl_name = 'tbl_grants');
			$getPayScale = $this->admin->getRecordById($grant_paymentsInfo->tbl_pay_scale_id, $tbl_name = 'tbl_pay_scale');

			$from_date = date('d-m-Y', strtotime($grant_paymentsInfo->from_date));
			$to_date = date('d-m-Y', strtotime($grant_paymentsInfo->to_date));

			$actionBtn = '<a href="' . site_url('common/logger/' . $grant_paymentsInfo->id . '/tbl_grant_payments') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $grant_paymentsInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			$data[] = array($i, $getGrant['name'], $getPayScale['name'], $from_date, $to_date, $grant_paymentsInfo->amount, $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->grant_payments_model->countAll(),
			"recordsFiltered" => $this->grant_payments_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
