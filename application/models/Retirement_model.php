<?php
class Retirement_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_retirement_grant';
		// Set orderable column fields
		$this->column_order = array(null, 'record_no');
		// Set searchable column fields
		$this->column_search = array('record_no');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp////////
	}

	 

	public function add_retirement_grant() {
  
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
            'tbl_grants_id' => '3',
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


        $data = array( 
            'application_no' => $application_no,
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
            'payroll_attach' => $this->input->post('payroll_attach'),
            'dob_ac_attach' => $this->input->post('dob_ac_attach'),
            'retirement_attach' => $this->input->post('retirement_attach'),
            'bf_contribution_attach' => $this->input->post('bf_contribution_attach'), 
            'cnic_attach' => $this->input->post('cnic_attach'),
            'ppo_attach' => $this->input->post('ppo_attach'),
            //'boards_approval' => $this->input->post('boards_approval'),
            //'ac_edit' => $this->input->post('ac_edit'),
            //'sent_to_secretary' => $this->input->post('sent_to_secretary'),
            //'approve_secretary' => $this->input->post('approve_secretary'),
            //'sent_to_bank' => $this->input->post('sent_to_bank'),
            //'feedback_website' => $this->input->post('feedback_website'), 
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
                    '<td>&nbsp;</td><td>&nbsp;</td>' .
                    '<td>&nbsp;</td><td>&nbsp;</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'Record no' . '</strong></td><td>' . $this->input->post('record_no') . '</td>' .
                    '<td><strong>' . 'record_no_year' . '</strong></td><td>' . $this->input->post('record_no_year') . '</td>' .
                    '<td><strong>' . 'Date of appointment ' . '</strong></td><td>' . $doa . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'Date of Retirement' . '</strong></td><td>' . $dor . '</td>' .
                    '<td><strong>' . 'los' . '</strong></td><td>' . $this->input->post('los') . '</td>' .
                    '<td><strong>' . 'dept_letter_no' . '</strong></td><td>' . $this->input->post('dept_letter_no') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'dept_letter_no_date' . '</strong></td><td>' . $dept_letter_no_date . '</td>' .
                    '<td><strong>' . 'grant_amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
                    '<td><strong>' . 'deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'net amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
                    '<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
                    '<td><strong>' . 'tbl_payment_mode_id' . '</strong></td><td>' . $this->input->post('tbl_payment_mode_id') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'tbl_list_bank_branches_id' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
                    '<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
                    '<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
                    '</tr>' . 
                    '<tr>' .
                    '<td><strong>' . 'sign_of_applicant' . '</strong></td><td>' . $this->input->post('sign_of_applicant') . '</td>' .
                    '<td><strong>' . 's_n_office_dept_seal' . '</strong></td><td>' . $this->input->post('s_n_office_dept_seal') . '</td>' .
                    '<td><strong>' . 's_n_dept_admin_seal' . '</strong></td><td>' . $this->input->post('s_n_dept_admin_seal') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'payroll_attach' . '</strong></td><td>' . $this->input->post('payroll_attach') . '</td>' .
                    '<td><strong>' . 'dob_ac_attach' . '</strong></td><td>' . $this->input->post('dob_ac_attach') . '</td>' .
                    '<td><strong>' . 'retirement_attach' . '</strong></td><td>' . $this->input->post('retirement_attach') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'bf_contribution_attach' . '</strong></td><td>' . $this->input->post('bf_contribution_attach') . '</td>' .
                    '<td><strong>' . 'cnic_attach' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
                    '<td><strong>' . 'ppo_attach' . '</strong></td><td>' . $this->input->post('ppo_attach') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'boards_approval' . '</strong></td><td>' . $this->input->post('boards_approval') . '</td>' .
                    '<td><strong>' . 'ac_edit' . '</strong></td><td>' . $this->input->post('ac_edit') . '</td>' .
                    '<td><strong>' . 'sent_to_secretary' . '</strong></td><td>' . $this->input->post('sent_to_secretary') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'approve_secretary' . '</strong></td><td>' . $this->input->post('approve_secretary') . '</td>' .
                    '<td><strong>' . 'sent_to_bank' . '</strong></td><td>' . $this->input->post('sent_to_bank') . '</td>' .
                    '<td><strong>' . 'feedback_website' . '</strong></td><td>' . $this->input->post('feedback_website') . '</td>' .
                    '</tr>' 
                    
                ) //detail
                ->log(); //Add Database Entry

            return true;
        } else {
            return false;
        } 
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
                    $result = $this->db->update('tbl_retirement_grant', $self_tbl_status); 
                }

                $get_status = $this->common_model->getRecordByColoumn('tbl_retirement_grant', 'application_no',  $application_no);
                $id = $get_status['id'];

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

    
    public function edit_retirement_grant() {

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
            'tbl_grants_id' => '3',
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            'application_no' => $application_no,
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'gazette' => $gazette,
            'role_id' => $_SESSION['tbl_admin_role_id'],
            'added_by' => $_SESSION['admin_id'],
            'status' => $this->input->post('tbl_case_status_id')
        );
        $this->db->update('tbl_grants_has_tbl_emp_info_gerund', $app_data); 
        $last_insert_id = $this->db->insert_id(); 

 
		$data = array( 
            'application_no' => $application_no,
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
            'tbl_case_status_id' => $this->input->post('tbl_case_status_id'),
            'tbl_payment_mode_id' => $this->input->post('tbl_payment_mode_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            
            'account_no' => $this->input->post('account_no'),
            'bank_verification' => $this->input->post('bank_verification'),
            'sign_of_applicant' => $this->input->post('sign_of_applicant'),
            's_n_office_dept_seal' => $this->input->post('s_n_office_dept_seal'),
            's_n_dept_admin_seal' => $this->input->post('s_n_dept_admin_seal'),
            'payroll_attach' => $this->input->post('payroll_attach'),
            'dob_ac_attach' => $this->input->post('dob_ac_attach'),
            'retirement_attach' => $this->input->post('retirement_attach'),
            'bf_contribution_attach' => $this->input->post('bf_contribution_attach'), 
            'cnic_attach' => $this->input->post('cnic_attach'),
            'ppo_attach' => $this->input->post('ppo_attach'),
            'boards_approval' => $this->input->post('boards_approval'),
            'ac_edit' => $this->input->post('ac_edit'),
            'sent_to_secretary' => $this->input->post('sent_to_secretary'),
            'approve_secretary' => $this->input->post('approve_secretary'),
            
            'sent_to_bank' => $this->input->post('sent_to_bank'),
            'feedback_website' => $this->input->post('feedback_website'), 
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'), 
            'tbl_district_id' => $this->input->post('tbl_district_id'),
            'gazette' => $gazette,
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
        );
        echo '<pre>'; print_r($data); exit;
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
					'<td>&nbsp;</td><td>&nbsp;</td>' .
					'<td>&nbsp;</td><td>&nbsp;</td>' .
					'</tr>' .
                    '<tr>' .
					'<td><strong>' . 'Record no' . '</strong></td><td>' . $this->input->post('record_no') . '</td>' .
					'<td><strong>' . 'record_no_year' . '</strong></td><td>' . $this->input->post('record_no_year') . '</td>' .
					'<td><strong>' . 'Date of appointment ' . '</strong></td><td>' . $doa . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Date of Retirement' . '</strong></td><td>' . $dor . '</td>' .
					'<td><strong>' . 'los' . '</strong></td><td>' . $this->input->post('los') . '</td>' .
					'<td><strong>' . 'dept_letter_no' . '</strong></td><td>' . $this->input->post('dept_letter_no') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'dept_letter_no_date' . '</strong></td><td>' . $dept_letter_no_date . '</td>' .
					'<td><strong>' . 'grant_amount' . '</strong></td><td>' . $this->input->post('grant_amount') . '</td>' .
					'<td><strong>' . 'deduction' . '</strong></td><td>' . $this->input->post('deduction') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'net amount' . '</strong></td><td>' . $this->input->post('net_amount') . '</td>' .
					'<td><strong>' . 'tbl_case_status_id' . '</strong></td><td>' . $this->input->post('tbl_case_status_id') . '</td>' .
					'<td><strong>' . 'tbl_payment_mode_id' . '</strong></td><td>' . $this->input->post('tbl_payment_mode_id') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'tbl_list_bank_branches_id' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'<td><strong>' . 'account_no' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
					'<td><strong>' . 'bank_verification' . '</strong></td><td>' . $this->input->post('bank_verification') . '</td>' .
                    '</tr>' . 
                    '<tr>' .
                    '<td><strong>' . 'sign_of_applicant' . '</strong></td><td>' . $this->input->post('sign_of_applicant') . '</td>' .
					'<td><strong>' . 's_n_office_dept_seal' . '</strong></td><td>' . $this->input->post('s_n_office_dept_seal') . '</td>' .
					'<td><strong>' . 's_n_dept_admin_seal' . '</strong></td><td>' . $this->input->post('s_n_dept_admin_seal') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'payroll_attach' . '</strong></td><td>' . $this->input->post('payroll_attach') . '</td>' .
					'<td><strong>' . 'dob_ac_attach' . '</strong></td><td>' . $this->input->post('dob_ac_attach') . '</td>' .
					'<td><strong>' . 'retirement_attach' . '</strong></td><td>' . $this->input->post('retirement_attach') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'bf_contribution_attach' . '</strong></td><td>' . $this->input->post('bf_contribution_attach') . '</td>' .
					'<td><strong>' . 'cnic_attach' . '</strong></td><td>' . $this->input->post('cnic_attach') . '</td>' .
					'<td><strong>' . 'ppo_attach' . '</strong></td><td>' . $this->input->post('ppo_attach') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'boards_approval' . '</strong></td><td>' . $this->input->post('boards_approval') . '</td>' .
					'<td><strong>' . 'ac_edit' . '</strong></td><td>' . $this->input->post('ac_edit') . '</td>' .
					'<td><strong>' . 'sent_to_secretary' . '</strong></td><td>' . $this->input->post('sent_to_secretary') . '</td>' .
                    '</tr>' .
                    '<tr>' .
                    '<td><strong>' . 'approve_secretary' . '</strong></td><td>' . $this->input->post('approve_secretary') . '</td>' .
					'<td><strong>' . 'sent_to_bank' . '</strong></td><td>' . $this->input->post('sent_to_bank') . '</td>' .
					'<td><strong>' . 'feedback_website' . '</strong></td><td>' . $this->input->post('feedback_website') . '</td>' .
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
    
    

    public function getAmountData() {
        
        $dateOfRetirement = $this->input->post('dor');
        $empScaleID = $this->input->post('empScaleID');
        
        //return array('date'=>$dateOfRetirement, 'empScaleID'=>$empScaleID);


        //$dateOfRetirement = base64_decode($date);
        
        if(strtotime($dateOfRetirement) <= strtotime('2016-12-19')) {
            //return 'less';
            $this->db->from('tbl_grant_payments'); 
            $this->db->where('from_date <=', $dateOfRetirement);
            $this->db->where('to_date >=', $dateOfRetirement);
            $this->db->where('tbl_pay_scale_id', $empScaleID);
            $this->db->where('tbl_grants_id', "3");
            $this->db->where('status', "1");
        } else if(strtotime($dateOfRetirement) >= strtotime('2016-12-19')) {
            //return 'great';
            $this->db->from('tbl_grant_payments'); 
            $this->db->where('from_date >=', '2016-12-19');
            //$this->db->where('to_date >=', $dateOfRetirement);
            $this->db->where('tbl_pay_scale_id', $empScaleID);
            $this->db->where('tbl_grants_id', "3");
            $this->db->where('status', "1");
        }
        

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
        if (!($_SESSION['tbl_admin_role_id'] == '1') && !($_SESSION['tbl_admin_role_id'] == '7')  && !($_SESSION['tbl_admin_role_id'] == '2')) {
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