<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Interest_free_loan extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();
        $this->load->model('interest_free_loan_model');
		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
    }
           

    public function getAmountData() {  
        //$dateOfRetirement = base64_encode($date);
		$data = $this->interest_free_loan_model->getAmountData();
		echo json_encode($data);
    }

	public function add_interestfreeloan_grant($id=null) {

        //echo 'i m here'; exit();
         
		$data['page_title'] = 'Add New Interest Free Loan Grant';
        $data['description'] = '...';
        
        if (!($_SESSION['tbl_admin_role_id'] == '1')) {
            $emp_array = array('status'=> '1', 'record_add_by'=> $_SESSION['admin_id']);
        }

		$data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
        //$data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
        $data['employees'] = $this->common_model->getAllRecordByArray('tbl_emp_info', $emp_array );
        $data['districts'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));
        $data['payscales'] = $this->common_model->getAllRecordByArray('tbl_pay_scale', array('status' => '1'));
        $data['posts'] = $this->common_model->getAllRecordByArray('tbl_post', array('status' => '1'));
        $data['loan_types'] = $this->common_model->getAllRecordByArray('tbl_loan_types', array('status' => '1'));

        if($id!=''){
            $data['emp_info'] = $this->emp_info_model->getRecordById($id);
        } 

		if ($this->input->post('submit')) {
 

            $this->form_validation->set_rules('tbl_emp_info_id', ucwords(str_replace('_', ' ', 'tbl_emp_info_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_department_id', ucwords(str_replace('_', ' ', 'tbl_department_id')), 'required|xss_clean|trim');

			$this->form_validation->set_rules('duty_place', ucwords(str_replace('_', ' ', 'duty_place')), 'required|xss_clean|trim');

            
            $this->form_validation->set_rules('grant_amount', ucwords(str_replace('_', ' ', 'grant_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('deduction', ucwords(str_replace('_', ' ', 'deduction')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('net_amount', ucwords(str_replace('_', ' ', 'net_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_case_status_id', ucwords(str_replace('_', ' ', 'tbl_case_status_id')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('tbl_payment_mode_id', ucwords(str_replace('_', ' ', 'tbl_payment_mode_id')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('tbl_list_bank_branches_id', ucwords(str_replace('_', ' ', 'tbl_list_bank_branches_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('account_no', ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim');
            
  

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('interestfreeloan/add_interestfreeloan_grant', $data);
				$this->load->view('templates/footer');
			} else {
                //echo 'i m here'; exit;
				// to model
				$this->interest_free_loan_model->add_interestfreeloan_grant();
				// set session message
				$this->session->set_flashdata('add', '!');
				redirect(base_url('view_interest_free_loan_grants'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('interestfreeloan/add_interestfreeloan_grant');
			$this->load->view('templates/footer');
		}

	}




    public function edit_interest_free_loan_grant($id=null) {

        //echo 'i m here'; exit();
         
		$data['page_title'] = 'Edit Interest Free Loan Grant';
        $data['description'] = '...';

        if (!($_SESSION['tbl_admin_role_id'] == '1')) {
            $emp_array = array('status'=> '1', 'record_add_by'=> $_SESSION['admin_id']);
        }

        $data['all'] = $this->common_model->getRecordById($id, 'tbl_interest_free_loan'); 
		$data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
        //$data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
        $data['employees'] = $this->common_model->getAllRecordByArray('tbl_emp_info', $emp_array );
        $data['districts'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));
        $data['payscales'] = $this->common_model->getAllRecordByArray('tbl_pay_scale', array('status' => '1'));
        $data['posts'] = $this->common_model->getAllRecordByArray('tbl_post', array('status' => '1'));
        $data['loan_types'] = $this->common_model->getAllRecordByArray('tbl_loan_types', array('status' => '1'));

        
        $data['emp_info'] = $this->emp_info_model->getRecordById($data['all']['tbl_emp_info_id']);
        

		if ($this->input->post('submit')) {
             

            $this->form_validation->set_rules('tbl_emp_info_id', ucwords(str_replace('_', ' ', 'tbl_emp_info_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_department_id', ucwords(str_replace('_', ' ', 'tbl_department_id')), 'required|xss_clean|trim');

			$this->form_validation->set_rules('duty_place', ucwords(str_replace('_', ' ', 'duty_place')), 'required|xss_clean|trim');

            
            $this->form_validation->set_rules('grant_amount', ucwords(str_replace('_', ' ', 'grant_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('deduction', ucwords(str_replace('_', ' ', 'deduction')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('net_amount', ucwords(str_replace('_', ' ', 'net_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_case_status_id', ucwords(str_replace('_', ' ', 'tbl_case_status_id')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('tbl_payment_mode_id', ucwords(str_replace('_', ' ', 'tbl_payment_mode_id')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('tbl_list_bank_branches_id', ucwords(str_replace('_', ' ', 'tbl_list_bank_branches_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('account_no', ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim');
           
  

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('interestfreeloan/edit_interestfreeloan_grant', $data);
				$this->load->view('templates/footer');
			} else {
                //echo 'i m here'; exit;
				// to model
				$this->interest_free_loan_model->edit_interestfreeloan_grant();
				// set session message
				$this->session->set_flashdata('updated', '!');
				redirect(base_url('view_interest_free_loan_grants'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('interestfreeloan/edit_interestfreeloan_grant');
			$this->load->view('templates/footer');
		}

	}



	public function getData($id) {
		$data = $this->interest_free_loan_model->getRecordById($id);
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

	public function view_interestfreeloan_grants() {

		$data['page_title'] = 'View All Interest Free Loan Grants';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('interestfreeloan/view_interestfreeloan_grants', $data);
		$this->load->view('templates/footer');
	}

	public function get_interestfreeloan_grants() {

        //    echo 'i m here'; exit;

		$data = $row = array();

		// Fetch Scholarship grants's records
		$intFreeLoanData = $this->interest_free_loan_model->getRows($_POST);
        // //echo '<pre>'; print_r($intFreeLoanData); exit;

		$i = $_POST['start'];
		foreach ($intFreeLoanData as $intFreeLoanInfo) {
			$i++;
			$status = ($intFreeLoanInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($intFreeLoanInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $intFreeLoanInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $intFreeLoanInfo->id . '/tbl_interest_free_loan') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>';
			// '<a href="javascript:void(0)" onclick="getData(' . "'" . $intFreeLoanInfo->id . "'" . ')">
            //           <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
            //           </a>';
            if(!($_SESSION['tbl_admin_role_id'] == '2')) { 
			$actionBtn .= '<a href="' . site_url('interest_free_loan/edit_interest_free_loan_grant/' . $intFreeLoanInfo->id) . '">
                            <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                        </a>';
            }
            $getDept = $this->common_model->getRecordById($intFreeLoanInfo->parent_dept, $tbl_name = 'tbl_department');
			$data[] = array($i,  $intFreeLoanInfo->application_no, $intFreeLoanInfo->grantee_name,$intFreeLoanInfo->father_name, $intFreeLoanInfo->personnel_no, $intFreeLoanInfo->doa, $intFreeLoanInfo->ddo_code,  $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->interest_free_loan_model->countAll(),
			"recordsFiltered" => $this->interest_free_loan_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
