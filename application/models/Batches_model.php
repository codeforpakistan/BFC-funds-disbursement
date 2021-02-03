<?php
class Batches_model extends CI_Model {
	public function __construct() {
        $this->load->database();  
        //tbl_grants_has_tbl_emp_info_gerund
        $this->table = 'tbl_batches';
		// Set orderable column fields
		//$this->column_order = array(null, 'name', 'status');
		// Set searchable column fields
		//$this->column_search = array('name');
		// Set default order
		$this->order = array('id' => 'desc');
	}

    public function get_batches($postData = null) {
        //echo 'i m here'; exit;
        $this->db->select('COUNT(id) AS applications, batch_no, application_no, record_add_date, record_add_by, status');
        $this->db->from('tbl_batches');  
        $this->db->group_by('batch_no'); 
        $this->db->order_by("id", "desc");
        //$this->order = array('id' => 'desc');  
        $query = $this->db->get();
        return $query->result(); 
    }


    public function get_batch_applications($id = null) {
        //echo 'i m here';
        $this->db->from('tbl_batches'); 
        $this->db->where('batch_no', $id);    
        $this->order = array('id' => 'desc');  
        $query = $this->db->get();
        return $query->result(); 

    }

    public function get_sum_amount_transaction() {
 
        $application_no = $this->input->post('application_no');  
        
        $this->db->select('SUM(amount) as amount');
        $this->db->from('tbl_transactions');  
        $this->db->where('application_no', $application_no);  
        $query = $this->db->get();
        $result = $query->row_array(); 
        $amount = $result['amount']; 

        if($amount > 0) {
            return $amount;
        } else {
            return '0';
        }
        
        
    }

    public function add_transaction($tbl_grant_id) {

		$data = array(
            'application_no' => $this->input->post('application_no'),
            'tbl_grants_id' => $tbl_grant_id,
            'amount' => $this->input->post('amount'),
			'bank_transaction_id' => $this->input->post('bank_transaction_id'),
            'date_added' => date('Y-m-d'),
            'added_by' => $_SESSION['admin_id'], 
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);

		//insertion in db
		$this->db->insert('tbl_transactions', $data);
		$last_insert_id = $this->db->insert_id();

		if ($this->db->affected_rows() > 0) {  
			return true;
		} else {
			return false;
		}
	}



    // Get DataTable data
	function get_listing_reports($postData = null) {
 
		$response = array();

		## Read value
		$draw = $postData['draw'];
		$start = $postData['start'];
		$rowperpage = $postData['length']; // Rows display per page
		$columnIndex = $postData['order'][0]['column']; // Column index
		$columnName = $postData['columns'][$columnIndex]['data']; // Column name
		$columnSortOrder = $postData['order'][0]['dir']; // asc or desc
		$searchValue = $postData['search']['value']; // Search value

		// Custom search filter
		$from_date = $postData['from_date'];
		$to_date = $postData['to_date']; 
		$tbl_grants_id = $postData['tbl_grants_id'];
		$status = $postData['status'];
        $from_app_no = $postData['from_app_no'];
        $to_app_no = $postData['to_app_no'];
        $bank_type_id = $postData['bank_type_id'];
        $tbl_bank_id = $postData['tbl_bank_id'];
        $district_id = $postData['district_id'];
        $admin_id = $postData['admin_id'];


		## Search
		$search_arr = array();
        $searchQuery = "";
        //$this->db->where('batch_status','0');
        $search_arr[] = " batch_status = '0' ";

		if ($from_date != '' && $to_date != '') {
			$from_date = date('Y-m-d', strtotime($postData['from_date']));
			$to_date = date('Y-m-d', strtotime($postData['to_date']));
			$search_arr[] = " date_added BETWEEN '" . $from_date . "' and '" . $to_date . "' ";
		}
		if ($status != '') {
			$search_arr[] = " status = '" . $status . "' ";
		}
        if ($admin_id != '') {
			$search_arr[] = " added_by = '" . $admin_id . "' ";
        }
		if ($tbl_grants_id != '') {
			$search_arr[] = " tbl_grants_id = '" . $tbl_grants_id . "' ";
        }
        if ($district_id != '') {
			$search_arr[] = " tbl_district_id = '" . $district_id . "' ";
        }
        if($from_app_no != '' && $to_app_no == '') {
            $search_arr[] = " application_no >= '" . $from_app_no . "'";
        }
        if($from_app_no == '' && $to_app_no != '') {
            $search_arr[] = " application_no <= '" . $to_app_no . "'";
        }
        if($from_app_no != '' && $to_app_no != '') {
            $search_arr[] = " application_no BETWEEN '" . $from_app_no . "' and '" . $to_app_no . "' ";
        } 
        if ($bank_type_id != '') {
			$search_arr[] = " tbl_banks_id = '" . $bank_type_id . "' ";
        }
        if ($tbl_bank_id != '') {
			$search_arr[] = " tbl_list_bank_branches_id = '" . $tbl_bank_id . "' ";
        }

        $search_arr[] = " status = '2' ";

		if (count($search_arr) > 0) {
			$searchQuery = implode(" and ", $search_arr);
        }
         

		## Total number of records without filtering
		$this->db->select('count(*) as allcount');
        $this->db->where('batch_status','0');
        $this->db->where('status','2');
		$records = $this->db->get('tbl_grants_has_tbl_emp_info_gerund')->result();
		$totalRecords = $records[0]->allcount;

		## Total number of record with filtering
		$this->db->select('count(*) as allcount');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		}
	 
		$records = $this->db->get('tbl_grants_has_tbl_emp_info_gerund')->result();
		$totalRecordwithFilter = $records[0]->allcount;
		## Fetch records
		$this->db->select('*');
		if ($searchQuery != '') {
			$this->db->where($searchQuery);
		} 

		$this->db->order_by($columnName, $columnSortOrder);
		$this->db->limit($rowperpage, $start);
		$this->db->order_by('id', 'desc');
		$records = $this->db->get('tbl_grants_has_tbl_emp_info_gerund')->result();

        //echo '<pre>'; print_r($records); exit;

		$data = array();
		$i = 1;
		foreach ($records as $record) {

			// if ($record->status == 1) {
			// 	$status = '<span class="label label-primary">Inprocess</span>';
			// } else if ($record->status == 2) {
			// 	$status = '<span class="label label-success">Complete</span>';
			// } else if ($record->status == 3) {
			// 	$status = '<span class="label label-danger">Rejected / Not Approved</span>';
			// } else if ($record->status == 4) {
            //     $status = '<span class="label label-success">Approved</span>';
            // }
            
            $get_status = $this->common_model->getRecordByColoumn('tbl_case_status', 'id', $record->status);
            $status = '<label class="'.$get_status['label'].'">'. $get_status['name']. '</label>';

            $applicationNo = $record->application_no;

            $grantID = $record->tbl_grants_id; 
            $getGrantDetails = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $grantID);
            $grant_type = $getGrantDetails['name'];
            //$grant_tbl_name = $getGrantDetails['tbl_name'];
            

            $empID = $record->tbl_emp_info_id;   
            $getGrant  = $this->common_model->getRecordByColoumn('tbl_emp_info', 'id', $empID);
            $applicant_name = $getGrant['grantee_name'];

            
            $recordAddDate = date("d-M-Y", strtotime($record->date_added)); 
 
            $input = '<input type="checkbox" name="selectall[]" id="selectall" value="'.$applicationNo.'">';
            
			$data[] = array(
                "checkbox" => $input, 
                "no" => $i, 
				"applicationNo" => $applicationNo,
				"GrantType" => $grant_type,
				"GranteeName" => $applicant_name, 
				"DateAdded" => $recordAddDate, 
				"status" => $status
			);
			$i++;
		}

		## Response
		$response = array(
			"draw" => intval($draw),
			"iTotalRecords" => $totalRecords,
			"iTotalDisplayRecords" => $totalRecordwithFilter,
			"aaData" => $data,
		);

		return $response;
	}

    function update_application_status() {
        
        //echo '<pre>'; print_r($this->input->post()); exit();
        $apps = $this->input->post('app_no');
        $btnSubmit = $this->input->post('btnSubmit');
        //$batch_no = $this->input->post('batch_no');

        if($btnSubmit == 'Approved By Secretary') {
            $status = '5'; 
        } else if($btnSubmit == 'Rejected By Secretary') {
            $status = '6'; 
        } else if($btnSubmit == 'Sent to Bank') {
            $status = '7';
        } else if($btnSubmit == 'Approved By Bank') {
            $status = '8';
        } else if($btnSubmit == 'Rejected By Bank') {
            $status = '9';
        }
        
        foreach ($apps as $key => $application_no) {

            $getApplication = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $application_no);
            $grantID = $getApplication['tbl_grants_id'];
            $app_role_id = $getApplication['role_id'];
            $app_added_by = $getApplication['added_by'];


            $data = array( 'status' => $status );
            //XSS prevention
            $data = $this->security->xss_clean($data);
            //updation in tbl_grants_has_tbl_emp_info_gerund 
            $this->db->where('application_no', $application_no);
            $result = $this->db->update('tbl_grants_has_tbl_emp_info_gerund', $data);
            
            //XSS prevention
            $self_tbl_status = array( 'tbl_case_status_id' =>  $status ); 
            $self_tbl_status = $this->security->xss_clean($self_tbl_status);
            //finding table name
            $get_tbl = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $grantID);
            $tbl_name = $get_tbl['tbl_name'];
            //updating in self table
            $this->db->where('application_no', $application_no); 
            $result = $this->db->update($tbl_name, $self_tbl_status); 
 

            $get_rec_id = $this->common_model->getRecordByColoumn($tbl_name, 'application_no', $application_no);
            $application_id = $get_rec_id['id'];

            $this->logger
            ->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
            ->tbl_name($tbl_name) //Entry table name
            ->tbl_name_id($application_id) //Entry table ID
            ->action_type('update') //action type identify Action like add or update
            ->detail( 
                '<tr>' .
                '<td><strong>' . 'Status' . '</strong></td><td> '.$btnSubmit.' </td>'  .
                '</tr>'  
            ) //detail
            ->log(); //Add Database Entry


            


            //call to add notification...
            // $array  = array(
            //     'from_role_id'         =>      $_SESSION['tbl_admin_role_id'], 
            //     'to_role_id'           =>      $to_role_id, 
            //     'tbl_grants_id'     =>      $tbl_grants_id, 
            //     'application_no'    =>      $application_no, 
            //     'record_add_by'     =>      $record_add_by, 
            //     'record_url'        =>      $record_url, 
            // );
            // $notify = $this->add_notification($array);
      
        } 
       
        if ($result == true) { 
            return true;
        } else {
            return false;
        }
    }


    function add_notification($array=null) {

        $from_user          =   $array['from_user'];
        $to_user            =   $array['to_user'];
        $tbl_grants_id      =   $array['tbl_grants_id'];
        $application_no     =   $array['application_no']; 
        $record_add_by      =   $array['record_add_by'];
        $record_url         =   $array['record_url']; 


        //add notification
        $notifications = array(
            'from_user' => $from_user,
            'to_user' => $to_user,
            'tbl_grants_id' => $tbl_grants_id,
            'application_no' => $application_no,
            'record_add_by' => $record_add_by, 
            'record_add_date' => date('Y-m-d'), 
            'status_view' => '0',
            'record_url' => $record_url
        );

        //XSS prevention
        $notifications = $this->security->xss_clean($notifications);

        //insertion in db
        $this->db->insert('tbl_notifications', $notifications);
        $last_insert_id = $this->db->insert_id();
    }

    //Create Batch
    function add_batch($postData = null) { 

        //echo '<pre>'; print_r($this->input->post()); exit();

        $batch_no = $this->common_model->getBatchNo();   
        //$batch_no = date('Ymd');
       
        foreach ($postData as $key => $value) { 

            $getApplication = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $value);
            $districtID = $getApplication['tbl_district_id'];
            $grantID = $getApplication['tbl_grants_id'];

            $data = array( 
                'batch_no'=> $batch_no, 
                'application_no' => $value,  
                'tbl_grants_id' => $grantID,
                'tbl_district_id' => $districtID,  
                'record_add_date' => date('Y-m-d H:i:s'),
                'record_add_by' => $_SESSION['admin_id'],
                'status' => '1',
            );
            
            $this->db->insert('tbl_batches', $data); 
            $last_insert_id = $this->db->insert_id();
            
            if ($this->db->affected_rows() > 0) {
                $data = array(  
                    'batch_status' => '1',
                    'status' => '4',
                );

                $this->db->where('application_no', $value);
                $result = $this->db->update('tbl_grants_has_tbl_emp_info_gerund', $data);
                 
                $self_tbl_status = array( 'tbl_case_status_id' => '4' ); 
                $self_tbl_status = $this->security->xss_clean($self_tbl_status);

                $get_tbl = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $grantID);
                $tbl_name = $get_tbl['tbl_name'];

                $this->db->where('application_no', $value); 
                $result = $this->db->update($tbl_name, $self_tbl_status); 

            }

            $get_rec_id = $this->common_model->getRecordByColoumn($tbl_name, 'application_no', $value);
            $application_id = $get_rec_id['id'];

            $this->logger
            ->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
            ->tbl_name($tbl_name) //Entry table name
            ->tbl_name_id($application_id) //Entry table ID
            ->action_type('update') //action type identify Action like add or update
            ->detail( 
                '<tr>' .
                '<td><strong>' . 'Status' . '</strong></td><td> Batched </td>'  .
                '</tr>'  
            ) //detail
            ->log(); //Add Database Entry
            


        }

        return true; 

    }
      
    





	//////////////// below ajax and server side processing datatable ///////////

	/*
		     * Fetch members data from the database
		     * @param $_POST filter data based on the posted parameters
	*/
	public function getRows($postData) {
        //return $postData;

		$this->_get_datatables_query($postData);
		if ($postData['length'] != -1) {
			$this->db->limit($postData['length'], $postData['start']);
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