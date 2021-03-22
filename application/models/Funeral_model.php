<?php
class Funeral_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_funeral_grant';
		// Set orderable column fields
		$this->column_order = array(null, 'record_no');
		// Set searchable column fields
		$this->column_search = array('record_no');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp////////
	}

    public function getAmountData() {
         
        //$dateOfRetirement = base64_decode($date);
        $dateOfRetirement =  $this->input->post('dor');
        $payScaleID =  $this->input->post('empScaleID');
        //$array = array('status'=>'error', 'dateOfRetirement'=>$dateOfRetirement, 'payScaleID'=>$payScaleID);
        //return $array;

        if($payScaleID == '')
        {
            $array = array('status'=>'error', 'msg'=>'Please select employee to continue');
            return $array;
        } else {

            if(strtotime($dateOfRetirement) <= strtotime('2017-12-19')) {
                //return 'less';
                $this->db->from('tbl_grant_payments'); 
                $this->db->where('from_date <=', $dateOfRetirement);
                $this->db->where('to_date >=', $dateOfRetirement);
                $this->db->where('tbl_pay_scale_id', $payScaleID);
                $this->db->where('tbl_grants_id', "2");
                $this->db->where('status', "1");
            } else if(strtotime($dateOfRetirement) >= strtotime('2017-12-20')) {
                //return 'great';
                $this->db->from('tbl_grant_payments'); 
                $this->db->where('from_date >=', '2017-12-20');
                //$this->db->where('to_date >=', $dateOfRetirement);
                $this->db->where('tbl_pay_scale_id',$payScaleID);
                $this->db->where('tbl_grants_id', "2");
                $this->db->where('status', "1");
            }
            
    
            $query = $this->db->get();
            $rows = $query->row();

            $array = array('status'=>'success', 'data'=> $rows);
            return $array;

        }
 
 
    }

	public function add_funeral_grant() {

        //echo 'in model'; exit();
        $doa = date('Y-m-d', strtotime($this->input->post('doa')));
        $dor = date('Y-m-d', strtotime($this->input->post('dor')));
        $dept_letter_no_date = date('Y-m-d', strtotime($this->input->post('dept_letter_no_date')));
        $dependent_death_date = date('Y-m-d', strtotime($this->input->post('dependent_death_date')));

        if($this->input->post('pay_scale_id') > 15) {
            $gazette = '1';
        } else {
            $gazette = '0';
        }

        $application_no = $this->common_model->getApplicationNo();   
        $app_data = array(
            'tbl_grants_id' => '2',
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'), 
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'tbl_banks_id' => $this->input->post('bank_type_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'gazette' => $gazette,
            'role_id' => $_SESSION['tbl_admin_role_id'],
            'added_by' => $_SESSION['admin_id'],
            'application_no' => $application_no,
            'status' => '1'
        );
        $this->db->insert('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
        $last_insert_id = $this->db->insert_id(); 

		$data = array(  
            'application_no' =>$application_no,
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            'tbl_district_id' => $this->input->post('tbl_district_id'),  
            'gazette' => $gazette,
            'record_no' => $this->input->post('record_no'),
            'record_no_year' => $this->input->post('record_no_year'),
            'name_deceased' => $this->input->post('name_deceased'),
            'dependent_death_date' => $dependent_death_date,
            'doa' => $doa,
            'dor' => $dor,
            'los' => $this->input->post('los'),
            'dept_letter_no' => $this->input->post('dept_letter_no'),
            'dept_letter_no_date' => $dept_letter_no_date,
            'grant_amount' => $this->input->post('grant_amount'),
            'deduction' => $this->input->post('deduction'),
            'net_amount' => $this->input->post('net_amount'),
            'tbl_case_status_id' => '1',
            'tbl_payment_mode_id' => $this->input->post('tbl_payment_mode_id'),
            'tbl_banks_id' => $this->input->post('bank_type_id'), 
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
             
            'account_no' => $this->input->post('account_no'),
            'bank_verification' => $this->input->post('bank_verification'),
            'sign_of_applicant' => $this->input->post('sign_of_applicant'),
            's_n_office_dept_seal' => $this->input->post('s_n_office_dept_seal'),
            's_n_dept_admin_seal' => $this->input->post('s_n_dept_admin_seal'),
            'payroll_attach' => $this->input->post('payroll_attach'),
            'dc_attach' => $this->input->post('dc_attach'), 
            'bf_contribution_attach' => $this->input->post('bf_contribution_attach'), 
            'cnic_attach' => $this->input->post('cnic_attach'), 
            //'boards_approval' => $this->input->post('boards_approval'),
            //'ac_edit' => $this->input->post('ac_edit'),
            //'sent_to_secretary' => $this->input->post('sent_to_secretary'),
            //'approve_secretary' => $this->input->post('approve_secretary'),
            
            //'sent_to_bank' => $this->input->post('sent_to_bank'),
            //'feedback_website' => $this->input->post('feedback_website'), 
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
        );
        
        //echo '<pre>'; print_r($data); exit;
		//XSS prevention
		$data = $this->security->xss_clean($data); 
		//insertion in db
		$this->db->insert($this->table, $data); 
        //$error = $this->db->error(); 
        //echo '<pre>'; print_r($error);
        $last_insert_id = $this->db->insert_id();
        //echo '<br>insertnID = '. $last_insert_id; exit;
        
		if ($this->db->affected_rows() > 0) {
			
            
            
            //send sms 
            $emp_info   = $this->emp_info_model->getRecordById($this->input->post('tbl_emp_info_id'));
            $contact_no = $emp_info->contact_no; 
            // $smsContent = $application_no . ' app ka application no hai aur ap ne funeral grant k lye apply kiya hai.';
            // $smsArray   = array('applicantMobNo' => $contact_no, 'smsContent' => $smsContent);
            // $send       = $this->common_model->sendSMS($smsArray);


            $smsContent = 'آپ کا درخواست نمبر '.$application_no.' ہے۔';
            $smsContent .= 'آ پ  کے  بی  ایف  سی   فا رم  بما ئے  لف  کا  غذات  مو صول  ہو گئے  ہے۔ اب  ان  کی  چھا ن  بین کر کے      
            پر ا سیس کیا  جا  ئے  گا';
            $smsArray   = array('applicantMobNo' => $contact_no, 'smsContent' => $smsContent);
            $send       = $this->common_model->sendSMS($smsArray);

            
            // this is for activity log of a record
            
            $getEmp = $this->common_model->getRecordById($this->input->post('tbl_emp_info_id'), $tbl_name = 'tbl_emp_info');
            $granteeName = $getEmp['grantee_name'];
            $pay_scale = $getEmp['pay_scale'];
            $department_id = $getEmp['tbl_department_id'];
            $emp_post_id = $getEmp['tbl_post_id'];
            $getDept = $this->common_model->getRecordById($department_id, $tbl_name = 'tbl_department');
            $departmentName = $getDept['name'];
            $getPost = $this->common_model->getRecordById($emp_post_id, $tbl_name = 'tbl_post');
            $postName = $getPost['name'];
            
            $getStatus = $this->common_model->getRecordById($this->input->post('tbl_case_status_id'), $tbl_name = 'tbl_case_status');
            $statusName = $getStatus['name'];
            $getPaymentMode = $this->common_model->getRecordById($this->input->post('tbl_payment_mode_id'), $tbl_name = 'tbl_payment_mode');
            $paymentMode = $getPaymentMode['name'];
            $getBankBranch = $this->common_model->getRecordById($this->input->post('tbl_list_bank_branches_id'), $tbl_name = 'tbl_list_bank_branches');
            $branch_name = $getBankBranch['branch_name'];
            $branch_code = $getBankBranch['branch_code'];
            $bankBranch = $branch_name.' '.$branch_code;

            $this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($last_insert_id) //Entry table ID
				->action_type('add') //action type identify Action like add or update
				->detail(
                    '<tr>' .
                        '<td><strong>' . 'Name of Government Servant' . '</strong></td><td>' . $granteeName . '</td>' .
                        '<td>Pay Scale</td><td>'.$pay_scale.'</td>' .
                        '<td>Department / Post</td><td>'.$departmentName.'/ '.$postName.'</td>' .
					'</tr>' .
					'<tr>' .
                        '<td><strong>' . 'Record No' . '</strong></td><td>' . $this->input->post('record_no') . '</td>' .
                        '<td><strong>' . 'Record No Year' . '</strong></td><td>' . $this->input->post('record_no_year') . '</td>' .
                        '<td> </td><td> </td>' .
                    '</tr>' .
                    '<tr>' .
                        '<td><strong>' . 'Name of Deceased' . '</strong></td><td>' . $this->input->post('name_deceased') . '</td>' .
                        '<td><strong>' . 'Dependent Death Date' . '</strong></td><td>' . $this->input->post('dependent_death_date') . '</td>' .
                        '<td> </td><td> </td>' .
					'</tr>' .
					'<tr>' .
                        '<td><strong>' . 'Date of Appointment ' . '</strong></td><td>' . $doa . '</td>' .
                        '<td><strong>' . 'Date Of Death' . '</strong></td><td>' . $dor . '</td>' .
                        '<td><strong>' . 'Length of Service' . '</strong></td><td>' . $this->input->post('los') . '</td>' . 
					'</tr>' .
					'<tr>' .
                        '<td><strong>' . 'Department Letter No' . '</strong></td><td>' . $this->input->post('dept_letter_no') . '</td>' .
                        '<td><strong>' . 'Department Letter No Date' . '</strong></td><td>' . $dept_letter_no_date . '</td>' .
                        '<td> </td><td> </td>' .
					'</tr>' .
					'<tr>' .
                        '<td><strong>' . 'Grant Amount' . '</strong></td><td>Rs. ' . $this->input->post('grant_amount') . '</td>' .
                        '<td><strong>' . 'Deduction' . '</strong></td><td>Rs. ' . $this->input->post('deduction') . '</td>' .
                        '<td><strong>' . 'Net Amount' . '</strong></td><td>Rs. ' . $this->input->post('net_amount') . '</td>' .
					'</tr>' .
                    '<tr>' . 
                        '<td><strong>' . 'Payment Mode' . '</strong></td><td>' . $paymentMode . '</td>' .
                        '<td><strong>' . 'Bank Details' . '</strong></td><td>' . $bankBranch . '</td>' .
                        '<td><strong>' . 'Account No' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
					'</tr>' . 
                    '<tr>' .
                        '<td><strong>' . 'Case Status' . '</strong></td><td>' . $statusName . '</td>' .
                        '<td><strong>' . 'Bank Verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
                        '<td><strong>' . 'Signature of Applicant' . '</strong></td><td>' . $this->input->post('sign_of_applicant') . '</td>' .
					'</tr>' .
                    '<tr>' .
                        '<td><strong>' . 'Signature & Name of the<br> Head of Office<br> with Official Seal' . '</strong></td><td>' . $this->input->post('s_n_office_dept_seal') . '</td>' .
                        '<td><strong>' . 'Signature & Name of the<br> Head of Department<br> with Official Seal' . '</strong></td><td>' . $this->input->post('s_n_dept_admin_seal') . '</td>' .
                        '<td><strong>' . 'Pay Roll / LPC' . '</strong></td><td>' . $this->input->post('payroll_attach') . '</td>' .
					'<tr>' .
                        '<td><strong>' . 'B/F Contribution Certificate' . '</strong></td><td>' . $this->input->post('bf_contribution_attach') . '</td>' .
                        '<td><strong>' . 'CNIC of Govt: Servant' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
                        '<td><strong>' . 'Death Certificate Attach' . '</strong></td><td>' . $this->input->post('dc_attach') . '</td>' .
                    '</tr>'  .
                    '<tr>' .
                        '<td><strong>' . 'SMS SEND' . '</strong></td><td>' . $send . '</td>' .
                        '<td><strong>' . 'SMS Content' . '</strong></td><td colspan="3">' . $smsContent . '</td>' . 
                    '</tr>' 
                     
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
	}

    
    public function edit_funeral_grant() {
 
        $doa = date('Y-m-d', strtotime($this->input->post('doa')));
        $dor = date('Y-m-d', strtotime($this->input->post('dor')));
        $dept_letter_no_date = date('Y-m-d', strtotime($this->input->post('dept_letter_no_date')));
        $dependent_death_date = date('Y-m-d', strtotime($this->input->post('dependent_death_date')));

        if($this->input->post('pay_scale_id') > 15) {
            $gazette = '1';
        } else {
            $gazette = '0';
        }
 
        $app_data = array(  
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'), 
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'tbl_banks_id' => $this->input->post('bank_type_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'gazette' => $gazette 
        );
        
        $this->db->where('application_no', $this->input->post('app_no'));
        $result = $this->db->update('tbl_grants_has_tbl_emp_info_gerund', $app_data); 

        if($result == true)
        { 

            $data = array( 
                'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
                'record_no' => $this->input->post('record_no'),
                'record_no_year' => $this->input->post('record_no_year'),
                'name_deceased' => $this->input->post('name_deceased'),
                'dependent_death_date' => $dependent_death_date,
                'doa' => $doa,
                'dor' => $dor,
                'los' => $this->input->post('los'),
                'dept_letter_no' => $this->input->post('dept_letter_no'),
                'dept_letter_no_date' => $dept_letter_no_date,
                'grant_amount' => $this->input->post('grant_amount'),
                'deduction' => $this->input->post('deduction'),
                'net_amount' => $this->input->post('net_amount'),
                // 'tbl_case_status_id' => $this->input->post('tbl_case_status_id'),
                'tbl_payment_mode_id' => $this->input->post('tbl_payment_mode_id'),
                'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'), 
                'account_no' => $this->input->post('account_no'),
                'bank_verification' => $this->input->post('bank_verification'),
                'sign_of_applicant' => $this->input->post('sign_of_applicant'),
                's_n_office_dept_seal' => $this->input->post('s_n_office_dept_seal'),
                's_n_dept_admin_seal' => $this->input->post('s_n_dept_admin_seal'),
                'payroll_attach' => $this->input->post('payroll_attach'),
                'dc_attach' => $this->input->post('dc_attach'), 
                'bf_contribution_attach' => $this->input->post('bf_contribution_attach'), 
                'cnic_attach' => $this->input->post('cnic_attach'),  
                //'ac_edit' => $this->input->post('ac_edit'),
                //'sent_to_secretary' => $this->input->post('sent_to_secretary'),
                //'approve_secretary' => $this->input->post('approve_secretary'), 
                //'sent_to_bank' => $this->input->post('sent_to_bank'),
                //'feedback_website' => $this->input->post('feedback_website'),   
                'record_add_by' => $_SESSION['admin_id'],
                'record_add_date' => date('Y-m-d H:i:s'),
            );
            
            //echo '<pre>'; print_r($data); exit();

            //XSS prevention
            $data = $this->security->xss_clean($data);

            $this->db->where('id', $this->input->post('id'));
            $result = $this->db->update($this->table, $data);

            if ($result == true) {  

                $getEmp = $this->common_model->getRecordById($this->input->post('tbl_emp_info_id'), $tbl_name = 'tbl_emp_info');
                $granteeName = $getEmp['grantee_name'];
                $pay_scale = $getEmp['pay_scale'];
                $department_id = $getEmp['tbl_department_id'];
                $emp_post_id = $getEmp['tbl_post_id'];
                $getDept = $this->common_model->getRecordById($department_id, $tbl_name = 'tbl_department');
                $departmentName = $getDept['name'];
                $getPost = $this->common_model->getRecordById($emp_post_id, $tbl_name = 'tbl_post');
                $postName = $getPost['name'];
                
                $getStatus = $this->common_model->getRecordById($this->input->post('tbl_case_status_id'), $tbl_name = 'tbl_case_status');
                $statusName = $getStatus['name'];
                $getPaymentMode = $this->common_model->getRecordById($this->input->post('tbl_payment_mode_id'), $tbl_name = 'tbl_payment_mode');
                $paymentMode = $getPaymentMode['name'];
                $getBankBranch = $this->common_model->getRecordById($this->input->post('tbl_list_bank_branches_id'), $tbl_name = 'tbl_list_bank_branches');
                $branch_name = $getBankBranch['branch_name'];
                $branch_code = $getBankBranch['branch_code'];
                $bankBranch = $branch_name.' '.$branch_code;

                $this->logger
                    ->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
                    ->tbl_name($this->table) //Entry table name
                    ->tbl_name_id($this->input->post('id')) //Entry table ID
                    ->action_type('update') //action type identify Action like add or update
                    ->detail(
                        '<tr>' .
                            '<td><strong>' . 'Name of Government Servant' . '</strong></td><td>' . $granteeName . '</td>' .
                            '<td>Pay Scale</td><td>'.$pay_scale.'</td>' .
                            '<td>Department / Post</td><td>'.$departmentName.'/ '.$postName.'</td>' .
                        '</tr>' .
                        '<tr>' .
                            '<td><strong>' . 'Record No' . '</strong></td><td>' . $this->input->post('record_no') . '</td>' .
                            '<td><strong>' . 'Record No Year' . '</strong></td><td>' . $this->input->post('record_no_year') . '</td>' .
                            '<td> </td><td> </td>' .
                        '</tr>' .
                        '<tr>' .
                            '<td><strong>' . 'Name of Deceased' . '</strong></td><td>' . $this->input->post('name_deceased') . '</td>' .
                            '<td><strong>' . 'Dependent Death Date' . '</strong></td><td>' . $this->input->post('dependent_death_date') . '</td>' .
                            '<td> </td><td> </td>' .
                        '</tr>' .
                        '<tr>' .
                            '<td><strong>' . 'Date of Appointment ' . '</strong></td><td>' . $doa . '</td>' .
                            '<td><strong>' . 'Date Of Death' . '</strong></td><td>' . $dor . '</td>' .
                            '<td><strong>' . 'Length of Service' . '</strong></td><td>' . $this->input->post('los') . '</td>' . 
                        '</tr>' .
                        '<tr>' .
                            '<td><strong>' . 'Department Letter No' . '</strong></td><td>' . $this->input->post('dept_letter_no') . '</td>' .
                            '<td><strong>' . 'Department Letter No Date' . '</strong></td><td>' . $dept_letter_no_date . '</td>' .
                            '<td> </td><td> </td>' .
                        '</tr>' .
                        '<tr>' .
                            '<td><strong>' . 'Grant Amount' . '</strong></td><td>Rs. ' . $this->input->post('grant_amount') . '</td>' .
                            '<td><strong>' . 'Deduction' . '</strong></td><td>Rs. ' . $this->input->post('deduction') . '</td>' .
                            '<td><strong>' . 'Net Amount' . '</strong></td><td>Rs. ' . $this->input->post('net_amount') . '</td>' .
                        '</tr>' .
                        '<tr>' . 
                            '<td><strong>' . 'Payment Mode' . '</strong></td><td>' . $paymentMode . '</td>' .
                            '<td><strong>' . 'Bank Details' . '</strong></td><td>' . $bankBranch . '</td>' .
                            '<td><strong>' . 'Account No' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                        '</tr>' . 
                        '<tr>' .
                            '<td><strong>' . 'Case Status' . '</strong></td><td>' . $statusName . '</td>' .
                            '<td><strong>' . 'Bank Verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
                            '<td><strong>' . 'Signature of Applicant' . '</strong></td><td>' . $this->input->post('sign_of_applicant') . '</td>' .
                        '</tr>' .
                        '<tr>' .
                            '<td><strong>' . 'Signature & Name of the<br> Head of Office<br> with Official Seal' . '</strong></td><td>' . $this->input->post('s_n_office_dept_seal') . '</td>' .
                            '<td><strong>' . 'Signature & Name of the<br> Head of Department<br> with Official Seal' . '</strong></td><td>' . $this->input->post('s_n_dept_admin_seal') . '</td>' .
                            '<td><strong>' . 'Pay Roll / LPC' . '</strong></td><td>' . $this->input->post('payroll_attach') . '</td>' .
                        '<tr>' .
                            '<td><strong>' . 'B/F Contribution Certificate' . '</strong></td><td>' . $this->input->post('bf_contribution_attach') . '</td>' .
                            '<td><strong>' . 'CNIC of Govt: Servant' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
                            '<td><strong>' . 'Death Certificate Attach' . '</strong></td><td>' . $this->input->post('dc_attach') . '</td>' .
                        '</tr>'  
                    ) //detail
                    ->log(); //Add Database Entry

                return true;
            } else {
                return false;
            }
        }
        else {
            return false;
        }
	}


    function update_application_status() {
        
        //echo '<pre>'; print_r($this->input->post()); exit();
        $apps = $this->input->post('application_no');
        $action = $this->input->post('btnSubmit'); 
        $get_status = $this->common_model->getRecordByColoumn('tbl_case_status', 'name',  $action);
        $status = $get_status['id'];
        //echo 'id = '. $status; exit;

        if(count($apps) > 0) {
            foreach ($apps as $key => $application_no) {
                //echo '<br>app = '. $application_no; 
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
                    $result = $this->db->update('tbl_funeral_grant', $self_tbl_status); 
                }

                $get_status = $this->common_model->getRecordByColoumn('tbl_funeral_grant', 'application_no',  $application_no);
                $id = $get_status['id'];
                //echo '<br>id = '. $id;  

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
	

	/*
		     * Count all records
	*/
	public function countAll() {
        $this->db->from($this->table . ' as f');
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


    // New...

    // private function _get_datatables_query($term=''){ //term is value of $_REQUEST['search']['value']
    //     $column = array('emp.id','emp.grantee_name', 'emp.cnic_no');
    //     $this->db->select('f.id, f.application_no, f.name_deceased');
    //     $this->db->from('tbl_emp_info as emp');
    //     $this->db->join('tbl_funeral_grant as f', 'emp.id = f.tbl_emp_info_id','left');
    //     $this->db->like('emp.grantee_name', $term);
    //     $this->db->or_like('f.name_deceased', $term);
    //     $this->db->or_like('emp.cnic_no', $term);
    //     if(isset($_REQUEST['order'])) // here order processing
    //     {
    //        $this->db->order_by($column[$_REQUEST['order']['0']['column']], $_REQUEST['order']['0']['dir']);
    //     } 
    //     else if(isset($this->order))
    //     {
    //        $order = $this->order;
    //        $this->db->order_by(key($order), $order[key($order)]);
    //     }
    //     echo '<br>query7 = ' . $this->db->last_query();
    // }
    
    // function get_datatables(){
    //   $term = $_REQUEST['search']['value'];   
    //   $this->_get_datatables_query($term);
    //   //echo 'query3 = ' . $this->db->last_query();
    //   if($_REQUEST['length'] != -1)
    //   $this->db->limit($_REQUEST['length'], $_REQUEST['start']);
    //   $query = $this->db->get();
    //   //echo 'query = ' . $this->db->last_query();
    //   return $query->result(); 
    // }
    
    // function count_filtered(){
    //   $term = $_REQUEST['search']['value']; 
    //   $this->_get_datatables_query($term);
    //   $query = $this->db->get();
    //   return $query->num_rows();  
    // }
    
    // public function count_all(){
    //   $this->db->from($this->table);
    //   return $this->db->count_all_results();  
    // }

 

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
		     * Perform the SQL queries needed for an server-side processing requested
		     * @param $_POST filter data based on the posted parameters
	*/
	private function _get_datatables_query($postData) {

		$this->db->from($this->table);
        //echo '<pre>'; print_r($this->column_search);
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