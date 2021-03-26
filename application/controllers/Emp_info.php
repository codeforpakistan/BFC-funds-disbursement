<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Emp_info extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();

		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
	}

	public function fetchDataPayScale($tbl_post_id) {
		$data = $this->emp_info_model->fetchDataPayScale($tbl_post_id);
		echo json_encode($data);
	}
	// add emp info
	public function add_emp_info() {
		// if ($_SESSION['tbl_admin_role_id'] != '1') {
		// 	$this->session->sess_destroy();
		// 	redirect('admin', 'refresh');
		// }
		$data['page_title'] = 'Add New Employee Information';
		$data['description'] = '...';
        if($_SESSION['tbl_admin_role_id'] == '6') {
            $data['post'] = $this->common_model->getAllRecordsByCond('tbl_post', "status = '1' AND tbl_pay_scale_id < '16' ORDER BY tbl_pay_scale_id DESC ");
        } else if($_SESSION['tbl_admin_role_id'] == '4') {
            $data['post'] = $this->common_model->getAllRecordsByCond('tbl_post', "status = '1' AND tbl_pay_scale_id > '15' ORDER BY tbl_pay_scale_id DESC ");
        } else if($_SESSION['tbl_admin_role_id'] == '1') {
            $data['post'] = $this->common_model->getAllRecordByArray('tbl_post', array('status' => '1'));
        }
		
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
		$data['district'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));
		if ($this->input->post('submit')) {

            
			$this->form_validation->set_rules('grantee_name', ucwords(str_replace('_', ' ', 'grantee_name')), 'required|xss_clean|trim|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('father_name', ucwords(str_replace('_', ' ', 'father_name')), 'required|xss_clean|trim|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('contact_no', ucwords(str_replace('_', ' ', 'contact_no')), 'required|xss_clean|trim|min_length[3]|max_length[11]|numeric');
			$this->form_validation->set_rules('marital_status', 'Selection', 'required|xss_clean');
			//$this->form_validation->set_rules('cnic_no', ucwords(str_replace('_', ' ', 'cnic_no')), 'required|xss_clean|trim|min_length[13]|max_length[13]');
			$this->form_validation->set_rules('cnic_no', ucwords(str_replace('_', ' ', 'cnic_no')), 'required|xss_clean|trim|min_length[3]|max_length[13]|is_unique[tbl_emp_info.cnic_no]|numeric', array('numeric' => 'The %s field may only contain 0-9 numeric characters.'));
            $this->form_validation->set_rules('dob', ucwords(str_replace('_', ' ', 'Date of birth')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
			//$this->form_validation->set_rules('personnel_no', ucwords(str_replace('_', ' ', 'personnel_no')), 'xss_clean|trim|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('personnel_no', ucwords(str_replace('_', ' ', 'personnel_no')), 'required|xss_clean|trim|min_length[3]|max_length[20]|is_unique[tbl_emp_info.personnel_no]|numeric', array('numeric' => 'The %s field may only contain 0-9 numeric characters.'));
            $this->form_validation->set_rules('tbl_department_id', 'Selection', 'required|xss_clean');
			$this->form_validation->set_rules('tbl_post_id', 'Selection', 'required|xss_clean');
			$this->form_validation->set_rules('pay_scale', ucwords(str_replace('_', ' ', 'pay_scale')), 'required|xss_clean|trim|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('tbl_district_id', 'Selection', 'required|xss_clean');
			$this->form_validation->set_rules('office_address', ucwords(str_replace('_', ' ', 'office_address')), 'required|xss_clean|trim|min_length[3]');
			$this->form_validation->set_rules('other_address', ucwords(str_replace('_', ' ', 'other_address')), 'required|xss_clean|trim|min_length[3]');
			$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('emp_info/add_emp_info', $data);
				$this->load->view('templates/footer');
			} else { 
				// to model
				$this->emp_info_model->add_emp_info();
				// set session message
				$this->session->set_flashdata('add', '!');
				redirect(base_url('view_emp_info'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('emp_info/add_emp_info');
			$this->load->view('templates/footer');
		}
	}
    
	public function edit_emp_info($id = null) {
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('grantee_name', ucwords(str_replace('_', ' ', 'grantee_name')), 'required|xss_clean|trim|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('father_name', ucwords(str_replace('_', ' ', 'father_name')), 'required|xss_clean|trim|min_length[3]|max_length[30]');
			$this->form_validation->set_rules('contact_no', ucwords(str_replace('_', ' ', 'contact_no')), 'required|xss_clean|trim|min_length[3]|max_length[11]|numeric');
			$this->form_validation->set_rules('marital_status', 'Selection', 'required|xss_clean');
			$this->form_validation->set_rules('cnic_no', ucwords(str_replace('_', ' ', 'cnic_no')), 'required|xss_clean|trim|min_length[13]|max_length[13]');
			$this->form_validation->set_rules('dob', ucwords(str_replace('_', ' ', 'Date of birth')), 'required|xss_clean|trim|min_length[3]|max_length[12]|alpha_dash', array('alpha_dash' => 'The %s field may only contain Date characters.'));
			$this->form_validation->set_rules('personnel_no', ucwords(str_replace('_', ' ', 'personnel_no')), 'xss_clean|trim|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('tbl_department_id', 'Selection', 'required|xss_clean');
			$this->form_validation->set_rules('tbl_post_id', 'Selection', 'required|xss_clean');
			$this->form_validation->set_rules('pay_scale', ucwords(str_replace('_', ' ', 'pay_scale')), 'required|xss_clean|trim|min_length[3]|max_length[20]');
			$this->form_validation->set_rules('tbl_district_id', 'Selection', 'required|xss_clean');
			$this->form_validation->set_rules('office_address', ucwords(str_replace('_', ' ', 'office_address')), 'required|xss_clean|trim|min_length[3]');
			$this->form_validation->set_rules('other_address', ucwords(str_replace('_', ' ', 'other_address')), 'required|xss_clean|trim|min_length[3]');
			$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {

				$data['all'] = $this->common_model->getRecordById($this->input->post('id'), 'tbl_emp_info');
				$data['post'] = $this->common_model->getAllRecordByArray('tbl_post', array('status' => '1'));
				$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
				$data['district'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));
				$data['page_title'] = 'Edit Employee Information';
				$data['description'] = '...';
				$this->load->view('templates/header', $data);
				$this->load->view('emp_info/edit_emp_info');
				$this->load->view('templates/footer');
			} else {
				$this->emp_info_model->update_emp_info();
				$this->session->set_flashdata('updated', '!');
				redirect(base_url('view_emp_info'));
			}
		} else {
			$data['all'] = $this->common_model->getRecordById($id, 'tbl_emp_info');
			$data['post'] = $this->common_model->getAllRecordByArray('tbl_post', array('status' => '1'));
			$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
			$data['district'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));
			$data['page_title'] = 'Edit Employee Information';
			$data['description'] = '...';
			if (empty($data['all'])) {
				show_404();
			}
			$this->load->view('templates/header', $data);
			$this->load->view('emp_info/edit_emp_info');
			$this->load->view('templates/footer');
		}
	}

	public function getData($id) {
		$data = $this->emp_info_model->getRecordById($id);
		echo json_encode($data);
    }

    public function getDataByPersonnelNo($personnelNo) {
        
        $data = array('personnelNo'=>$personnelNo);
        //$data = $this->emp_info_model->getRecordByPersonnelNo($personnelNo);
        //echo '<pre>'; print_r($data); //exit;
		echo json_encode($data);
    }


    public function getGrants($id){
       $table = '';

       //$emp = $this->getData($id);
       //$emp_scale_id = $emp['emp_scale_id'];
       //if($emp_scale_id > 15) {
       //}

        

       $table .= '<p>Click on the grant you want to continue with!</p>
       <input type="text" name="empID" id="empID" value="">
       <div class="row">
           <div class="col-md-4 col-sm-6">
               <div class="text-center">
                   <a href="'.base_url('add_scholarship_grant/'.$id).'">
                       <img src="'.base_url('assets/site/').'images/scholarship-grants.jpg" alt="">
                       <p>Scholarship Grants </p>
                   </a>
               </div>
           </div>
           <div class="col-md-4 col-sm-6">
               <div class="text-center">
                   <a href="'.base_url('add_retirement_grant/'.$id).'">
                       <img src="'.base_url('assets/site/').'images/retirement-grants.jpg" alt="">
                       <p>Retirement Grants</p>
                   </a>
               </div>
           </div>
           <div class="col-md-4 col-sm-6">
               <div class="text-center">
                   <a href="'.base_url('add_lumpsum_grant/'.$id).'">
                       <img src="'.base_url('assets/site/').'images/lumpsum-grants.jpg" alt="">
                       <p>Lump Sum Grants</p>
                   </a>
               </div>
           </div>
       </div>
       <div class="row">
           <div class="col-md-4 col-sm-6">
               <div class="text-center">
                   <a href="'.base_url('add_funeral_grant/'.$id).'">
                       <img src="'.base_url('assets/site/').'images/funeral-grants.jpg" alt="">
                       <p>Funeral Grants</p>
                   </a>
               </div>
           </div>
           <div class="col-md-4 col-sm-6">
               <div class="text-center">
                   <a href="'.base_url('add_monthly_grant/'.$id).'">
                       <img src="'.base_url('assets/site/').'images/monthly-grants.jpg" alt="">
                       <p>Monthly Grants</p>
                   </a>
               </div>
           </div>
           <div class="col-md-4 col-sm-6">
               <div class="text-center">
                   <a href="'.base_url('add_interest_free_loan_grant/'.$id).'">
                       <img src="'.base_url('assets/site/').'images/interest-free-loan-grants.jpg" alt="">
                       <p>Interest Free Loan Grants</p>
                   </a>
               </div>
           </div>
       </div>';

       echo $table;
    }
    
    public function getEmpData(){
        $emp_id = $this->input->post('emp_id');
        //echo json_encode($emp_id);
        $data = $this->emp_info_model->getRecordById($emp_id);
		echo json_encode($data);
    }

	public function view_emp_info() {
		$data['department'] = $this->common_model->getAllRecordByArray('tbl_department', array('status' => '1'));
		$data['district'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));
		$data['post'] = $this->common_model->getAllRecordByArray('tbl_post', array('status' => '1'));
		$data['page_title'] = 'View employee info';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('emp_info/view_emp_info', $data);
		$this->load->view('templates/footer');
	}

	public function get_emp_info() {

		$data = $row = array();
        //echo '<pre>'; print_r($_POST); exit;
		// Fetch emp info's records
		$emp_infoData = $this->emp_info_model->getRows($_POST);

        //echo '<pre>'; print_r($emp_infoData); exit;

		$i = $_POST['start'];
		foreach ($emp_infoData as $emp_infoInfo) {
			$i++;
			$status = ($emp_infoInfo->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($emp_infoInfo->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = date("d-M-Y", strtotime($emp_infoInfo->record_add_date));

			$add_by_date = 'Add by <i><strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			//$getGrant = $this->admin->getRecordById($emp_infoInfo->tbl_grants_id, $tbl_name = 'tbl_grants');
			//$getPayScale = $this->admin->getRecordById($emp_infoInfo->tbl_pay_scale_id, $tbl_name = 'tbl_pay_scale');

			$dob = date('d-m-Y', strtotime($emp_infoInfo->dob));

			$actionBtn = '<a href="javascript:void(0)" onclick="getData(' . "'" . $emp_infoInfo->id . "'" . ')">
                      <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-success"><i class="fa fa-info-circle"></i></button>
                      </a>' .
			'<a href="' . site_url('common/logger/' . $emp_infoInfo->id . '/tbl_emp_info') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>' .
			'<a href="' . site_url('emp_info/edit_emp_info/' . $emp_infoInfo->id) . '">
                      <button type="button" class="btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
                      </a>' . 
            '<a href="javascript:" onclick="getGrants(' . "'" . $emp_infoInfo->id . "'" . ')" class="grantPopUp btn btn-xs btn-info">Grants</a>' .
				$status;
			$data[] = array($i, $emp_infoInfo->grantee_name, $emp_infoInfo->father_name, $emp_infoInfo->contact_no, $emp_infoInfo->cnic_no, $emp_infoInfo->personnel_no, $dob, $add_by_date, $actionBtn);
		}
        //data-toggle="modal" data-id="'.$emp_infoInfo->id.'" data-target="#grantsModal"
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->emp_info_model->countAll(),
			"recordsFiltered" => $this->emp_info_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}
}
