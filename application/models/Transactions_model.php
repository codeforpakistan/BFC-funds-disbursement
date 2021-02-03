<?php
class Transactions_model extends CI_Model {
	public function __construct() {
        $this->load->database();  
        //tbl_grants_has_tbl_emp_info_gerund
        $this->table = 'tbl_transactions';
		// Set orderable column fields
		//$this->column_order = array(null, 'name', 'status');
		// Set searchable column fields
		//$this->column_search = array('name');
		// Set default order
		$this->order = array('id' => 'desc');
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



    function update_application_status($array = null) {
        
        //posted variables...
        $application_no = $array['app_no'];
        $tbl_grant_id = $array['tbl_grant_id']; 

        $get_tbl_grants = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $tbl_grant_id);
        $tbl_grant_name = $get_tbl_grants['tbl_name'];  
        
        $get_app_amount = $this->common_model->getRecordByColoumn($tbl_grant_name, 'application_no', $application_no);
        $app_amount = $get_app_amount['net_amount'];

        // total paid amount
        $amount = $this->transactions_model->get_sum_amount_transaction(); 
        $remaining_amount = $app_amount - $amount;
        

        //checking...
        if($remaining_amount > 0) {
            $status = '10';  
            $statusText = 'Installments';
        } else if($remaining_amount == 0) {
            $status = '11';  
            $statusText = 'Completed';
        }
 
        if($status=='10' || $status == '11')
        {

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
            //$get_tbl = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $grantID);
            //$tbl_name = $get_tbl['tbl_name'];
           
            //updating in self table
            $this->db->where('application_no', $application_no); 
            $result = $this->db->update($tbl_grant_name, $self_tbl_status); 
    
    
            $get_rec_id = $this->common_model->getRecordByColoumn($tbl_grant_name, 'application_no', $application_no);
            $application_id = $get_rec_id['id'];
    
            $this->logger
            ->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
            ->tbl_name($tbl_grant_name) //Entry table name
            ->tbl_name_id($application_id) //Entry table ID
            ->action_type('update') //action type identify Action like add or update
            ->detail( 
                '<tr>' .
                '<td><strong>' . 'Status' . '</strong></td><td> '.$statusText.' </td>'  .
                '</tr>'  
            ) //detail
            ->log(); //Add Database Entry
      
           
            if ($result == true) { 
                return true;
            } else {
                return false;
            }

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