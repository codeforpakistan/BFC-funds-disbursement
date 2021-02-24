<?php
class Scholarship_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_scholaarship_grant';
		// Set orderable column fields
		$this->column_order = array(null, 'std_name');
		// Set searchable column fields
		$this->column_search = array('std_name');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp////////
	}

    //$payRoll='', $DMC='', $CNIC='', $Grade=''
	public function apply_scholarship_grant($filesUploaded=null) {
        //echo '<pre>'; print_r($filesUploaded); exit;
        //dmc_attach  cnic_attach  grade_attach
        if($filesUploaded['payRoll'] != '') {
            $payroll_lpc_attach = 'Yes';
        }
        if($filesUploaded['dmc'] != '') {
            $dmc_attach = 'Yes';
        }
        if($filesUploaded['cnic'] != '') {
            $cnic_attach = 'Yes';
        }
        if($filesUploaded['grade'] != '') {
            $grade_attach = 'Yes';
        }

        //echo 'in model'; exit();
		$result_date = date('Y-m-d', strtotime($this->input->post('result_date')));  
       
        $application_no = $this->common_model->getApplicationNo();   
        $app_data = array(
            'tbl_grants_id' => '1',
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            'application_no' => $application_no,
        );
        $this->db->insert('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
        //$last_insert_id = $this->db->insert_id(); 


		$data = array( 
            'application_no' => $application_no,
            'parent_dept' => $this->input->post('tbl_department_id'),
            'duty_place' => $this->input->post('duty_place'),
            'std_name' => $this->input->post('std_name'),
            'class_pass' => $this->input->post('class_pass'),
            'exam_pass' => $this->input->post('exam_pass'),
            'result_date' => $this->input->post('result_date'),
            'mo' => $this->input->post('mo'),
            'tm' => $this->input->post('tm'),
            'percentage' => $this->input->post('percentage'),
            'institute_name' => $this->input->post('institute_name'),
            'institute_add' => $this->input->post('institute_add'),
            'grant_amount' => $this->input->post('grant_amount'),
            'deduction' => $this->input->post('deduction'),
            'net_amount' => $this->input->post('net_amount'),
            'tbl_case_status_id' => '1',
            'tbl_payment_mode_id' => $this->input->post('tbl_payment_mode_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'std_signature' => $this->input->post('std_signature'),
            'gov_servent_sign' => $this->input->post('gov_servent_sign'),
            //'seal_institute' => $this->input->post('seal_institute'),
            //'head_institute' => $this->input->post('head_institute'),
            //'office_seal_hod' => $this->input->post('office_seal_hod'),
            //'hod_sign' => $this->input->post('hod_sign'),
            //'bank_verification' => $this->input->post('bank_verification'),
            'payroll_lpc_attach' => $payroll_lpc_attach,
            'dmc_attach' => $dmc_attach, 
            'cnic_attach' => $cnic_attach,
            'grade_attach' => $grade_attach,
            //'boards_approval' => $this->input->post('boards_approval'),
            //'sent_to_secretary' => $this->input->post('sent_to_secretary'),
            //'approve_secretary' => $this->input->post('approve_secretary'), 
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'), 
			//'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data); 
		//insertion in db
		$this->db->insert($this->table, $data); 
        //$error = $this->db->error(); 
        //echo '<br>error = ' . $error;
        $last_insert_id = $this->db->insert_id();
        //echo '<br>insertID = '. $last_insert_id; exit;
        
		if ($this->db->affected_rows() > 0) {
			// this is for activity log of a record
            $getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
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
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Duty place' . '</strong></td><td>' . $this->input->post('duty_place') . '</td>' .
					'<td><strong>' . 'std name' . '</strong></td><td>' . $this->input->post('std_name') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Class pass' . '</strong></td><td>' . $this->input->post('class_pass') . '</td>' .
					'<td><strong>' . 'Exam pass' . '</strong></td><td>' . $this->input->post('exam_pass') . '</td>' .
					'<td><strong>' . 'Result date' . '</strong></td><td>' . $result_date . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marks Obtained' . '</strong></td><td>' . $this->input->post('mo') . '</td>' .
					'<td><strong>' . 'Total Marks' . '</strong></td><td>' . $this->input->post('tm') . '</td>' .
					'<td><strong>' . 'Percentage' . '</strong></td><td>' . $this->input->post('percentage') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Institute name' . '</strong></td><td>' . $this->input->post('institute_name') . '</td>' .
					'<td><strong>' . 'institute address' . '</strong></td><td>' . $this->input->post('institute_add') . '</td>' .
					'<td><strong>' . 'grant amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
					'<td><strong>' . 'net amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'tbl_payment_mode_id' . '</strong></td><td>' . $this->input->post('tbl_payment_mode_id') . '</td>' .
					'<td><strong>' . 'tbl_list_bank_branches_id' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'std_signature' . '</strong></td><td>' . $this->input->post('std_signature') . '</td>' .
					'<td><strong>' . 'gov_servent_sign' . '</strong></td><td>' . $this->input->post('gov_servent_sign') . '</td>' .
					'<td><strong>' . 'seal_institute' . '</strong></td><td>' . $this->input->post('seal_institute') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'head_institute' . '</strong></td><td>' . $this->input->post('head_institute') . '</td>' .
					'<td><strong>' . 'office_seal_hod' . '</strong></td><td>' . $this->input->post('office_seal_hod') . '</td>' .
					'<td><strong>' . 'hod_sign' . '</strong></td><td>' . $this->input->post('hod_sign') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
					'<td><strong>' . 'Pay Roll' . '</strong></td><td>' . $payroll_lpc_attach . '</td>' .
					'<td><strong>' . 'DMC attach' . '</strong></td><td>' . $dmc_attach . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'cnic attach' . '</strong></td><td>' . $cnic_attach . '</td>' .
					'<td><strong>' . 'grade attach' . '</strong></td><td>' . $grade_attach . '</td>' .
					'<td><strong>' . '' . '</strong></td><td>'.''. '</td>' .
                    '</tr>'  
                    // '<tr>' .
                    // '<td><strong>' . 'sent_to_secretary' . '</strong></td><td>' . $this->input->post('sent_to_secretary') . '</td>' .
					// '<td><strong>' . 'approve_secretary' . '</strong></td><td>' . $this->input->post('approve_secretary') . '</td>' .
					// '<td><strong>' . 'ac_edit' . '</strong></td><td>' . $this->input->post('ac_edit') . '</td>' .
                    // '</tr>' .
                    // '<tr>' .
                    // '<td><strong>' . 'sent_to_bank' . '</strong></td><td>' . $this->input->post('sent_to_bank') . '</td>' .
					// '<td><strong>' . 'feedback_website' . '</strong></td><td>' . $this->input->post('feedback_website') . '</td>' .
					// '<td><strong>' . 'employee ID' . '</strong></td><td>' . $this->input->post('tbl_emp_info_id') . '</td>' .
                    // '</tr>'  
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
    }
    
    


	public function add_scholarship_grant() {

        //echo '<pre>'; print_r($this->input->post()); exit;

        //echo 'in model'; exit();
		$result_date = date('Y-m-d', strtotime($this->input->post('result_date')));  
       
        if($this->input->post('pay_scale_id') > 15) {
            $gazette = '1';
        } else {
            $gazette = '0';
        }

        $application_no = $this->common_model->getApplicationNo();   
        $app_data = array(
            'tbl_grants_id' => '1',
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            'application_no' => $application_no,
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'tbl_banks_id' => $this->input->post('tbl_banks_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'gazette' => $gazette,
            'role_id' => $_SESSION['tbl_admin_role_id'],
            'added_by' => $_SESSION['admin_id'],
            'status' => '1'
        );
        $this->db->insert('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
        //$last_insert_id = $this->db->insert_id(); 

		$data = array( 
            'application_no' => $application_no,
            'parent_dept' => $this->input->post('tbl_department_id'),
            'duty_place' => $this->input->post('duty_place'),
            'std_name' => $this->input->post('std_name'),
            'class_pass' => $this->input->post('class_pass'),
            'exam_pass' => $this->input->post('exam_pass'),
            'result_date' => $this->input->post('result_date'),
            'mo' => $this->input->post('mo'),
            'tm' => $this->input->post('tm'),
            'percentage' => $this->input->post('percentage'),
            'institute_name' => $this->input->post('institute_name'),
            'institute_add' => $this->input->post('institute_add'),
            'grant_amount' => $this->input->post('grant_amount'),
            'deduction' => $this->input->post('deduction'),
            'net_amount' => $this->input->post('net_amount'),
            'tbl_case_status_id' => '1',
            'tbl_payment_mode_id' => $this->input->post('tbl_payment_mode_id'),
            'tbl_banks_id' => $this->input->post('tbl_banks_id'), 
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'std_signature' => $this->input->post('std_signature'),
            'gov_servent_sign' => $this->input->post('gov_servent_sign'),
            'seal_institute' => $this->input->post('seal_institute'),
            'head_institute' => $this->input->post('head_institute'),
            'office_seal_hod' => $this->input->post('office_seal_hod'),
            'hod_sign' => $this->input->post('hod_sign'),
            'bank_verification' => $this->input->post('bank_verification'),
            'payroll_lpc_attach' => $this->input->post('payroll_lpc_attach'),
            'dmc_attach' => $this->input->post('dmc_attach'),
            'cnic_attach' => $this->input->post('cnic_attach'),
            'grade_attach' => $this->input->post('grade_attach'),
            // 'boards_approval' => $this->input->post('boards_approval'),
            // 'sent_to_secretary' => $this->input->post('sent_to_secretary'),
            // 'approve_secretary' => $this->input->post('approve_secretary'), 
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'), 
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'gazette' => $gazette,
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data); 
		//insertion in db
		$this->db->insert($this->table, $data); 
        //$error = $this->db->error(); 
        //echo '<br>error = ' . $error;
        $last_insert_id = $this->db->insert_id();
        //echo '<br>insertID = '. $last_insert_id; exit;
        
		if ($this->db->affected_rows() > 0) {
			// this is for activity log of a record
            $getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
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
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Duty place' . '</strong></td><td>' . $this->input->post('duty_place') . '</td>' .
					'<td><strong>' . 'std name' . '</strong></td><td>' . $this->input->post('std_name') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Class pass' . '</strong></td><td>' . $this->input->post('class_pass') . '</td>' .
					'<td><strong>' . 'Exam pass' . '</strong></td><td>' . $this->input->post('exam_pass') . '</td>' .
					'<td><strong>' . 'Result date' . '</strong></td><td>' . $result_date . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marks Obtained' . '</strong></td><td>' . $this->input->post('mo') . '</td>' .
					'<td><strong>' . 'Total Marks' . '</strong></td><td>' . $this->input->post('tm') . '</td>' .
					'<td><strong>' . 'Percentage' . '</strong></td><td>' . $this->input->post('percentage') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Institute name' . '</strong></td><td>' . $this->input->post('institute_name') . '</td>' .
					'<td><strong>' . 'institute address' . '</strong></td><td>' . $this->input->post('institute_add') . '</td>' .
					'<td><strong>' . 'grant amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
					'</tr>' .
                    '<td><strong>' . 'deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
					'<td><strong>' . 'net amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'tbl_payment_mode_id' . '</strong></td><td>' . $this->input->post('tbl_payment_mode_id') . '</td>' .
					'<td><strong>' . 'tbl_list_bank_branches_id' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'std_signature' . '</strong></td><td>' . $this->input->post('std_signature') . '</td>' .
					'<td><strong>' . 'gov_servent_sign' . '</strong></td><td>' . $this->input->post('gov_servent_sign') . '</td>' .
					'<td><strong>' . 'seal_institute' . '</strong></td><td>' . $this->input->post('seal_institute') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'head_institute' . '</strong></td><td>' . $this->input->post('head_institute') . '</td>' .
					'<td><strong>' . 'office_seal_hod' . '</strong></td><td>' . $this->input->post('office_seal_hod') . '</td>' .
					'<td><strong>' . 'hod_sign' . '</strong></td><td>' . $this->input->post('hod_sign') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
					'<td><strong>' . 'payroll_lpc_attach' . '</strong></td><td>' . $this->input->post('payroll_lpc_attach') . '</td>' .
					'<td><strong>' . 'dmc_attach' . '</strong></td><td>' . $this->input->post('dmc_attach') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'cnic_attach' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
					'<td><strong>' . 'grade_attach' . '</strong></td><td>' . $this->input->post('grade_attach') . '</td>' .
					'<td><strong>' . 'boards_approval' . '</strong></td><td>' . $this->input->post('boards_approval') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'sent_to_secretary' . '</strong></td><td>' . $this->input->post('sent_to_secretary') . '</td>' .
					'<td><strong>' . 'approve_secretary' . '</strong></td><td>' . $this->input->post('approve_secretary') . '</td>' .
					'<td><strong>' . 'ac_edit' . '</strong></td><td>' . $this->input->post('ac_edit') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'sent_to_bank' . '</strong></td><td>' . $this->input->post('sent_to_bank') . '</td>' .
					'<td><strong>' . 'feedback_website' . '</strong></td><td>' . $this->input->post('feedback_website') . '</td>' .
					'<td><strong>' . 'employee ID' . '</strong></td><td>' . $this->input->post('tbl_emp_info_id') . '</td>' .
                    '</tr>'  
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
	}

	public function edit_scholarship_grant() {

        //echo '<pre>'; print_r($_POST); //exit();


		//$dob = date('Y-m-d', strtotime($this->input->post('dob')));

		//$result_date = date('Y-m-d', strtotime($this->input->post('result_date')));
 
        if($this->input->post('pay_scale_id') > 15) {
            $gazette = '1';
        } else {
            $gazette = '0';
        }

		$data = array( 
            'parent_dept' => $this->input->post('tbl_department_id'),
            'duty_place' => $this->input->post('duty_place'),
            'std_name' => $this->input->post('std_name'),
            'class_pass' => $this->input->post('class_pass'),
            'exam_pass' => $this->input->post('exam_pass'),
            'result_date' => $this->input->post('result_date'),
            'mo' => $this->input->post('mo'),
            'tm' => $this->input->post('tm'),
            'percentage' => $this->input->post('percentage'),
            'institute_name' => $this->input->post('institute_name'),
            'institute_add' => $this->input->post('institute_add'),
            'grant_amount' => $this->input->post('grant_amount'),
            'deduction' => $this->input->post('deduction'),
            'net_amount' => $this->input->post('net_amount'),
            'tbl_case_status_id' => $this->input->post('tbl_case_status_id'),
            'tbl_payment_mode_id' => $this->input->post('tbl_payment_mode_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'std_signature' => $this->input->post('std_signature'),
            'gov_servent_sign' => $this->input->post('gov_servent_sign'),
            'seal_institute' => $this->input->post('seal_institute'),
            'head_institute' => $this->input->post('head_institute'),
            'office_seal_hod' => $this->input->post('office_seal_hod'),
            'hod_sign' => $this->input->post('hod_sign'),
            'bank_verification' => $this->input->post('bank_verification'),
            'payroll_lpc_attach' => $this->input->post('payroll_lpc_attach'),
            'dmc_attach' => $this->input->post('dmc_attach'),
            'cnic_attach' => $this->input->post('cnic_attach'),
            'grade_attach' => $this->input->post('grade_attach'),
            'boards_approval' => $this->input->post('boards_approval'),
            'sent_to_secretary' => $this->input->post('sent_to_secretary'),
            'approve_secretary' => $this->input->post('approve_secretary'), 
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'), 
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'gazette' => $gazette,
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

            $get_class_pass = $this->common_model->getRecordByColoumn('tbl_scholarship_classes', 'id',  $this->input->post('class_pass'));
            $class_pass = $get_class_pass['class_name'];

            $get_class_pass = $this->common_model->getRecordByColoumn('tbl_scholarship_classes', 'id',  $this->input->post('class_pass'));
            $class_pass = $get_class_pass['class_name'];
            

			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($this->input->post('id')) //Entry table ID
				->action_type('update') //action type identify Action like add or update
				->detail(
					'<tr>' .
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Duty place' . '</strong></td><td>' . $this->input->post('duty_place') . '</td>' .
					'<td><strong>' . 'std name' . '</strong></td><td>' . $this->input->post('std_name') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Class pass' . '</strong></td><td>' . $class_pass . '</td>' .
					'<td><strong>' . 'Exam pass' . '</strong></td><td>' . $this->input->post('exam_pass') . '</td>' .
					'<td><strong>' . 'Result date' . '</strong></td><td>' . $this->input->post('result_date') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marks Obtained' . '</strong></td><td>' . $this->input->post('mo') . '</td>' .
					'<td><strong>' . 'Total Marks' . '</strong></td><td>' . $this->input->post('tm') . '</td>' .
					'<td><strong>' . 'Percentage' . '</strong></td><td>' . $this->input->post('percentage') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Institute name' . '</strong></td><td>' . $this->input->post('institute_name') . '</td>' .
					'<td><strong>' . 'institute address' . '</strong></td><td>' . $this->input->post('institute_add') . '</td>' .
					'<td><strong>' . 'grant amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
					'</tr>' .
                    '<td><strong>' . 'deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
					'<td><strong>' . 'net amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'tbl_payment_mode_id' . '</strong></td><td>' . $this->input->post('tbl_payment_mode_id') . '</td>' .
					'<td><strong>' . 'tbl_list_bank_branches_id' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'std_signature' . '</strong></td><td>' . $this->input->post('std_signature') . '</td>' .
					'<td><strong>' . 'gov_servent_sign' . '</strong></td><td>' . $this->input->post('gov_servent_sign') . '</td>' .
					'<td><strong>' . 'seal_institute' . '</strong></td><td>' . $this->input->post('seal_institute') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'head_institute' . '</strong></td><td>' . $this->input->post('head_institute') . '</td>' .
					'<td><strong>' . 'office_seal_hod' . '</strong></td><td>' . $this->input->post('office_seal_hod') . '</td>' .
					'<td><strong>' . 'hod_sign' . '</strong></td><td>' . $this->input->post('hod_sign') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
					'<td><strong>' . 'payroll_lpc_attach' . '</strong></td><td>' . $this->input->post('payroll_lpc_attach') . '</td>' .
					'<td><strong>' . 'dmc_attach' . '</strong></td><td>' . $this->input->post('dmc_attach') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'cnic_attach' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
					'<td><strong>' . 'grade_attach' . '</strong></td><td>' . $this->input->post('grade_attach') . '</td>' .
					'<td><strong>' . 'boards_approval' . '</strong></td><td>' . $this->input->post('boards_approval') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'sent_to_secretary' . '</strong></td><td>' . $this->input->post('sent_to_secretary') . '</td>' .
					'<td><strong>' . 'approve_secretary' . '</strong></td><td>' . $this->input->post('approve_secretary') . '</td>' .
					'<td><strong>' . 'ac_edit' . '</strong></td><td>' . $this->input->post('ac_edit') . '</td>' .
                    '</tr>' .
                    '<td><strong>' . 'sent_to_bank' . '</strong></td><td>' . $this->input->post('sent_to_bank') . '</td>' .
					'<td><strong>' . 'feedback_website' . '</strong></td><td>' . $this->input->post('feedback_website') . '</td>' .
					'<td><strong>' . 'employee ID' . '</strong></td><td>' . $this->input->post('tbl_emp_info_id') . '</td>' .
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
    
    public function getAmountData($id) {
		$this->db->from('tbl_scholarship_classes');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
    }
    

    function update_application_status() {
        
        //echo '<pre>'; print_r($this->input->post()); exit();
        $apps = $this->input->post('application_no');
        $action = $this->input->post('btnSubmit'); 
        $get_status = $this->common_model->getRecordByColoumn('tbl_case_status', 'name',  $action);
        $status = $get_status['id'];

        if(count($apps) > 0) {
            foreach ($apps as $key => $application_no) {
                $gerund_status = array( 'status' => $status );
                $self_tbl_status = array( 'tbl_case_status_id' => $status );
                //XSS prevention
                $gerund_status = $this->security->xss_clean($gerund_status);
                $self_tbl_status = $this->security->xss_clean($self_tbl_status);
                //updation in db
                $this->db->where('application_no', $application_no); 
                $result = $this->db->update('tbl_grants_has_tbl_emp_info_gerund', $gerund_status);
                
                if ($this->db->affected_rows() > 0) {
                    $this->db->where('application_no', $application_no); 
                    $result = $this->db->update('tbl_scholaarship_grant', $self_tbl_status); 
                }

                $get_status = $this->common_model->getRecordByColoumn('tbl_scholaarship_grant', 'application_no',  $application_no);
                $id = $get_status['id'];

                /* Notifications */
                
                // if($action == 'Approved By Board') {
                //     //id			tbl_grants_id	application_no	record_add_by	record_add_date	status_view	record_url
                //     $app_data = array(
                //         'from_user' => '1',
                //         'to_user' => $this->input->post('tbl_emp_info_id'),
                //         'application_no' => $application_no,
                //         'tbl_district_id' => $this->input->post('tbl_district_id'),
                //         'tbl_banks_id' => $this->input->post('tbl_banks_id'),
                //         'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
                //         'gazette' => $gazette,
                //         'role_id' => $_SESSION['tbl_admin_role_id'],
                //         'added_by' => $_SESSION['admin_id'],
                //         'status' => '1'
                //     );
                //     $this->db->insert('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
                // }

                $this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($id) //Entry table ID
				->action_type('update') //action type identify Action like add or update
				->detail( 
					'<tr>' .
					'<td><strong>' . 'Status' . '</strong></td><td>' . $action . '</td>'  .
					'</tr>'  
				) //detail
				->log(); //Add Database Entry

            } 

            return true;

        } else {
            return false;
        }
        
        
        
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
        //echo $this->db->last_query();
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