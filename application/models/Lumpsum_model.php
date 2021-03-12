<?php
class Lumpsum_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_lump_sum_grant';
		// Set orderable column fields
		$this->column_order = array(null, 'record_no');
		// Set searchable column fields
		$this->column_search = array('record_no', 'tbl_emp_name', 'application_no', 'tbl_emp_cnic', 'tbl_emp_personnel_no');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp////////
	}

	 
    public function getAmountData() {
        
        $dateOfRetirement = $this->input->post('dor');
        $empScaleID = $this->input->post('empScaleID'); 
        //echo 'dor = ' . $dateOfRetirement;
        if(strtotime($dateOfRetirement) <= strtotime('2017-07-01')) {
            //echo 'less'; 
            $this->db->from('tbl_grant_payments'); 
            $this->db->where('from_date <=', '2017-07-01'); 
            $this->db->where('tbl_pay_scale_id', $empScaleID);
            $this->db->where('tbl_grants_id', "6");
            $this->db->where('status', "1");
        } else if(strtotime($dateOfRetirement) >= strtotime('2017-07-01')) {
            //echo 'great';
            $this->db->from('tbl_grant_payments'); 
            $this->db->where('from_date >=', '2017-07-01'); 
            $this->db->where('tbl_pay_scale_id', $empScaleID);
            $this->db->where('tbl_grants_id', "6");
            $this->db->where('status', "1");
        } else {
            return null;
        } 

        $query = $this->db->get();
        return $query->row(); 
 
    }


	public function add_lumpsum_grant() {

        //echo 'in model'; exit();
        $doa = date('Y-m-d', strtotime($this->input->post('doa')));
        $dor = date('Y-m-d', strtotime($this->input->post('dor')));
        $dept_letter_no_date = date('Y-m-d', strtotime($this->input->post('dept_letter_no_date')));
        
        if($this->input->post('pay_scale_id') > 15) {
            $gazette = '1';
        } else {
            $gazette = '0';
        }

        $application_no = $this->common_model->getApplicationNo();   
        $app_data = array(
            'tbl_grants_id' => '6',
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            'application_no' => $application_no,
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'tbl_banks_id' => $this->input->post('bank_type_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'gazette' => $gazette,
            'role_id' => $_SESSION['tbl_admin_role_id'],
            'added_by' => $_SESSION['admin_id'],
            'status' => '1'
        );
        $this->db->insert('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
        $last_insert_id = $this->db->insert_id(); 
  
        //'pay_scale' => BS-16
        //'pay_scale_id' => 16

         

         
        //get emp info   
        $getEmp = $this->common_model->getRecordById($this->input->post('tbl_emp_info_id'), $tbl_name = 'tbl_emp_info');
        $granteeName = $getEmp['grantee_name'];
        $pay_scale = $getEmp['pay_scale'];
        $department_id = $getEmp['tbl_department_id'];
        $emp_post_id = $getEmp['tbl_post_id'];
        $contact_no = $getEmp['contact_no'];
        $tbl_emp_cnic = $getEmp['cnic_no'];
        $tbl_emp_personnel_no = $getEmp['personnel_no'];

        
        $data = array(
            'application_no' => $application_no,
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'), 
            'tbl_emp_name' => $granteeName, 
            'tbl_emp_cnic' => $tbl_emp_cnic, 
            'tbl_emp_personnel_no' => $tbl_emp_personnel_no,  
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'wife' => $this->input->post('wife'),
            'son' => $this->input->post('son'),
            'daughter' => $this->input->post('daughter'),
            'tbl_grantee_type_id' => $this->input->post('tbl_grantee_type_id'),
            'grantee_name' => $this->input->post('grantee_name'),
            'cnic_grantee' => $this->input->post('cnic_grantee'),
            'grantee_contact_no' => $this->input->post('grantee_contact_no'),
            'record_no' => $this->input->post('record_no'),
            'record_no_year' => $this->input->post('record_no_year'), 
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
            'cnic_attach' => $this->input->post('cnic_attach'), 
            'cnic_widow_attach' => $this->input->post('cnic_widow_attach'), 
            'dc_attach' => $this->input->post('dc_attach'), 
            'family_attach' => $this->input->post('family_attach'),  
            'payroll_lpc_attach' => $this->input->post('payroll_lpc_attach'), 
            'dob_ac_attach' => $this->input->post('dob_ac_attach'),  
            'single_widow_attach' => $this->input->post('single_widow_attach'), 
            'no_marriage_attach' => $this->input->post('no_marriage_attach'), 
            'disc_attach' => $this->input->post('disc_attach'), 
            'undertaking' => $this->input->post('undertaking'), 
            'gazette' => $gazette,  
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
        //echo '<br>insertID = '. $last_insert_id; exit;
        
		if ($last_insert_id > 0) {
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
            $getGranteeType = $this->common_model->getRecordById($this->input->post('tbl_grantee_type_id'), $tbl_name = 'tbl_grantee_type');
            $ganteeType = $getGranteeType['name'];
            $getPaymentMode = $this->common_model->getRecordById($this->input->post('tbl_payment_mode_id'), $tbl_name = 'tbl_payment_mode');
            $paymentMode = $getPaymentMode['name'];
            $getBankBranch = $this->common_model->getRecordById($this->input->post('tbl_list_bank_branches_id'), $tbl_name = 'tbl_list_bank_branches');
            $branch_name = $getBankBranch['branch_name'];
            $branch_code = $getBankBranch['branch_code'];
            $bankBranch = $branch_name.' '.$branch_code;


            $smsContent = 'آپ کا درخواست نمبر '.$application_no.' ہے۔';
            $smsContent .= 'آ پ  کے  بی  ایف  سی   فا رم  بما ئے  لف  کا  غذات  مو صول  ہو گئے  ہے۔ اب  ان  کی  چھا ن  بین کر کے      
            پر ا سیس کیا  جا  ئے  گا';
            $smsArray   = array('applicantMobNo' => $contact_no, 'smsContent' => $smsContent);
            $send       = $this->common_model->sendSMS($smsArray);


            if($this->input->post('bank_verification')=='No')
            {
                $smsContent = 'آپ کے کا غذات میں بینک سے تصد یق شد ہ اکا و نٹ کی تفصیل مو جو د نہیں ہے ۔ آ پ یہ کا پی اِس دفتر جلد ازجلد بھیج دیں یا لے آئیں تاکہ آپ کا کیس آگے بھیج سکے';
                $smsArray   = array('applicantMobNo' => $contact_no, 'smsContent' => $smsContent);
                $send       = $this->common_model->sendSMS($smsArray);
            }


            // $smsContent = 'app ka application number '.$application_no.' hai, app k BFC form bama lif kaghazat mosol ho gaye hain, ab un ki chaan been kar k process kiya jayega.';
            // $smsArray   = array('applicantMobNo' => $contact_no, 'smsContent' => $smsContent);
            // $send       = $this->common_model->sendSMS($smsArray);


            $this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($last_insert_id) //Entry table ID
				->action_type('add') //action type identify Action like add or update
				->detail(
                    '<tr>' .
                    '<td><strong>' . 'Application Number' . '</strong></td>
                     <td colspan="5"><strong>' . $application_no . '</strong></td>' .
                    '</tr>' . 

                    '<tr>' .
					'<td><strong>' . 'Name Of Government Servant:' . '</strong></td><td>' . $granteeName . '</td>' .
					'<td>Pay Scale</td><td>'.$pay_scale.'</td>' .
                    '<td>Department / Post</td><td>'.$departmentName.'/ '.$postName.'</td>' .
					'</tr>' .
                    
                    '<tr>' . 
					'<td><strong>' . 'Wife' . '</strong></td><td>' . $this->input->post('wife') . '</td>' .
					'<td><strong>' . 'Son' . '</strong></td><td>' . $this->input->post('son') . '</td>' .
                    '<td><strong>' . 'Daughter' . '</strong></td><td>' . $this->input->post('daughter') . '</td>' .
                    '</tr>' .

                    '<tr>' . 
					'<td><strong>' . 'Grantee Type' . '</strong></td><td>' . $ganteeType . '</td>' .
					'<td><strong>' . 'Name Of Widow / Grantee / Applicant' .  '</strong></td><td>'.$this->input->post('grantee_name').'</td>' .
                    '<td><strong>' . 'CNIC No. Of Widow / Grantee' .  '</strong></td><td>'.$this->input->post('cnic_grantee').'</td>' .
                    '</tr>' .

                    '<tr>' .
                    '<td><strong>' . 'Grantee Contact Number' .  '</strong></td><td>'.$this->input->post('grantee_contact_no').'</td>' .
					'<td><strong>' . 'Record no' . '</strong></td><td>' . $this->input->post('record_no') . '</td>' .
					'<td><strong>' . 'Record no year' . '</strong></td><td>' . $this->input->post('record_no_year') . '</td>' .
					'</tr>' . 

					'<tr>' .
                    '<td><strong>' . 'Date of Appointment ' . '</strong></td><td>' . $doa . '</td>' .
					'<td><strong>' . 'Date of Retirement' . '</strong></td><td>' . $dor . '</td>' .
					'<td><strong>' . 'Length Of Service' . '</strong></td><td>' . $this->input->post('los') . '</td>' .
					'</tr>' .

					'<tr>' .
                    '<td><strong>' . 'Dept letter no' . '</strong></td><td>' . $this->input->post('dept_letter_no') . '</td>' .
					'<td><strong>' . 'Dept letter no date' . '</strong></td><td colspan="3">' . $dept_letter_no_date . '</td>' .
					
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'Grant amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
					'<td><strong>' . 'Deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
                    '<td><strong>' . 'Net amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'</tr>' .

					'<tr>' . 
					'<td><strong>' . 'Case Status' . '</strong></td><td>' . $statusName . '</td>' .
					'<td><strong>' . 'Payment Mode' . '</strong></td><td>' . $paymentMode . '</td>' .
                    '<td><strong>' . 'Bank & Branch' . '</strong></td><td>' . $bankBranch . '</td>' .
                    '</tr>' .
                    '<tr>' . 
					'<td><strong>' . 'Account no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
					'<td><strong>' . 'Bank Verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
                    '<td><strong>' . '' . '</strong></td><td>' .''.  '</td>' . 
                    '</tr>' . 
                    '<tr>' .
                    '<td><strong>' . 'Signature of applicant' . '</strong></td><td>' . $this->input->post('sign_of_applicant') . '</td>' .
					'<td><strong>' . 'Signature & Name Of The<br> Head Of Department<br> With Official Seal' . '</strong></td><td>' . $this->input->post('s_n_office_dept_seal') . '</td>' .
					'<td><strong>' . 'Signature & Name Of The<br> Head Of Administrative<br> Department With Official Seal' . '</strong></td><td>' . $this->input->post('s_n_dept_admin_seal') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'CNIC Of Govt: Servant' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
                    '<td><strong>' . 'CNIC Of Widow / Grantee' . '</strong></td><td>' . $this->input->post('cnic_widow_attach') . '</td>' .
                    '<td><strong>' . 'Death Certificate' . '</strong></td><td>' . $this->input->post('dc_attach') . '</td>' .
					'</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'List Of Family Members' . '</strong></td><td>' . $this->input->post('family_attach') . '</td>' .
					'<td><strong>' . 'Pay Roll / LPC' . '</strong></td><td>' . $this->input->post('dob_ac_attach') . '</td>' .
					'<td><strong>' . 'Details Of Bank A/C' . '</strong></td><td>' . $this->input->post('dob_ac_attach') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'Single Widow Certificate' . '</strong></td><td>' . $this->input->post('single_widow_attach') . '</td>' .
					'<td><strong>' . 'No Marriage & Non-Separation Certificate' . '</strong></td><td>' . $this->input->post('no_marriage_attach') . '</td>' .
					'<td><strong>' . 'Death In Service Certificate' . '</strong></td><td>' . $this->input->post('disc_attach') . '</td>' .
                    '</tr>' .

                    '<tr>' .
                    '<td><strong>' . 'Undertaking' . '</strong></td><td colspan="5">' . $this->input->post('undertaking') . '</td>' .
					'</tr>' .

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
    

    


	public function edit_lumpsum_grant() {

        //echo '<pre>'; print_r($_POST); exit();
        $application_no = $this->input->post('app_no'); 

        $doa = date('Y-m-d', strtotime($this->input->post('doa')));
        $dor = date('Y-m-d', strtotime($this->input->post('dor')));
        $dept_letter_no_date = date('Y-m-d', strtotime($this->input->post('dept_letter_no_date')));

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
        
        $this->db->where('application_no', $application_no);
        $result = $this->db->update('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
        //$last_insert_id = $this->db->insert_id(); 
  
		if ($result == true) {

            $data = array(  
                //'application_no' => $this->input->post('app_no'), 
                'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'), 
                'tbl_district_id' => $this->input->post('tbl_district_id'),
                'wife' => $this->input->post('wife'),
                'son' => $this->input->post('son'),
                'daughter' => $this->input->post('daughter'),
                'tbl_grantee_type_id' => $this->input->post('tbl_grantee_type_id'),
                'grantee_name' => $this->input->post('grantee_name'),
                'cnic_grantee' => $this->input->post('cnic_grantee'),
                'grantee_contact_no' => $this->input->post('grantee_contact_no'),
                'record_no' => $this->input->post('record_no'),
                'record_no_year' => $this->input->post('record_no_year'), 
                'doa' => $doa,
                'dor' => $dor,
                'los' => $this->input->post('los'),
                'dept_letter_no' => $this->input->post('dept_letter_no'),
                'dept_letter_no_date' => $dept_letter_no_date,
                'grant_amount' => $this->input->post('grant_amount'),
                'deduction' => $this->input->post('deduction'),
                'net_amount' => $this->input->post('net_amount'), 
                'tbl_payment_mode_id' => $this->input->post('tbl_payment_mode_id'),  
                'tbl_banks_id' => $this->input->post('bank_type_id'), 
                'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'), 
                'account_no' => $this->input->post('account_no'), 
                'bank_verification' => $this->input->post('bank_verification'),
                'sign_of_applicant' => $this->input->post('sign_of_applicant'),
                's_n_office_dept_seal' => $this->input->post('s_n_office_dept_seal'),
                's_n_dept_admin_seal' => $this->input->post('s_n_dept_admin_seal'),
                'cnic_attach' => $this->input->post('cnic_attach'), 
                'cnic_widow_attach' => $this->input->post('cnic_widow_attach'), 
                'dc_attach' => $this->input->post('dc_attach'), 
                'family_attach' => $this->input->post('family_attach'),  
                'payroll_lpc_attach' => $this->input->post('payroll_lpc_attach'), 
                'dob_ac_attach' => $this->input->post('dob_ac_attach'),  
                'single_widow_attach' => $this->input->post('single_widow_attach'), 
                'no_marriage_attach' => $this->input->post('no_marriage_attach'), 
                'disc_attach' => $this->input->post('disc_attach'), 
                'undertaking' => $this->input->post('undertaking'), 
                'gazette' => $gazette,  
                'record_add_by' => $_SESSION['admin_id'],
                'record_add_date' => date('Y-m-d H:i:s'), 
            );
        }
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
            $getGranteeType = $this->common_model->getRecordById($this->input->post('tbl_grantee_type_id'), $tbl_name = 'tbl_grantee_type');
            $ganteeType = $getGranteeType['name'];
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
                    '<td><strong>' . 'Application Number' . '</strong></td>
                     <td colspan="5"><strong>' . $application_no . '</strong></td>' .
                    '</tr>' . 

                    '<tr>' .
					'<td><strong>' . 'Name Of Government Servant:' . '</strong></td><td>' . $granteeName . '</td>' .
					'<td>Pay Scale</td><td>'.$pay_scale.'</td>' .
                    '<td>Department / Post</td><td>'.$departmentName.'/ '.$postName.'</td>' .
					'</tr>' .
                    
                    '<tr>' . 
					'<td><strong>' . 'Wife' . '</strong></td><td>' . $this->input->post('wife') . '</td>' .
					'<td><strong>' . 'Son' . '</strong></td><td>' . $this->input->post('son') . '</td>' .
                    '<td><strong>' . 'Daughter' . '</strong></td><td>' . $this->input->post('daughter') . '</td>' .
                    '</tr>' .

                    '<tr>' . 
					'<td><strong>' . 'Grantee Type' . '</strong></td><td>' . $ganteeType . '</td>' .
					'<td><strong>' . 'Name Of Widow / Grantee / Applicant' .  '</strong></td><td>'.$this->input->post('grantee_name').'</td>' .
                    '<td><strong>' . 'CNIC No. Of Widow / Grantee' .  '</strong></td><td>'.$this->input->post('cnic_grantee').'</td>' .
                    '</tr>' .

                    '<tr>' .
                    '<td><strong>' . 'Grantee Contact Number' .  '</strong></td><td>'.$this->input->post('grantee_contact_no').'</td>' .
					'<td><strong>' . 'Record no' . '</strong></td><td>' . $this->input->post('record_no') . '</td>' .
					'<td><strong>' . 'Record no year' . '</strong></td><td>' . $this->input->post('record_no_year') . '</td>' .
					'</tr>' . 

					'<tr>' .
                    '<td><strong>' . 'Date of Appointment ' . '</strong></td><td>' . $doa . '</td>' .
					'<td><strong>' . 'Date of Retirement' . '</strong></td><td>' . $dor . '</td>' .
					'<td><strong>' . 'Length Of Service' . '</strong></td><td>' . $this->input->post('los') . '</td>' .
					'</tr>' .

					'<tr>' .
                    '<td><strong>' . 'Dept letter no' . '</strong></td><td>' . $this->input->post('dept_letter_no') . '</td>' .
					'<td><strong>' . 'Dept letter no date' . '</strong></td><td colspan="3">' . $dept_letter_no_date . '</td>' .
					
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'Grant amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
					'<td><strong>' . 'Deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
                    '<td><strong>' . 'Net amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'</tr>' .

					'<tr>' . 
					'<td><strong>' . 'Case Status' . '</strong></td><td>' . $statusName . '</td>' .
					'<td><strong>' . 'Payment Mode' . '</strong></td><td>' . $paymentMode . '</td>' .
                    '<td><strong>' . 'Bank & Branch' . '</strong></td><td>' . $bankBranch . '</td>' .
                    '</tr>' .
                    '<tr>' . 
					'<td><strong>' . 'Account no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
					'<td><strong>' . 'Bank Verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
                    '<td><strong>' . '' . '</strong></td><td>' .''.  '</td>' . 
                    '</tr>' . 
                    '<tr>' .
                    '<td><strong>' . 'Signature of applicant' . '</strong></td><td>' . $this->input->post('sign_of_applicant') . '</td>' .
					'<td><strong>' . 'Signature & Name Of The<br> Head Of Department<br> With Official Seal' . '</strong></td><td>' . $this->input->post('s_n_office_dept_seal') . '</td>' .
					'<td><strong>' . 'Signature & Name Of The<br> Head Of Administrative<br> Department With Official Seal' . '</strong></td><td>' . $this->input->post('s_n_dept_admin_seal') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'CNIC Of Govt: Servant' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
                    '<td><strong>' . 'CNIC Of Widow / Grantee' . '</strong></td><td>' . $this->input->post('cnic_widow_attach') . '</td>' .
                    '<td><strong>' . 'Death Certificate' . '</strong></td><td>' . $this->input->post('dc_attach') . '</td>' .
					'</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'List Of Family Members' . '</strong></td><td>' . $this->input->post('family_attach') . '</td>' .
					'<td><strong>' . 'Pay Roll / LPC' . '</strong></td><td>' . $this->input->post('dob_ac_attach') . '</td>' .
					'<td><strong>' . 'Details Of Bank A/C' . '</strong></td><td>' . $this->input->post('dob_ac_attach') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'Single Widow Certificate' . '</strong></td><td>' . $this->input->post('single_widow_attach') . '</td>' .
					'<td><strong>' . 'No Marriage & Non-Separation Certificate' . '</strong></td><td>' . $this->input->post('no_marriage_attach') . '</td>' .
					'<td><strong>' . 'Death In Service Certificate' . '</strong></td><td>' . $this->input->post('disc_attach') . '</td>' .
                    '</tr>' .

                    '<tr>' .
                    '<td><strong>' . 'Undertaking' . '</strong></td><td colspan="5">' . $this->input->post('undertaking') . '</td>' .
					'</tr>'  
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
	}
    
    
    function update_application_status() {
        
        //echo '<pre>'; print_r($this->input->post()); //exit();
        $apps = $this->input->post('application_no');
        $action = $this->input->post('btnSubmit'); 
        $get_status = $this->common_model->getRecordByColoumn('tbl_case_status', 'name',  $action);
        $status = $get_status['id'];
        //echo '<br>status_id = '. $status; //exit;

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
                //echo '<br>affected = '. $this->db->affected_rows(); 
                $this->db->where('application_no', $application_no); 
                $result = $this->db->update('tbl_lump_sum_grant', $self_tbl_status); 
              

                $get_status = $this->common_model->getRecordByColoumn('tbl_lump_sum_grant', 'application_no',  $application_no);
                $id = $get_status['id'];
                $tbl_emp_info_id = $get_status['tbl_emp_info_id'];
 

                //send sms if approved by board...
                if($status == '2') {   
                    $getEmp = $this->common_model->getRecordById($tbl_emp_info_id, $tbl_name = 'tbl_emp_info');
                    $contact_no = $getEmp['contact_no'];
                    $smsContent = 'آپ کے درخواست نمبر '. $application_no . ' کو بورڈ کے ذریعہ منظور کرلیا گیا ہے۔';  
                    $smsArray   = array('applicantMobNo' => $contact_no, 'smsContent' => $smsContent);
                    $send       = $this->common_model->sendSMS($smsArray);
                }


                // send sms if rejected by board
                if($status == '3') {   
                    $getEmp = $this->common_model->getRecordById($tbl_emp_info_id, $tbl_name = 'tbl_emp_info');
                    $contact_no = $getEmp['contact_no'];
                    $smsContent = 'آپ کے درخواست نمبر '. $application_no . ' کو بورڈ کے ذریعہ مسترد کرلیا گیا ہے۔'; 
                    $smsArray   = array('applicantMobNo' => $contact_no, 'smsContent' => $smsContent);
                    $send       = $this->common_model->sendSMS($smsArray);
                }



                $this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($id) //Entry table ID
				->action_type('update') //action type identify Action like add or update
				->detail( 
					'<tr>' .
					'<td><strong>' . 'Status' . '</strong></td><td>' . $action . '</td>'  .
					'</tr>' . 
                    '<tr>' .
					'<td><strong>' . 'Contact no' . '</strong></td><td>' . $contact_no . '</td>'  .
					'</tr>' .
                    '<tr>' .
					'<td><strong>' . 'SMS Send' . '</strong></td><td>' . $send . '</td>'  .
					'</tr>' .
                    '<tr>' .
					'<td><strong>' . 'SMS Content' . '</strong></td><td>' . $smsContent . '</td>'  .
					'</tr>'  
				) //detail
				->log(); //Add Database Entry

            } 
            //exit;
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