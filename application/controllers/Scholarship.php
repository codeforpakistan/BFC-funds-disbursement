<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Scholarship extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();
        $this->load->model('scholarship_model');
		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
    }
    
	public function add_scholarship_grant($id = null) {
        
        if (!($_SESSION['tbl_admin_role_id'] == '1')) {
            $emp_array = array('status'=> '1', 'record_add_by'=> $_SESSION['admin_id']);
        }

		$data['page_title'] = 'Add New Scholarship Grant';
		$data['description'] = '...';
		$data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
        $data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['bank_types'] = $this->common_model->getAllRecordByArray('tbl_banks', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
        $data['employees'] = $this->common_model->getAllRecordByArray('tbl_emp_info', $emp_array);
        $data['scholarship_classes'] = $this->common_model->getAllRecordByArray('tbl_scholarship_classes', array('status' => '1'));
        if($id!=''){
            $data['emp_info'] = $this->emp_info_model->getRecordById($id);
        }

		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('tbl_department_id', ucwords(str_replace('_', ' ', 'tbl_department_id')), 'required|xss_clean|trim');
			$this->form_validation->set_rules('duty_place', ucwords(str_replace('_', ' ', 'duty_place')), 'required|xss_clean|trim');
			$this->form_validation->set_rules('std_name', ucwords(str_replace('_', ' ', 'std_name')), 'required|xss_clean|trim|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('class_pass', ucwords(str_replace('_', ' ', 'class_pass')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('exam_pass', ucwords(str_replace('_', ' ', 'exam_pass')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('result_date', ucwords(str_replace('_', ' ', 'result_date')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
            $this->form_validation->set_rules('mo', ucwords(str_replace('_', ' ', 'mo')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tm', ucwords(str_replace('_', ' ', 'tm')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('percentage', ucwords(str_replace('_', ' ', 'percentage')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('institute_name', ucwords(str_replace('_', ' ', 'institute_name')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('institute_add', ucwords(str_replace('_', ' ', 'institute_add')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('grant_amount', ucwords(str_replace('_', ' ', 'grant_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('deduction', ucwords(str_replace('_', ' ', 'deduction')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('net_amount', ucwords(str_replace('_', ' ', 'net_amount')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('tbl_case_status_id', ucwords(str_replace('_', ' ', 'tbl_case_status_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_payment_mode_id', ucwords(str_replace('_', ' ', 'tbl_payment_mode_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_list_bank_branches_id', ucwords(str_replace('_', ' ', 'tbl_list_bank_branches_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('account_no', ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('std_signature', ucwords(str_replace('_', ' ', 'std_signature')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('gov_servent_sign', ucwords(str_replace('_', ' ', 'gov_servent_sign')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('seal_institute', ucwords(str_replace('_', ' ', 'seal_institute')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('head_institute', ucwords(str_replace('_', ' ', 'head_institute')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('office_seal_hod', ucwords(str_replace('_', ' ', 'office_seal_hod')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('hod_sign', ucwords(str_replace('_', ' ', 'hod_sign')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('bank_verification', ucwords(str_replace('_', ' ', 'bank_verification')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('payroll_lpc_attach', ucwords(str_replace('_', ' ', 'payroll_lpc_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('dmc_attach', ucwords(str_replace('_', ' ', 'dmc_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('cnic_attach', ucwords(str_replace('_', ' ', 'cnic_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('grade_attach', ucwords(str_replace('_', ' ', 'grade_attach')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_secretary', ucwords(str_replace('_', ' ', 'sent_to_secretary')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('approve_secretary', ucwords(str_replace('_', ' ', 'approve_secretary')), 'required|xss_clean|trim');

            // $this->form_validation->set_rules('ac_edit', ucwords(str_replace('_', ' ', 'ac_edit')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_bank', ucwords(str_replace('_', ' ', 'sent_to_bank')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('feedback_website', ucwords(str_replace('_', ' ', 'feedback_website')), 'required|xss_clean|trim'); 

  

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('scholarships/add_scholarship_grant', $data);
				$this->load->view('templates/footer');
			} else {
                //echo 'i m here'; exit;
				// to model
				$this->scholarship_model->add_scholarship_grant(); 
                
                // set session message
				$this->session->set_flashdata('add', '!');
				redirect(base_url('view_scholarship_grants'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('scholarships/add_scholarship_grant');
			$this->load->view('templates/footer');
		}

    }
    

    public function edit_scholarship_grant($id = null) {
        
        
        //echo 'id = '. $id; exit();

        if (!($_SESSION['tbl_admin_role_id'] == '1')) {
            $emp_array = array('status'=> '1', 'record_add_by'=> $_SESSION['admin_id']);
        }

        
		$data['page_title'] = 'Edit Scholarship Grant';
        $data['description'] = '...';
        $data['id'] = $id;
        $data['all'] = $this->common_model->getRecordById($id, 'tbl_scholaarship_grant');
		$data['cases'] = $this->common_model->getAllRecordByArray('tbl_case_status', array('status' => '1'));
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
        $data['payment_modes'] = $this->common_model->getAllRecordByArray('tbl_payment_mode', array('status' => '1'));
        $data['bank_types'] = $this->common_model->getAllRecordByArray('tbl_banks', array('status' => '1'));
        $data['banks'] = $this->common_model->getAllRecordByArray('tbl_list_bank_branches', array('status' => '1'));
        $data['employees'] = $this->common_model->getAllRecordByArray('tbl_emp_info', $emp_array);
        $data['scholarship_classes'] = $this->common_model->getAllRecordByArray('tbl_scholarship_classes', array('status' => '1'));
        
        
        $data['emp_info'] = $this->emp_info_model->getRecordById($data['all']['tbl_emp_info_id']);
        //print_r($data['emp_info']); exit(); 

		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('tbl_department_id', ucwords(str_replace('_', ' ', 'tbl_department_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('duty_place', ucwords(str_replace('_', ' ', 'duty_place')), 'required|xss_clean|trim');
			$this->form_validation->set_rules('std_name', ucwords(str_replace('_', ' ', 'std_name')), 'required|xss_clean|trim|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('class_pass', ucwords(str_replace('_', ' ', 'class_pass')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('exam_pass', ucwords(str_replace('_', ' ', 'exam_pass')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('result_date', ucwords(str_replace('_', ' ', 'result_date')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
            $this->form_validation->set_rules('mo', ucwords(str_replace('_', ' ', 'mo')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tm', ucwords(str_replace('_', ' ', 'tm')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('percentage', ucwords(str_replace('_', ' ', 'percentage')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('institute_name', ucwords(str_replace('_', ' ', 'institute_name')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('institute_add', ucwords(str_replace('_', ' ', 'institute_add')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('grant_amount', ucwords(str_replace('_', ' ', 'grant_amount')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('deduction', ucwords(str_replace('_', ' ', 'deduction')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('net_amount', ucwords(str_replace('_', ' ', 'net_amount')), 'required|xss_clean|trim');
            //$this->form_validation->set_rules('tbl_case_status_id', ucwords(str_replace('_', ' ', 'tbl_case_status_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('tbl_payment_mode_id', ucwords(str_replace('_', ' ', 'tbl_payment_mode_id')), 'required|xss_clean|trim');
            
            $this->form_validation->set_rules('tbl_list_bank_branches_id', ucwords(str_replace('_', ' ', 'tbl_list_bank_branches_id')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('account_no', ucwords(str_replace('_', ' ', 'account_no')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('std_signature', ucwords(str_replace('_', ' ', 'std_signature')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('gov_servent_sign', ucwords(str_replace('_', ' ', 'gov_servent_sign')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('seal_institute', ucwords(str_replace('_', ' ', 'seal_institute')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('head_institute', ucwords(str_replace('_', ' ', 'head_institute')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('office_seal_hod', ucwords(str_replace('_', ' ', 'office_seal_hod')), 'required|xss_clean|trim');

            $this->form_validation->set_rules('hod_sign', ucwords(str_replace('_', ' ', 'hod_sign')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('bank_verification', ucwords(str_replace('_', ' ', 'bank_verification')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('payroll_lpc_attach', ucwords(str_replace('_', ' ', 'payroll_lpc_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('dmc_attach', ucwords(str_replace('_', ' ', 'dmc_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('cnic_attach', ucwords(str_replace('_', ' ', 'cnic_attach')), 'required|xss_clean|trim');
            $this->form_validation->set_rules('grade_attach', ucwords(str_replace('_', ' ', 'grade_attach')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_secretary', ucwords(str_replace('_', ' ', 'sent_to_secretary')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('approve_secretary', ucwords(str_replace('_', ' ', 'approve_secretary')), 'required|xss_clean|trim');

            // $this->form_validation->set_rules('ac_edit', ucwords(str_replace('_', ' ', 'ac_edit')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('sent_to_bank', ucwords(str_replace('_', ' ', 'sent_to_bank')), 'required|xss_clean|trim');
            // $this->form_validation->set_rules('feedback_website', ucwords(str_replace('_', ' ', 'feedback_website')), 'required|xss_clean|trim'); 

  

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) { 
				$this->load->view('templates/header', $data);
				$this->load->view('scholarships/edit_scholarship_grant', $data);
				$this->load->view('templates/footer');  
			} else { 
				$this->scholarship_model->edit_scholarship_grant(); 
				$this->session->set_flashdata('updated', '!');
				redirect(base_url('view_scholarship_grants'));
			}
		} else {
            //echo 'i m here'; exit;
			$this->load->view('templates/header', $data);
			$this->load->view('scholarships/edit_scholarship_grant');
			$this->load->view('templates/footer');
		}

	}


	public function getData($id) {
		$data = $this->scholarship_model->getRecordById($id);
		echo json_encode($data);
    }
    
    
    public function getAmountData($id) {
		$data = $this->scholarship_model->getAmountData($id);
		echo json_encode($data);
    }

    
    public function change_status() {
        $postData = $this->input->post();  
        if(isset($postData['btnSubmit'])){ 
            $countSelected = count($postData['application_no']); 
            if($countSelected > 0) {
                $this->scholarship_model->update_application_status(); 
				$this->session->set_flashdata('custom', 'Application(s) status updated successfully!');
				redirect(base_url('view_scholarship_grants'));
            } else {
                $this->session->set_flashdata('error_custom', 'Please select some applications to proceed!');
				redirect(base_url('view_scholarship_grants'));
            }
        } 
    }

	public function view_scholarship_grants() {

		$data['page_title'] = 'View All Scholarship Grants';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('scholarships/scholarship_grants', $data);
		$this->load->view('templates/footer');
	}

	public function get_scholarship_grants() {

		$data = $row = array();

		// Fetch Scholarship grants's records
		$scholarshipData = $this->scholarship_model->getRows($_POST);
        //echo '<pre>'; print_r($scholarshipData); exit;

		$i = $_POST['start'];
		foreach ($scholarshipData as $scholarshipInfo) {
			$i++;
			//$status = ($scholarshipInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

            $emp_info_id = $scholarshipInfo->tbl_emp_info_id;
            $emp_info = $this->common_model->getRecordByColoumn('tbl_emp_info', 'id',  $emp_info_id);
            $emp_name = $emp_info['grantee_name'];
            $tbl_department_id = $emp_info['tbl_department_id'];
            //$tbl_post_id = $emp_info['tbl_post_id'];
            $pay_scale = $emp_info['pay_scale'];
            $personnel_no = $emp_info['personnel_no'];
            //$dob = $emp_info['dob'];
            $cnic_no = $emp_info['cnic_no'];

            $get_dept = $this->common_model->getRecordByColoumn('tbl_department', 'id',  $tbl_department_id);
            $dept_name = $get_dept['name'];
            $dept_name_scale = $dept_name. ' ('.$pay_scale.')';

            $case_status_id = $scholarshipInfo->tbl_case_status_id;
            $getstatus = $this->common_model->getRecordByColoumn('tbl_case_status', 'id',  $case_status_id);
            $status = '<span class="'.$getstatus['label'].'">'.$getstatus['name'].'</span>';

			$getRole = $this->admin->getRecordById($scholarshipInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $scholarshipInfo->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

            $class_pass = $scholarshipInfo->class_pass;
            $exam_pass = $scholarshipInfo->exam_pass;
            $result_date = $scholarshipInfo->result_date;

            //$exam_pass = $this->common_model->getAllRecordByArray('tbl_scholarship_classes', array('id' => $scholarshipInfo->exam_pass));
            $get_class_pass = $this->common_model->getRecordByColoumn('tbl_scholarship_classes', 'id',  $scholarshipInfo->class_pass);
            $class_pass = $get_class_pass['class_name'];
			$add_by_date = '<i>Add by <strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('common/logger/' . $scholarshipInfo->id . '/tbl_scholaarship_grant') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>';
			// '<a href="javascript:void(0)" onclick="getData(' . "'" . $scholarshipInfo->id . "'" . ')">
            //           <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
            //           </a>';

            if(!($_SESSION['tbl_admin_role_id'] == '2')) { 

			$actionBtn .= '<a href="' . site_url('scholarship/edit_scholarship_grant/' . $scholarshipInfo->id) . '">
			                   <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                               </a>';
            } 
            
            $input = '<input type="checkbox" name="application_no[]" id="application_no" value="'.$scholarshipInfo->application_no.'">';
            
            //$getDept = $this->common_model->getRecordById($scholarshipInfo->parent_dept, $tbl_name = 'tbl_department');
			$data[] = array($input, $i, $scholarshipInfo->application_no, 
            $emp_name, $dept_name_scale, $cnic_no, $personnel_no,
            $scholarshipInfo->std_name, 
            $class_pass, $exam_pass, $result_date,  $status, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->scholarship_model->countAll(),
			"recordsFiltered" => $this->scholarship_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
?>
