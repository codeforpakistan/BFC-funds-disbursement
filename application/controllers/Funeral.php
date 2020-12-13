<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Funeral extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();
        $this->load->model('funeral_model');
		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
    }
    
    public function getAmountData() {  
        //$dateOfRetirement = base64_encode($date);
		$data = $this->funeral_model->getAmountData();
		echo json_encode($data);
    }

	public function add_funeral_grant($id=null) {
        
        //echo '<pre>'; print_r($_POST); exit(); 

		$data['page_title'] = 'Add New Funeral Grant';
		$data['description'] = '...';
    
        $data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
        $data['employees'] = $this->common_model->getAllRecordByArray('tbl_emp_info', array('status' => '1'));

        if($id!=''){
            $data['emp_info'] = $this->emp_info_model->getRecordById($id);
        }
        
		if ($this->input->post('submit')) {
            
            $this->form_validation->set_rules('tbl_emp_info_id', ucwords(str_replace('_', ' ', 'tbl_emp_info_id')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('record_no', ucwords(str_replace('_', ' ', 'record_no')), 'required|xss_clean|trim');

			$this->form_validation->set_rules('record_no_year', ucwords(str_replace('_', ' ', 'record_no_year')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('doa', ucwords(str_replace('_', ' ', 'doa')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('name_deceased', ucwords(str_replace('_', ' ', 'name_deceased')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('dor', ucwords(str_replace('_', ' ', 'dor')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('los', ucwords(str_replace('_', ' ', 'los')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('dept_letter_no', ucwords(str_replace('_', ' ', 'dept_letter_no')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('dept_letter_no_date', ucwords(str_replace('_', ' ', 'dept_letter_no_date')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('grant_amount', ucwords(str_replace('_', ' ', 'grant_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('deduction', ucwords(str_replace('_', ' ', 'deduction')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('net_amount', ucwords(str_replace('_', ' ', 'net_amount')), 'required|xss_clean|trim');
      
            $this->form_validation->set_rules('tbl_case_status_id', ucwords(str_replace('_', ' ', 'tbl_case_status_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_payment_mode_id', ucwords(str_replace('_', ' ', 'tbl_payment_mode_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_list_bank_branches_id', ucwords(str_replace('_', ' ', 'tbl_list_bank_branches_id')), 'required|xss_clean|trim');
           
            $this->form_validation->set_rules('account_no', ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('bank_verification', ucwords(str_replace('_', ' ', 'bank_verification')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('sign_of_applicant', ucwords(str_replace('_', ' ', 'sign_of_applicant')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('s_n_office_dept_seal', ucwords(str_replace('_', ' ', 's_n_office_dept_seal')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('s_n_dept_admin_seal', ucwords(str_replace('_', ' ', 's_n_dept_admin_seal')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('payroll_attach', ucwords(str_replace('_', ' ', 'payroll_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('dc_attach', ucwords(str_replace('_', ' ', 'dc_attach')), 'required|xss_clean|trim');

             
            $this->form_validation->set_rules('bf_contribution_attach', ucwords(str_replace('_', ' ', 'bf_contribution_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('cnic_attach', ucwords(str_replace('_', ' ', 'cnic_attach')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('boards_approval', ucwords(str_replace('_', ' ', 'boards_approval')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('ac_edit', ucwords(str_replace('_', ' ', 'ac_edit')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_secretary', ucwords(str_replace('_', ' ', 'sent_to_secretary')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('approve_secretary', ucwords(str_replace('_', ' ', 'approve_secretary')), 'required|xss_clean|trim');

            
            // $this->form_validation->set_rules('sent_to_bank', ucwords(str_replace('_', ' ', 'sent_to_bank')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('feedback_website', ucwords(str_replace('_', ' ', 'feedback_website')), 'required|xss_clean|trim'); 

  

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('funeral/add_funeral_grant', $data);
				$this->load->view('templates/footer');
			} else {
                //echo 'i m here'; exit;
				// to model
				$this->funeral_model->add_funeral_grant();
				// set session message
				$this->session->set_flashdata('add', '!');
				redirect(base_url('view_funeral_grants'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('funeral/add_funeral_grant');
			$this->load->view('templates/footer');
		}

    }
    
    public function edit_funeral_grant($id=null) {
        
        //echo '<pre>'; print_r($_POST); exit(); 

		$data['page_title'] = 'Edit Funeral Grant';
		$data['description'] = '...';
        $data['all'] = $this->common_model->getRecordById($id, 'tbl_funeral_grant');
        $data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
        $data['employees'] = $this->common_model->getAllRecordByArray('tbl_emp_info', array('status' => '1'));
 
        $data['emp_info'] = $this->emp_info_model->getRecordById($data['all']['tbl_emp_info_id']);
      
		if ($this->input->post('submit')) {
            
            $this->form_validation->set_rules('tbl_emp_info_id', ucwords(str_replace('_', ' ', 'tbl_emp_info_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('record_no', ucwords(str_replace('_', ' ', 'record_no')), 'required|xss_clean|trim');
			$this->form_validation->set_rules('record_no_year', ucwords(str_replace('_', ' ', 'record_no_year')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('doa', ucwords(str_replace('_', ' ', 'doa')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('name_deceased', ucwords(str_replace('_', ' ', 'name_deceased')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('dor', ucwords(str_replace('_', ' ', 'dor')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('los', ucwords(str_replace('_', ' ', 'los')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('dept_letter_no', ucwords(str_replace('_', ' ', 'dept_letter_no')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('dept_letter_no_date', ucwords(str_replace('_', ' ', 'dept_letter_no_date')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('grant_amount', ucwords(str_replace('_', ' ', 'grant_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('deduction', ucwords(str_replace('_', ' ', 'deduction')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('net_amount', ucwords(str_replace('_', ' ', 'net_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_case_status_id', ucwords(str_replace('_', ' ', 'tbl_case_status_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_payment_mode_id', ucwords(str_replace('_', ' ', 'tbl_payment_mode_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_list_bank_branches_id', ucwords(str_replace('_', ' ', 'tbl_list_bank_branches_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('account_no', ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('bank_verification', ucwords(str_replace('_', ' ', 'bank_verification')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('sign_of_applicant', ucwords(str_replace('_', ' ', 'sign_of_applicant')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('s_n_office_dept_seal', ucwords(str_replace('_', ' ', 's_n_office_dept_seal')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('s_n_dept_admin_seal', ucwords(str_replace('_', ' ', 's_n_dept_admin_seal')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('payroll_attach', ucwords(str_replace('_', ' ', 'payroll_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('dc_attach', ucwords(str_replace('_', ' ', 'dc_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('bf_contribution_attach', ucwords(str_replace('_', ' ', 'bf_contribution_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('cnic_attach', ucwords(str_replace('_', ' ', 'cnic_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('boards_approval', ucwords(str_replace('_', ' ', 'boards_approval')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('ac_edit', ucwords(str_replace('_', ' ', 'ac_edit')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_secretary', ucwords(str_replace('_', ' ', 'sent_to_secretary')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('approve_secretary', ucwords(str_replace('_', ' ', 'approve_secretary')), 'required|xss_clean|trim');

            
            // $this->form_validation->set_rules('sent_to_bank', ucwords(str_replace('_', ' ', 'sent_to_bank')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('feedback_website', ucwords(str_replace('_', ' ', 'feedback_website')), 'required|xss_clean|trim'); 

  

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('funeral/edit_funeral_grant', $data);
				$this->load->view('templates/footer');
			} else {
                //echo 'i m here'; exit;
				// to model
				$this->funeral_model->edit_funeral_grant();
				// set session message
				$this->session->set_flashdata('updated', '!');
				redirect(base_url('view_funeral_grants'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('funeral/edit_funeral_grant');
			$this->load->view('templates/footer');
		}

	}


	public function getData($id) {
		$data = $this->funeral_model->getRecordById($id);
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

	public function view_funeral_grants() {

		$data['page_title'] = 'View All Funeral Grants';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('funeral/view_funeral_grants', $data);
		$this->load->view('templates/footer');
	}

	public function get_funeral_grants() {

		$data = $row = array();

		// Fetch funeral grants's records
		$funeralData = $this->funeral_model->getRows($_POST);
        //echo '<pre>'; print_r($funeralData); exit;

		$i = $_POST['start'];
		foreach ($funeralData as $funeralInfo) {
			$i++;
			//$status = ($funeralInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($funeralInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $funeralInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $funeralInfo->id . '/tbl_funeral_grant') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' ;
            if(!($_SESSION['tbl_admin_role_id'] == '2')) {  
			$actionBtn .= '<a href="' . site_url('funeral/edit_funeral_grant/' . $funeralInfo->id) . '">
			                   <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                               </a>';
            }
            
            $getDept = $this->common_model->getRecordById($funeralInfo->parent_dept, $tbl_name = 'tbl_department');
			$data[] = array($i, $funeralInfo->application_no, $funeralInfo->record_no, $funeralInfo->record_no_year, $funeralInfo->name_deceased, $funeralInfo->doa, $funeralInfo->dor, $funeralInfo->los, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->funeral_model->countAll(),
			"recordsFiltered" => $this->funeral_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
