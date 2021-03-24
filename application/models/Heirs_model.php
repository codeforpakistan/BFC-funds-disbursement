<?php
class Heirs_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_legal_heirs';
		// Set orderable column fields
		$this->column_order = array(null, 'name', 'status');
		// Set searchable column fields
		$this->column_search = array('name');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp//////// 
	}
	public function add_heirs() {

		$data = array(
			'name' => ucwords($this->input->post('name')),
			'percentage' => $this->input->post('percentage'),
            'tbl_banks_id' => $this->input->post('bank_type_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'tbl_grants_id' => $this->input->post('tbl_grants_id'),
            'application_no' => $this->input->post('application_no'),
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            'amount' => $this->input->post('amount'), 
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
            'status' => $this->input->post('status')
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);

		//insertion in db
		$this->db->insert($this->table, $data);
		$last_insert_id = $this->db->insert_id();

		if ($this->db->affected_rows() > 0) {
			// this is for activity log of a record
			if ($this->input->post('status') == '1') {$status = 'Active';} else { $status = 'Inactive';}

			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($last_insert_id) //Entry table ID
				->action_type('add') //action type identify Action like add or update
				->detail(
					'<tr>' .
					    '<td><strong>' . 'Legal Heir Name' . '</strong></td><td>' . ucwords($this->input->post('name') . '</td>') .
					    '<td><strong>' . 'Status' . '</strong></td><td>' . $status . '</td>' .
					'</tr>' .
                    '<tr>' .
					    '<td><strong>' . 'Bank Type' . '</strong></td><td>' . $this->input->post('tbl_banks_id') . ' </td>' .
					    '<td><strong>' . 'Bank Branch' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'</tr>' .
                    '<tr>' .
					    '<td><strong>' . 'Account No' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
					    '<td><strong>' . 'Amount' . '</strong></td><td>' . $this->input->post('amount') . '</td>' .
					'</tr>' .
                    '<tr>' .
					    '<td><strong>' . 'Percentage' . '</strong></td><td>' . $this->input->post('percentage') . '%</td>' .
					    '<td><strong>' . '' . '</strong></td><td> </td>' .
					'</tr>'

				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
	}

    // public function get_heirs_list($id) {
    //     // $this->db->select("*");
    //     // $this->db->from($tbl_name);
    //     // $this->db->where($your_conditions);
    //     // $query = $this->db->get();
    //     // return $query->result_array();
    
    
    //     $query = $this->db->select("hl.id, hl.name as heirs_name, hl.percentage, 
    //     hl.tbl_banks_id, hl.tbl_list_bank_branches_id, hl.account_no, hl.amount, hl.status, 
    //     hl.record_add_by, hl.record_add_date, hl.tbl_grants_id, 
    //     hl.application_no, hl.tbl_emp_info_id,  
    //     bb.name as bank_name, bb.branch_code")
    //            ->from("tbl_legal_heirs as hl")
    //            ->join("tbl_list_bank_branches as bb", "bb.id = hl.tbl_list_bank_branches_id", "inner")
    //            ->where("hl.application_no", $id)
    //            ->get();
    //     return $query->result_array();  
    // }

	public function getRecordById($id) {
		$this->db->from($this->table);
		$this->db->where('id', $id);
		$query = $this->db->get();
        
		return $query->row();
	}

	public function update_heirs() {

		$data = array(  
            'name' => ucwords($this->input->post('name')),
			'percentage' => $this->input->post('percentage'),
            'tbl_banks_id' => $this->input->post('bank_type_id'),
            'tbl_list_bank_branches_id' => $this->input->post('tbl_list_bank_branches_id'),
            'account_no' => $this->input->post('account_no'),
            'tbl_grants_id' => $this->input->post('tbl_grants_id'),
            'application_no' => $this->input->post('application_no'),
            'tbl_emp_info_id' => $this->input->post('tbl_emp_info_id'),
            'amount' => $this->input->post('amount'), 
			'record_add_by' => $_SESSION['admin_id'], 
            'status' => $this->input->post('status') 
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);
		//updation in db
		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update('tbl_legal_heirs', $data);
		if ($result == true) {
			if ($this->input->post('status') == '1') {$status = 'Active';} else { $status = 'Inactive';}
			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($this->input->post('id')) //Entry table ID
				->action_type('update') //action type identify Action like add or update
				->detail(
					'<tr>' .
					    '<td><strong>' . 'Legal Heir Name' . '</strong></td><td>' . ucwords($this->input->post('name') . '</td>') .
					    '<td><strong>' . 'Status' . '</strong></td><td>' . $status . '</td>' .
					'</tr>' .
                    '<tr>' .
					    '<td><strong>' . 'Bank Type' . '</strong></td><td>' . $this->input->post('tbl_banks_id') . ' </td>' .
					    '<td><strong>' . 'Bank Branch' . '</strong></td><td>' . $this->input->post('tbl_list_bank_branches_id') . '</td>' .
					'</tr>' .
                    '<tr>' .
					    '<td><strong>' . 'Account No' . '</strong></td><td>' . $this->input->post('account_no') . '</td>' .
					    '<td><strong>' . 'Amount' . '</strong></td><td>' . $this->input->post('amount') . '</td>' .
					'</tr>' .
                    '<tr>' .
					    '<td><strong>' . 'Percentage' . '</strong></td><td>' . $this->input->post('percentage') . '%</td>' .
					    '<td><strong>' . '' . '</strong></td><td> </td>' .
					'</tr>'
				) //detail
				->log(); //Add Database Entry
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
	public function getRows($postData, $grantType, $app_no) {
        //echo 'model'; exit;
		$this->_get_datatables_query($postData, $grantType, $app_no);
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
		return $this->db->count_all_results();
	}

	/*
		     * Count records based on the filter params
		     * @param $_POST filter data based on the posted parameters
	*/
	public function countFiltered($postData,  $tbl_grants_id, $app_no) {
		$this->_get_datatables_query($postData, $tbl_grants_id, $app_no);
		$query = $this->db->get();
		return $query->num_rows();
	}

	/*
		     * Perform the SQL queries needed for an server-side processing requested
		     * @param $_POST filter data based on the posted parameters
	*/
	private function _get_datatables_query($postData, $tbl_grants_id, $app_no) {
        //echo '<pre>'; print_r($postData);
		// $this->db->from($this->table);
        // $this->db->where('tbl_grants_id', $tbl_grants_id);
        // $this->db->where('application_no', $app_no);

        $query = $this->db->select("hl.id, hl.name as heirs_name, hl.percentage, 
        hl.tbl_banks_id, hl.tbl_list_bank_branches_id, hl.account_no, hl.amount, hl.status, 
        hl.record_add_by, hl.record_add_date, hl.tbl_grants_id, 
        hl.application_no, hl.tbl_emp_info_id,  
        bb.name as bank_name, bb.branch_code")
               ->from("tbl_legal_heirs as hl")
               ->join("tbl_list_bank_branches as bb", "bb.id = hl.tbl_list_bank_branches_id", "inner")
               ->where("hl.application_no", $app_no);
        //     ->get();
        //return $query->result_array(); 

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