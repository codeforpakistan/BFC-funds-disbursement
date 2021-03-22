<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Heirs extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}
	public function add_heirs() {

		$json = array();

		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'heir name')), 'required|xss_clean|trim|min_length[3]|max_length[30]');
		//$this->form_validation->set_rules('percentage', ucwords(str_replace('_', ' ', 'percentage')), 'required|xss_clean|trim');
        $this->form_validation->set_rules('bank_type_id', 'Selection', 'required|xss_clean');
        $this->form_validation->set_rules('tbl_list_bank_branches_id', 'Selection', 'required|xss_clean');
        //$this->form_validation->set_rules('account_no',  ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim|');
        //$this->form_validation->set_rules('amount',  ucwords(str_replace('_', ' ', 'amount')), 'required|xss_clean|trim|');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'name' => form_error('name'),
				//'percentage' => form_error('percentage'),
                'bank_type_id' => form_error('bank_type_id'),
                'tbl_list_bank_branches_id' => form_error('tbl_list_bank_branches_id'),
                //'account_no' => form_error('account_no'),
                //'amount' => form_error('amount'),
			);
			echo json_encode($json);

		} else {
			$result = $this->heirs_model->add_heirs();

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
		$data = $this->heirs_model->getRecordById($id);
		echo json_encode($data);
	}

	public function update_heirs() {

		$json = array();

		// $this->form_validation->set_rules('id', 'District ID', 'required|xss_clean');
		$this->form_validation->set_rules('name', ucwords(str_replace('_', ' ', 'legal heir name')), 'required|xss_clean|trim|min_length[3]|max_length[30]');
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
			$result = $this->heirs_model->update_heirs();

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

	public function view_heirs($type, $id) {

        $data['grant_type'] = $type;
        $data['application_no'] = $id;
        if($type == 'retirement') {
            $grant_info = $this->common_model->getRecordByColoumn('tbl_retirement_grant', 'application_no',  $id);
            $total_amount = $grant_info['net_amount'];
        }
        
        $data['total_amount'] = $total_amount;
        
        $data['bank_types'] = $this->common_model->getAllRecordByArray('tbl_banks', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
		$data['page_title'] = 'View All Heirs';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('heirs/view_heirs', $data);
		$this->load->view('templates/footer');
	}

	public function get_heirs() {

		$data = $row = array();
        //echo 'i m here'; exit;
		// Fetch district's records
		$heirsData = $this->heirs_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($heirsData as $heirsInfo) {
			$i++;
			$status = ($heirsInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($heirsInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $heirsInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = 'Add by <i><strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $heirsInfo->id . '/tbl_legal_heirs') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="javascript:void(0)" onclick="getData(' . "'" . $heirsInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>';
			 
			$data[] = array($i, $heirsInfo->name, $heirsInfo->percentage, $heirsInfo->tbl_list_bank_branches_id, 
            $heirsInfo->account_no, $heirsInfo->amount,  $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->heirs_model->countAll(),
			"recordsFiltered" => $this->heirs_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
