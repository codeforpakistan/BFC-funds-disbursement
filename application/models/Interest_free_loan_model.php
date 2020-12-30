<?php
class Interest_free_loan_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_interest_free_loan';
		// Set orderable column fields
		$this->column_order = array(null, 'id');
		// Set searchable column fields
		$this->column_search = array('cnic_no');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp////////
	}

	public function getAmountData() {
        
        $dateOfAppointment = $this->input->post('doa');
        $dateOfRetirement = $this->input->post('dor');
        $empScaleID = $this->input->post('empScaleID');
        $loanTypeID = $this->input->post('loanTypeID');
        $empID = $this->input->post('empID');
        $todayDate  =   date('Y-m-d');
      
        $minYears = $this->getdiffbtwdates($dateOfAppointment, $todayDate);
        $remainingYears = $this->getdiffbtwdates($todayDate, $dateOfRetirement);

        //return $calDates;
        //return array('doa'=>$dateOfAppointment, 'dor'=>$dateOfRetirement, 'empScaleID'=>$empScaleID, 'loanTypeID'=>$loanTypeID, 'empID'=>$empID );
        //$dateOfRetirement = base64_decode($date);
        //'status' => 'success' 
        
        $this->db->select('*');
        $this->db->from('tbl_interestfreeloan_payments');    
        //$this->db->where( $empScaleID .' BETWEEN tbl_pay_scale_id AND tbl_pay_scale_id_to'); 

        // if($loanTypeID == 1 || $loanTypeID == 2 || $loanTypeID == 3) {
        //     $this->db->where('tbl_pay_scale_id <= '.$empScaleID);
        //     $this->db->where('tbl_pay_scale_id_to >= '.$empScaleID);
        // }

        $this->db->where('tbl_pay_scale_id <= '.$empScaleID);
        $this->db->where('tbl_pay_scale_id_to >= '.$empScaleID);
  
        
        $this->db->where('tbl_loan_types_id', $loanTypeID);
        $this->db->where('tbl_grants_id', "5");
        $this->db->where('status', "1"); 
        $query = $this->db->get(); 
        $row = $query->row(); 

        $tblMinYears = $row->min_service;
        $tblRemainingYears = $row->remaining_service;

        // $response = array(  'status'=>'fail', 'minYears'=> $minYears['years'], 
        //                     'remainingYears'=> $remainingYears['years'],
        //                     'tblMinYears'=>$tblMinYears, 'tblRemainingYears'=>$tblRemainingYears,
        //                     'dateOfAppointment'=>$dateOfAppointment, 'dateOfRetirement'=>$dateOfRetirement,
        //                     'empID'=>$empID);

        if(count($row) > 0){ 
            if( $minYears['years'] < $tblMinYears){
                $response = array('status'=>'fail', 'data'=> "You don't have minimum years of service, ".$tblMinYears. " is a must.");
            } else if($remainingYears['years'] <  $tblRemainingYears){
                $response = array('status'=>'fail', 'data'=> "You don't have minimum years of service to get retired, ".$tblRemainingYears. " is a must.");
            } else {
                $response = array('status'=>'success', 'data'=>$row);
            } 
        } else {
            $response = array('status'=>'fail', 'data'=> 'You are not eligible for the loan.');
        }
        

        return $response;



 
    }


    public function apply_interestfreeloan_grant() {

        // echo 'in model'; 
        //echo '<pre>'; print_r($_POST);
        // exit();
        
        $application_no = $this->common_model->getApplicationNo();   
        $app_data = array(
            'tbl_grants_id' => '5',
            'tbl_emp_info_id' => '0', //$this->input->post('tbl_emp_info_id')
            'application_no' => $application_no,
            'status' => '3'
        );
        $this->db->insert('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
        $last_insert_id = $this->db->insert_id(); 
        //echo 'app_no = '. $last_insert_id; exit;
		$data = array( 
            'application_no' => $application_no,
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            //'pay_scale' => $this->input->post('pay_scale'),
            'pay_scale_id' => $this->input->post('pay_scale_id'),
            'dao' => $this->input->post('dao'),
            'ddo_code' => $this->input->post('ddo_code'),
            'ddo_address' => $this->input->post('ddo_address'),
            'marital_status' => $this->input->post('marital_status'),
            'personnel_no' => $this->input->post('personnel_no'),
            'tbl_loan_type_id' => $this->input->post('tbl_loan_type_id'),
            'grantee_name' => $this->input->post('grantee_name'),
            'father_name' => $this->input->post('father_name'),
            'cnic_no' => $this->input->post('cnic_no'),
            'office_address' => $this->input->post('office_address'),
            'tbl_department_id' => $this->input->post('tbl_department_id'),
            'tbl_post_id' => $this->input->post('tbl_post_id'),
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'dob' => $this->input->post('dob'),
            'doa' => $this->input->post('doa'),
            'dor' => $this->input->post('dor'),
            'los' => $this->input->post('los'),
            'grant_amount' => $this->input->post('grant_amount'),
            'deduction' => $this->input->post('deduction'),
            'net_amount' => $this->input->post('net_amount'),
            'present_add' => $this->input->post('present_add'),
            'permanent_add' => $this->input->post('permanent_add'),
            'duty_place' => $this->input->post('duty_place'),
            'contact_no' => $this->input->post('contact_no'),
            'applicant_sign' => $this->input->post('applicant_sign'),
            'tbl_bank_branch_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'tbl_case_status' => $this->input->post('tbl_case_status_id'),
            'hod_attached' => $this->input->post('hod_attached'),
            'dc_admin' => $this->input->post('dc_admin'),
            'bank_verification' => $this->input->post('bank_verification'),
            'boards_approval' => $this->input->post('boards_approval'),  
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data); 
		//insertion in db
		$this->db->insert($this->table, $data); 
        //$error = $this->db->error(); 
        //echo '<br>error = ' . print_r($error);
        //exit();
        $last_insert_id = $this->db->insert_id();
        //echo '<br>insertID = '. $last_insert_id; exit;
        
		if ($this->db->affected_rows() > 0) {

            //$bankBranch = $this->common_model->getBankBranch($this->input->post('tbl_list_bank_branches_id'));
            //echo '<pre>'; print_r($bankBranch); exit;
            
            // this is for activity log of a record
            $getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
            $getLoanType = $this->common_model->getRecordById($this->input->post('tbl_loan_type_id'), $tbl_name = 'tbl_loan_types');
            $getScale = $this->common_model->getRecordById($this->input->post('tbl_post_id'), $tbl_name = 'tbl_pay_scale');
            $getDistrict = $this->common_model->getRecordById($this->input->post('tbl_district_id'), $tbl_name = 'tbl_district');

            $this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($last_insert_id) //Entry table ID
				->action_type('add') //action type identify Action like add or update
				->detail(
                    '<tr>' .
                    '<td><strong>' . 'Application Number' . '</strong></td>
                     <td colspan="5">' . $application_no . '</td>' .
					'</tr>' .
                    '<tr>' .
					'<td><strong>' . 'Employee ID' . '</strong></td><td>' . $this->input->post('tbl_emp_info_id') . '</td>' .
					'<td><strong>' . 'Pay Scale' . '</strong></td><td>' . $this->input->post('pay_scale') . '</td>' .
					'<td><strong>' . 'Pay Scale ID' . '</strong></td><td>' . $this->input->post('pay_scale_id') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Date of appointment' . '</strong></td><td>' . $this->input->post('class_pass') . '</td>' .
					'<td><strong>' . 'DDO Code' . '</strong></td><td>' . $this->input->post('ddo_code') . '</td>' .
					'<td><strong>' . 'DDO Address' . '</strong></td><td>' . $this->input->post('ddo_address') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marital Status' . '</strong></td><td>' . $this->input->post('marital_status') . '</td>' .
					'<td><strong>' . 'Personnel No' . '</strong></td><td>' . $this->input->post('personnel_no') . '</td>' .
					'<td><strong>' . 'Loan Type' . '</strong></td><td>' . $getLoanType['title'] . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Grantee Name' . '</strong></td><td>' . $this->input->post('grantee_name') . '</td>' .
					'<td><strong>' . 'Father Name' . '</strong></td><td>' . $this->input->post('father_name') . '</td>' .
					'<td><strong>' . 'CNIC' . '</strong></td><td>' . $this->input->post('cnic_no') . '</td>' .
					'</tr>' .
                    '<td><strong>' . 'Office Address' . '</strong></td><td>' . $this->input->post('office_address') . '</td>' .
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Post Scale' . '</strong></td><td>' . $getScale['name'] . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'District' . '</strong></td><td>' . $getDistrict['name'] . '</td>' .
					'<td><strong>' . 'Date of Birth' . '</strong></td><td>' . $this->input->post('dob') . '</td>' .
					'<td><strong>' . 'Date of Appointment' . '</strong></td><td>' . $this->input->post('doa') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'Date of Retirement' . '</strong></td><td>' . $this->input->post('dor') . '</td>' .
					'<td><strong>' . 'Length of Service' . '</strong></td><td>' . $this->input->post('los') . '</td>' .
					'<td><strong>' . 'Grant Amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'Deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
					'<td><strong>' . 'Net Amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'<td><strong>' . 'Present Address' . '</strong></td><td>' . $this->input->post('present_add') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'Permanent Address' . '</strong></td><td>' . $this->input->post('permanent_add') . '</td>' .
					'<td><strong>' . 'Duty Place' . '</strong></td><td>' . $this->input->post('duty_place') . '</td>' .
					'<td><strong>' . 'Contact No' . '</strong></td><td>' . $this->input->post('contact_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'Applicant Sign' . '</strong></td><td>' . $this->input->post('applicant_sign') . '</td>' .
					'<td><strong>' . 'Bank Branch' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
					'<td><strong>' . 'hod_attached' . '</strong></td><td>' . $this->input->post('hod_attached') . '</td>' .
					'<td><strong>' . 'dc_admin' . '</strong></td><td>' . $this->input->post('dc_admin') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
					'<td><strong>' . 'boards_approval' . '</strong></td><td>' . $this->input->post('boards_approval') . '</td>' .
					'<td><strong>' . 'submit' . '</strong></td><td>' . $this->input->post('submit') . '</td>' .
                    '</tr>'  
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
    }


    public function getdiffbtwdates($date1, $date2){
         
        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

        return array('years'=>$years, 'months'=>$months, 'days'=>$days);
        //printf("%d years, %d months, %d days\n", $years, $months, $days);
    }

	public function add_interestfreeloan_grant() {

        //echo 'in model'; 
        //echo '<pre>'; print_r($_POST);
        //exit();
        if($this->input->post('pay_scale_id') > 15) {
            $gazette = '1';
        } else {
            $gazette = '0';
        }

        $application_no = $this->common_model->getApplicationNo();   
        $app_data = array(
            'tbl_grants_id' => '5',
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            'application_no' => $application_no,
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'gazette' => $gazette,
            'role_id' => $_SESSION['tbl_admin_role_id'],
            'added_by' => $_SESSION['admin_id'],
            'status' => $this->input->post('tbl_case_status_id')
        );
        $this->db->insert('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
        //$last_insert_id = $this->db->insert_id(); 
        
		$data = array( 
            'application_no' => $application_no,
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            //'pay_scale' => $this->input->post('pay_scale'),
            'pay_scale_id' => $this->input->post('pay_scale_id'),
            'dao' => $this->input->post('dao'),
            'ddo_code' => $this->input->post('ddo_code'),
            'ddo_address' => $this->input->post('ddo_address'),
            'marital_status' => $this->input->post('marital_status'),
            'personnel_no' => $this->input->post('personnel_no'),
            'tbl_loan_type_id' => $this->input->post('tbl_loan_type_id'),
            'grantee_name' => $this->input->post('grantee_name'),
            'father_name' => $this->input->post('father_name'),
            'cnic_no' => $this->input->post('cnic_no'),
            'office_address' => $this->input->post('office_address'),
            'tbl_department_id' => $this->input->post('tbl_department_id'),
            'tbl_post_id' => $this->input->post('tbl_post_id'),
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'gazette' => $gazette,
            'dob' => $this->input->post('dob'),
            'doa' => $this->input->post('doa'),
            'dor' => $this->input->post('dor'),
            'los' => $this->input->post('los'),
            'grant_amount' => $this->input->post('grant_amount'),
            'deduction' => $this->input->post('deduction'),
            'net_amount' => $this->input->post('net_amount'),
            'present_add' => $this->input->post('present_add'),
            'permanent_add' => $this->input->post('permanent_add'),
            'duty_place' => $this->input->post('duty_place'),
            'contact_no' => $this->input->post('contact_no'),
            'applicant_sign' => $this->input->post('applicant_sign'),
            'tbl_bank_branch_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'tbl_case_status' => $this->input->post('tbl_case_status_id'),
            'hod_attached' => $this->input->post('hod_attached'),
            'dc_admin' => $this->input->post('dc_admin'),
            'bank_verification' => $this->input->post('bank_verification'),
            'boards_approval' => $this->input->post('boards_approval'),  
             
            

			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data); 
		//insertion in db
		$this->db->insert($this->table, $data); 
        //$error = $this->db->error(); 
        //echo '<br>error = ' . print_r($error);
        //exit();
        $last_insert_id = $this->db->insert_id();
        //echo '<br>insertID = '. $last_insert_id; exit;
        
		if ($this->db->affected_rows() > 0) {

            //$bankBranch = $this->common_model->getBankBranch($this->input->post('tbl_list_bank_branches_id'));
            //echo '<pre>'; print_r($bankBranch); exit;
            
            // this is for activity log of a record
            $getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
            $getLoanType = $this->common_model->getRecordById($this->input->post('tbl_loan_type_id'), $tbl_name = 'tbl_loan_types');
            $getScale = $this->common_model->getRecordById($this->input->post('tbl_post_id'), $tbl_name = 'tbl_pay_scale');
            $getDistrict = $this->common_model->getRecordById($this->input->post('tbl_district_id'), $tbl_name = 'tbl_district');

            $this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($last_insert_id) //Entry table ID
				->action_type('add') //action type identify Action like add or update
				->detail(
                    '<tr>' .
                    '<td><strong>' . 'Application Number' . '</strong></td>
                     <td colspan="5">' . $application_no . '</td>' .
					'</tr>' .
                    '<tr>' .
					'<td><strong>' . 'Employee ID' . '</strong></td><td>' . $this->input->post('tbl_emp_info_id') . '</td>' .
					'<td><strong>' . 'Pay Scale' . '</strong></td><td>' . $this->input->post('pay_scale') . '</td>' .
					'<td><strong>' . 'Pay Scale ID' . '</strong></td><td>' . $this->input->post('pay_scale_id') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Date of appointment' . '</strong></td><td>' . $this->input->post('class_pass') . '</td>' .
					'<td><strong>' . 'DDO Code' . '</strong></td><td>' . $this->input->post('ddo_code') . '</td>' .
					'<td><strong>' . 'DDO Address' . '</strong></td><td>' . $this->input->post('ddo_address') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marital Status' . '</strong></td><td>' . $this->input->post('marital_status') . '</td>' .
					'<td><strong>' . 'Personnel No' . '</strong></td><td>' . $this->input->post('personnel_no') . '</td>' .
					'<td><strong>' . 'Loan Type' . '</strong></td><td>' . $getLoanType['title'] . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Grantee Name' . '</strong></td><td>' . $this->input->post('grantee_name') . '</td>' .
					'<td><strong>' . 'Father Name' . '</strong></td><td>' . $this->input->post('father_name') . '</td>' .
					'<td><strong>' . 'CNIC' . '</strong></td><td>' . $this->input->post('cnic_no') . '</td>' .
					'</tr>' .
                    '<td><strong>' . 'Office Address' . '</strong></td><td>' . $this->input->post('office_address') . '</td>' .
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Post Scale' . '</strong></td><td>' . $getScale['name'] . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'District' . '</strong></td><td>' . $getDistrict['name'] . '</td>' .
					'<td><strong>' . 'Date of Birth' . '</strong></td><td>' . $this->input->post('dob') . '</td>' .
					'<td><strong>' . 'Date of Appointment' . '</strong></td><td>' . $this->input->post('doa') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'Date of Retirement' . '</strong></td><td>' . $this->input->post('dor') . '</td>' .
					'<td><strong>' . 'Length of Service' . '</strong></td><td>' . $this->input->post('los') . '</td>' .
					'<td><strong>' . 'Grant Amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'Deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
					'<td><strong>' . 'Net Amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'<td><strong>' . 'Present Address' . '</strong></td><td>' . $this->input->post('present_add') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'Permanent Address' . '</strong></td><td>' . $this->input->post('permanent_add') . '</td>' .
					'<td><strong>' . 'Duty Place' . '</strong></td><td>' . $this->input->post('duty_place') . '</td>' .
					'<td><strong>' . 'Contact No' . '</strong></td><td>' . $this->input->post('contact_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'Applicant Sign' . '</strong></td><td>' . $this->input->post('applicant_sign') . '</td>' .
					'<td><strong>' . 'Bank Branch' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
					'<td><strong>' . 'hod_attached' . '</strong></td><td>' . $this->input->post('hod_attached') . '</td>' .
					'<td><strong>' . 'dc_admin' . '</strong></td><td>' . $this->input->post('dc_admin') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
					'<td><strong>' . 'boards_approval' . '</strong></td><td>' . $this->input->post('boards_approval') . '</td>' .
					'<td><strong>' . 'submit' . '</strong></td><td>' . $this->input->post('submit') . '</td>' .
                    '</tr>'  
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
    }
    

    public function edit_interestfreeloan_grant() {

        //echo '<pre>'; print_r($_POST); //exit();


		$data = array( 
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            //'pay_scale' => $this->input->post('pay_scale'),
            'pay_scale_id' => $this->input->post('pay_scale_id'),
            'dao' => $this->input->post('dao'),
            'ddo_code' => $this->input->post('ddo_code'),
            'ddo_address' => $this->input->post('ddo_address'),
            'marital_status' => $this->input->post('marital_status'),
            'personnel_no' => $this->input->post('personnel_no'),
            'tbl_loan_type_id' => $this->input->post('tbl_loan_type_id'),
            'grantee_name' => $this->input->post('grantee_name'),
            'father_name' => $this->input->post('father_name'),
            'cnic_no' => $this->input->post('cnic_no'),
            'office_address' => $this->input->post('office_address'),
            'tbl_department_id' => $this->input->post('tbl_department_id'),
            'tbl_post_id' => $this->input->post('tbl_post_id'),
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'dob' => $this->input->post('dob'),
            'doa' => $this->input->post('doa'),
            'dor' => $this->input->post('dor'),
            'los' => $this->input->post('los'),
            'grant_amount' => $this->input->post('grant_amount'),
            'deduction' => $this->input->post('deduction'),
            'net_amount' => $this->input->post('net_amount'),
            'present_add' => $this->input->post('present_add'),
            'permanent_add' => $this->input->post('permanent_add'),
            'duty_place' => $this->input->post('duty_place'),
            'contact_no' => $this->input->post('contact_no'),
            'applicant_sign' => $this->input->post('applicant_sign'),
            'tbl_bank_branch_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'tbl_case_status' => $this->input->post('tbl_case_status_id'),
            'hod_attached' => $this->input->post('hod_attached'),
            'dc_admin' => $this->input->post('dc_admin'),
            'bank_verification' => $this->input->post('bank_verification'),
            'boards_approval' => $this->input->post('boards_approval'),  
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);
        
        //echo '<pre>'; print_r($data); exit();

		//XSS prevention
		$data = $this->security->xss_clean($data);

		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update($this->table, $data);

		if ($result == true) { 
			 

			if ($this->input->post('status') == '1') {$status = 'Active';} else { $status = 'Inactive';}
			//$getPost = $this->common_model->getRecordById($this->input->post('tbl_post_id'), $tbl_name = 'tbl_post');
			$getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
			//$getDistrict = $this->common_model->getRecordById($this->input->post('tbl_district_id'), $tbl_name = 'tbl_district');

			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($this->input->post('id')) //Entry table ID
				->action_type('update') //action type identify Action like add or update
				->detail(
					'<tr>' .
					'<td><strong>' . 'tbl_emp_info_id' . '</strong></td><td>' . $this->input->post('tbl_emp_info_id') . '</td>' .
					'<td><strong>' . 'pay_scale' . '</strong></td><td>' . $this->input->post('pay_scale') . '</td>' .
					'<td><strong>' . 'pay_scale_id' . '</strong></td><td>' . $this->input->post('pay_scale_id') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'dao' . '</strong></td><td>' . $this->input->post('dao') . '</td>' .
					'<td><strong>' . 'ddo_code' . '</strong></td><td>' . $this->input->post('ddo_code') . '</td>' .
					'<td><strong>' . 'ddo_address' . '</strong></td><td>' . $this->input->post('ddo_address') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'marital_status' . '</strong></td><td>' . $this->input->post('marital_status') . '</td>' .
					'<td><strong>' . 'personnel_no' . '</strong></td><td>' . $this->input->post('personnel_no') . '</td>' .
					'<td><strong>' . 'tbl_loan_type_id' . '</strong></td><td>' . $this->input->post('tbl_loan_type_id') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'grantee_name' . '</strong></td><td>' . $this->input->post('grantee_name') . '</td>' .
					'<td><strong>' . 'father_name' . '</strong></td><td>' . $this->input->post('father_name') . '</td>' .
					'<td><strong>' . 'cnic_no' . '</strong></td><td>' . $this->input->post('cnic_no') . '</td>' .
					'</tr>' .
                    '<td><strong>' . 'office_address' . '</strong></td><td>' . $this->input->post('office_address') . '</td>' .
					'<td><strong>' . 'tbl_department_id' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'tbl_post_id' . '</strong></td><td>' . $this->input->post('tbl_post_id') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'tbl_district_id' . '</strong></td><td>' . $this->input->post('tbl_district_id') . '</td>' .
					'<td><strong>' . 'dob' . '</strong></td><td>' . $this->input->post('dob') . '</td>' .
					'<td><strong>' . 'doa' . '</strong></td><td>' . $this->input->post('doa') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'dor' . '</strong></td><td>' . $this->input->post('dor') . '</td>' .
					'<td><strong>' . 'los' . '</strong></td><td>' . $this->input->post('los') . '</td>' .
					'<td><strong>' . 'grant_amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
					'<td><strong>' . 'net_amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'<td><strong>' . 'present_add' . '</strong></td><td>' . $this->input->post('present_add') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'permanent_add' . '</strong></td><td>' . $this->input->post('permanent_add') . '</td>' .
					'<td><strong>' . 'duty_place' . '</strong></td><td>' . $this->input->post('duty_place') . '</td>' .
					'<td><strong>' . 'contact_no' . '</strong></td><td>' . $this->input->post('contact_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'applicant_sign' . '</strong></td><td>' . $this->input->post('applicant_sign') . '</td>' .
					'<td><strong>' . 'tbl_list_bank_branches_id' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
					'<td><strong>' . 'hod_attached' . '</strong></td><td>' . $this->input->post('hod_attached') . '</td>' .
					'<td><strong>' . 'dc_admin' . '</strong></td><td>' . $this->input->post('dc_admin') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
					'<td><strong>' . 'boards_approval' . '</strong></td><td>' . $this->input->post('boards_approval') . '</td>' .
					'<td><strong>' . 'submit' . '</strong></td><td>' . $this->input->post('submit') . '</td>' .
                    '</tr>'  
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
	}


	 

	public function getRecordById($id) {
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
	}

	//////////////// below ajax and server side processing datatable ///////////

	/*
		     * Fetch members data from the database
		     * @param $_POST filter data based on the posted parameters
	*/
	public function getRows($postData) {
		$this->_get_datatables_query($postData);
		if ($postData['length'] != -1) {
			$this->db->limit($postData['length'], $postData['start']);
        }
        if (!($_SESSION['tbl_admin_role_id'] == '1') && !($_SESSION['tbl_admin_role_id'] == '7') && !($_SESSION['tbl_admin_role_id'] == '2')) {
            $this->db->where('record_add_by', $_SESSION['admin_id']);
        }
		$query = $this->db->get();
		return $query->result();
	}

	/*
		     * Count all records
	*/
	public function countAll() {
        $this->db->from($this->table);
        if (!($_SESSION['tbl_admin_role_id'] == '1') && !($_SESSION['tbl_admin_role_id'] == '7') && !($_SESSION['tbl_admin_role_id'] == '2')) {
            $this->db->where('record_add_by', $_SESSION['admin_id']);
        }
		return $this->db->count_all_results();
	}

	/*
		     * Count records based on the filter params
		     * @param $_POST filter data based on the posted parameters
	*/
	public function countFiltered($postData) {
        $this->_get_datatables_query($postData);
        if (!($_SESSION['tbl_admin_role_id'] == '1') && !($_SESSION['tbl_admin_role_id'] == '7') && !($_SESSION['tbl_admin_role_id'] == '2')) {
            $this->db->where('record_add_by', $_SESSION['admin_id']);
        }
		$query = $this->db->get();
		return $query->num_rows();
	}

	/*
		     * Perform the SQL queries needed for an server-side processing requested
		     * @param $_POST filter data based on the posted parameters
	*/
	private function _get_datatables_query($postData) {

		$this->db->from($this->table);

		$i = 0;
		// loop searchable columns
		foreach ($this->column_search as $item) {
			// if datatable send POST for search
			if ($postData['search']['value']) {
				// first loop
				if ($i === 0) {
					// open bracket
					$this->db->group_start();
					$this->db->like($item, $postData['search']['value']);
				} else {
					$this->db->or_like($item, $postData['search']['value']);
				}

				// last loop
				if (count($this->column_search) - 1 == $i) {
					// close bracket
					$this->db->group_end();
				}
			}
			$i++;
		}

		if (isset($postData['order'])) {
			$this->db->order_by($this->column_order[$postData['order']['0']['column']], $postData['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	//////////////// above ajax and server side processing datatable ///////////

}
?>