<?php

class Admin_model extends CI_Model {

	public function __construct() {
		$this->load->database();
	}

	public function admin_login($data) {
		//XSS prevention
		$data = $this->security->xss_clean($data);

		$query = $this->db->get_where('tbl_admin', array('username' => $data['username'], 'status' => '1'));
		// $query = $this->db->get_where('tbl_admin', array('username' => $data['username'],'password' => $data['password'],'status' => '1'));
		if ($query->num_rows() == 0) {
			return false;
		} else {
			// return $result = $query->row_array();
			//Compare the password attempt with the password we have stored.
			$result = $query->row_array();
			// $dbpwd = $this->encrypt->decode($result['password']);
			$dbpwd = $result['password'];
			// echo $dbpwd=$result['password'];
			$pwd = md5($data['password']);
			//$validPassword = password_verify($pwd,$result['password']);
			// if($validPassword){
			if ($pwd == $dbpwd) {
				return $result = $query->row_array();
			}
		}
	}

	public function add_admin($enc_pwd, $admin_image) {

		// $dob = strtotime($this->input->post('dob'));
		// $dob = date('Y-m-d', $dob);

		$data = array(
			'username' => $this->input->post('username'),
			'password' => md5($enc_pwd),
			'tbl_admin_role_id' => $this->input->post('tbl_admin_role_id'),
			'tbl_district_id' => $this->input->post('tbl_district_id'),
			'status' => $this->input->post('status'),

			'name' => $this->input->post('name'),
			'image' => $admin_image,
			'gender' => $this->input->post('gender'),
			'email' => $this->input->post('email'),

			'record_add_by' => $_SESSION['admin_id'],
			'record_add_date' => date('Y-m-d H:i:s'),
		);

		//XSS prevention
		$data = $this->security->xss_clean($data);

		//insertion in db
		return $this->db->insert('tbl_admin', $data);
	}

	public function update_admin($enc_pwd, $admin_image) {

		$data1 = array(
			// 'username' => $this->input->post('username'),
			'password' => $enc_pwd,

			'name' => $this->input->post('name'),
			'image' => $admin_image,
			'gender' => $this->input->post('gender'),

		);

		if ($_SESSION['tbl_admin_role_id'] == '1') {

			$data2 = array(

				'tbl_admin_role_id' => $this->input->post('tbl_admin_role_id'),
				'tbl_district_id' => $this->input->post('tbl_district_id'),
				'status' => $this->input->post('status'),
			);
		}

		$data = array();

		if (!empty($data1)) {
			$data = array_merge($data, $data1);
		}

		if (!empty($data2)) {
			$data = array_merge($data, $data2);
		}

		$data = $this->security->xss_clean($data);

		//updation in db
		$this->db->where('id', $this->input->post('id'));
		return $this->db->update('tbl_admin', $data);
	}

	public function view_admin() {

		if ($_SESSION['tbl_admin_role_id'] > '1') {
			$query = $this->db->get_where('tbl_admin', array('id' => $_SESSION['admin_id']));
			return $query->result_array();

		} elseif ($_SESSION['tbl_admin_role_id'] == '1') {
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('tbl_admin');
			return $query->result_array();
		}

    }
    

    public function getAdminByRoleId($roleId) {
        $this->db->select('id, username, name');
        $this->db->from('tbl_admin');  
        $this->db->where('tbl_admin_role_id', $roleId); 
        $this->db->order_by("id", "desc"); 
        $query = $this->db->get();
        return $query->result(); 
    }

	public function check_username_exists($username) {
		$query = $this->db->get_where('tbl_admin', array('username' => $username));
		if (empty($query->row_array())) {
			return true;
		} else {return false;}

	}
	public function check_email_exists($email) {
		$query = $this->db->get_where('tbl_admin', array('email' => $email));
		if (empty($query->row_array())) {
			return true;
		} else {return false;}

	}

}
?>