<?php
class Emp_info_model extends CI_Model {
	public function __construct() {
		$this->load->database();
		//////// ajax and ssp////////
		// Set table name
		$this->table = 'tbl_emp_info';
		// Set orderable column fields
		$this->column_order = array(null, 'grantee_name', 'status');
		// Set searchable column fields
		$this->column_search = array('grantee_name', 'father_name', 'cnic_no', 'contact_no', 'personnel_no', 'dob');
		// Set default order
		$this->order = array('id' => 'desc');
		//////// ajax and ssp////////
	}

	public function fetchDataPayScale($tbl_post_id) {
		$query = $this->db->query('SELECT tbl_pay_scale.name as pay_scale_name, tbl_pay_scale.id as payscaleid 
        FROM tbl_pay_scale LEFT JOIN tbl_post ON tbl_pay_scale.id = tbl_post.tbl_pay_scale_id 
        WHERE tbl_post.id = ' . $tbl_post_id . ' and tbl_pay_scale.status=1 and tbl_post.status=1');

		return $query->row();
	}

	public function add_emp_info() {

		$dob = date('Y-m-d', strtotime($this->input->post('dob')));

		$data = array(
			'grantee_name' => $this->input->post('grantee_name'),
			'father_name' => $this->input->post('father_name'),
			'dob' => $dob,
			'contact_no' => $this->input->post('contact_no'),
			'tbl_department_id' => $this->input->post('tbl_department_id'),
			'tbl_post_id' => $this->input->post('tbl_post_id'),
            'pay_scale_id' => $this->input->post('pay_scale_id'),
            'pay_scale' => $this->input->post('pay_scale'),
			'tbl_district_id' => $this->input->post('tbl_district_id'),
			'office_address' => $this->input->post('office_address'),
			'other_address' => $this->input->post('other_address'),
			'cnic_no' => $this->input->post('cnic_no'),
			'personnel_no' => $this->input->post('personnel_no'),
			'marital_status' => $this->input->post('marital_status'),
			'status' => $this->input->post('status'),
			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);

		//insertion in db
		$this->db->insert($this->table, $data);
		$last_insert_id = $this->db->insert_id();

		if ($this->db->affected_rows() > 0) {
			// this is for activity log of a record
			$dob = date('d-m-Y', strtotime($dob));

			if ($this->input->post('status') == '1') {$status = 'Active';} else { $status = 'Inactive';}
			$getPost = $this->common_model->getRecordById($this->input->post('tbl_post_id'), $tbl_name = 'tbl_post');
			$getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
			$getDistrict = $this->common_model->getRecordById($this->input->post('tbl_district_id'), $tbl_name = 'tbl_district');

			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($last_insert_id) //Entry table ID
				->action_type('add') //action type identify Action like add or update
				->detail(
					'<tr>' .
					'<td><strong>' . 'Grantee Name' . '</strong></td><td>' . $this->input->post('grantee_name') . '</td>' .
					'<td><strong>' . 'Father Name' . '</strong></td><td>' . $this->input->post('father_name') . '</td>' .
					'<td><strong>' . 'Contact No' . '</strong></td><td>' . $this->input->post('contact_no') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marital Status' . '</strong></td><td>' . $this->input->post('marital_status') . '</td>' .
					'<td><strong>' . 'CNIC No' . '</strong></td><td>' . $this->input->post('cnic_no') . '</td>' .
					'<td><strong>' . 'Date Of Birth' . '</strong></td><td>' . $dob . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Personnel No' . '</strong></td><td>' . $this->input->post('personnel_no') . '</td>' .
					'<td><strong>' . 'District' . '</strong></td><td>' . $getDistrict['name'] . '</td>' .
					'<td><strong>' . 'Status' . '</strong></td><td>' . $status . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Post' . '</strong></td><td>' . $getPost['name'] . '</td>' .
					'<td><strong>' . 'Pay Scale' . '</strong></td><td>' . $this->input->post('pay_scale') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Office Address' . '</strong></td><td>' . $this->input->post('office_address') . '</td>' .
					'<td><strong>' . 'Other Address' . '</strong></td><td>' . $this->input->post('other_address') . '</td>' .
					'</tr>'
				) //detail
				->log(); //Add Database Entry

			return true;
		} else {
			return false;
		}
	}

	public function update_emp_info() {

		$dob = date('Y-m-d', strtotime($this->input->post('dob')));

		$data = array(
			'grantee_name' => $this->input->post('grantee_name'),
			'father_name' => $this->input->post('father_name'),
			'dob' => $dob,
			'contact_no' => $this->input->post('contact_no'),
			'tbl_department_id' => $this->input->post('tbl_department_id'),
			'tbl_post_id' => $this->input->post('tbl_post_id'),
            'pay_scale' => $this->input->post('pay_scale'),
            'pay_scale_id' => $this->input->post('pay_scale_id'),
			'tbl_district_id' => $this->input->post('tbl_district_id'),
			'office_address' => $this->input->post('office_address'),
			'other_address' => $this->input->post('other_address'),
			'cnic_no' => $this->input->post('cnic_no'),
			'personnel_no' => $this->input->post('personnel_no'),
			'marital_status' => $this->input->post('marital_status'),
			'status' => $this->input->post('status'),
		);
		//XSS prevention
		$data = $this->security->xss_clean($data);

		$this->db->where('id', $this->input->post('id'));
		$result = $this->db->update($this->table, $data);

		if ($result == true) {
			// this is for activity log of a record
			$dob = date('d-m-Y', strtotime($dob));

			if ($this->input->post('status') == '1') {$status = 'Active';} else { $status = 'Inactive';}
			$getPost = $this->common_model->getRecordById($this->input->post('tbl_post_id'), $tbl_name = 'tbl_post');
			$getDept = $this->common_model->getRecordById($this->input->post('tbl_department_id'), $tbl_name = 'tbl_department');
			$getDistrict = $this->common_model->getRecordById($this->input->post('tbl_district_id'), $tbl_name = 'tbl_district');

			$this->logger
				->record_add_by($_SESSION['admin_id']) //Set UserID, who created this  Action
				->tbl_name($this->table) //Entry table name
				->tbl_name_id($this->input->post('id')) //Entry table ID
				->action_type('update') //action type identify Action like add or update
				->detail(
					'<tr>' .
					'<td><strong>' . 'Grantee Name' . '</strong></td><td>' . $this->input->post('grantee_name') . '</td>' .
					'<td><strong>' . 'Father Name' . '</strong></td><td>' . $this->input->post('father_name') . '</td>' .
					'<td><strong>' . 'Contact No' . '</strong></td><td>' . $this->input->post('contact_no') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Marital Status' . '</strong></td><td>' . $this->input->post('marital_status') . '</td>' .
					'<td><strong>' . 'CNIC No' . '</strong></td><td>' . $this->input->post('cnic_no') . '</td>' .
					'<td><strong>' . 'Date Of Birth' . '</strong></td><td>' . $dob . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Personnel No' . '</strong></td><td>' . $this->input->post('personnel_no') . '</td>' .
					'<td><strong>' . 'District' . '</strong></td><td>' . $getDistrict['name'] . '</td>' .
					'<td><strong>' . 'Status' . '</strong></td><td>' . $status . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Department' . '</strong></td><td>' . $getDept['name'] . '</td>' .
					'<td><strong>' . 'Post' . '</strong></td><td>' . $getPost['name'] . '</td>' .
					'<td><strong>' . 'Pay Scale' . '</strong></td><td>' . $this->input->post('pay_scale') . '</td>' .
					'</tr>' .
					'<tr>' .
					'<td><strong>' . 'Office Address' . '</strong></td><td>' . $this->input->post('office_address') . '</td>' .
					'<td><strong>' . 'Other Address' . '</strong></td><td>' . $this->input->post('other_address') . '</td>' .
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
    
    public function getRecordByPersonnelNo($personnelNo) {
		// $this->db->from($this->table);
		// $this->db->where('personnel_no', $personnelNo);
        // $query = $this->db->get();
        // //return $query->row();
        // $emp_info = $query->row();
        // $postID = $emp_info->tbl_post_id;
        // $designation = $this->getPostName($postID);
        //return array('empInfo'=>$emp_info, 'designation'=>$designation);

        return $emp_info = array('personnelNo'=>$personnelNo);
        //$designation = array('hobby'=>'coding');

        //return array('empInfo'=>$emp_info, 'designation'=>$designation);
    } 

    public function getPostName($id) {
		$this->db->from('tbl_post');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->row();
    }

    public function getAllNonGazettedEmp($array){
        // $this->db->order_by('id', 'desc');
        // $query = $this->db->get_where($this->table, $array); 
		// return $query->result_array(); 

        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where($array);
        $this->db->where("pay_scale_id < '15' ");
        //$this->db->limit($limit);
        $query = $this->db->get();
        return $query->result_array();

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
        
        if (!($_SESSION['tbl_admin_role_id'] == '1')) {
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
        if (!($_SESSION['tbl_admin_role_id'] == '1')) {
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
        if (!($_SESSION['tbl_admin_role_id'] == '1')) {
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