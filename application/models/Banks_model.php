<?php
class Banks_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_banks';
		// Set orderable column fields
		$this->column_order = array(null, 'name', 'status');
		// Set searchable column fields
		$this->column_search = array('name');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp////////
	}
	public function add_banks() {

		$data = array(
			'name' => ucwords($this->input->post('name')),
			'status' => $this->input->post('status'),
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);

		//insertion in db
		$this->db->insert('tbl_banks', $data);
		if ($this->db->affected_rows() > 0) {
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
						'<td><strong>' . 'Bank Name' . '</strong></td><td>' . ucwords($this->input->post('name') . '</td>')
						. '<td><strong>' . 'Status' . '</strong></td><td>' . $status . '</td>' .
						'</tr>'
					) //detail
					->log(); //Add Database Entry

				return true;
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

		// if($query->num_rows() > 0){
		// 	return $query->row();
		// }else{
		// 	return false;
		// }
	}

	public function update_banks() {

		$data = array(
			'name' => ucwords($this->input->post('name')),
			'status' => $this->input->post('status'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);
		//updation in db
		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update('tbl_banks', $data);
		if ($result == true) {
			// this is for activity log of a record
			if ($this->input->post('status') == '1') {$status = 'Active';} else { $status = 'Inactive';}

			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($this->input->post('id')) //Entry table ID
				->action_type('update') //action type identify Action like add or update
				->detail(
					'<tr>' .
					'<td><strong>' . 'Bank Name' . '</strong></td><td>' . ucwords($this->input->post('name') . '</td>')
					. '<td><strong>' . 'Status' . '</strong></td><td>' . $status . '</td>' .
					'</tr>'
				) //detail
				->log(); //Add Database Entry
			return true;
		} else {
			return false;
		}

    }
    
    public function getBranchesById($id){
        $this->db->from('tbl_list_bank_branches');
		$this->db->where('tbl_banks_id', $id);
		$query = $this->db->get(); 
		$result =  $query->result();
        //return count($result);
        if($result > 0){
            $dropdown = '<option value="">Select Branch</option>';
            foreach ($result as $key => $value) {
                $dropdown .= '<option value="'.$value->id.'">'.$value->name.' ('.$value->branch_code.')</option>'; 
            }

            return $dropdown;
        } else {
            return null;
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
	public function countFiltered($postData) {
		$this->_get_datatables_query($postData);
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