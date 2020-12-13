<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admins extends MY_Controller {
	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
		parent::__construct();
		//$this->load->helper(array('form', 'url'));
		$this->load->library('Upload');

	}
	public function dashboard() {
		if ($this->session->has_userdata('is_admin_login') || $this->session->has_userdata('is_user_login')) {

			$data['page_title'] = 'Dashboard';
			$getAdminRole = $this->common_model->getRecordById($_SESSION['tbl_admin_role_id'], 'tbl_admin_role');
            $data['usres'] = $this->common_model->getCountAll('tbl_emp_info');
            $data['banks'] = $this->common_model->getCountAll('tbl_list_bank_branches');
            $data['departments'] = $this->common_model->getCountAll('tbl_department');
            $data['districts'] = $this->common_model->getCountAll('tbl_district');
            $data['monthly_grants_applications'] = $this->common_model->getCountAll('tbl_monthly_grant');
            $data['retirement_grants_applications'] = $this->common_model->getCountAll('tbl_retirement_grant');
            $data['scholarship_grants_applications'] = $this->common_model->getCountAll('tbl_scholaarship_grant');
            $data['lumpsum_grants_applications'] = $this->common_model->getCountAll('tbl_lump_sum_grant');
            $data['interestfreeloan_grants_applications'] = $this->common_model->getCountAll('tbl_interest_free_loan');
            $data['funeral_grants_applications'] = $this->common_model->getCountAll('tbl_funeral_grant');
            //$data['applications'] = $this->common_model->getAllRecordByArray('tbl_grants_has_tbl_emp_info_gerund', null);

            $data['description'] = 'Welcome ' . $_SESSION['name'];
			$data['rightDescription'] = $getAdminRole['name'];
			$this->load->view('templates/header', $data);
			$this->load->view('dashboard');
			$this->load->view('templates/footer');
		} else {
			redirect(base_url('auth/logout'));
		}
	}
	// add admin
	public function add_admin() {
		if ($_SESSION['tbl_admin_role_id'] != '1') {
			$this->session->sess_destroy();
			redirect('admin', 'refresh');
		}
		$data['page_title'] = 'Add New User Information';
		$data['description'] = '...';
		$data['admin_role'] = $this->common_model->getAllRecordByArray('tbl_admin_role', array('status' => '1'));
		$data['district'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));
		if ($this->input->post('submit')) {
			//login info
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists|xss_clean|trim|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

			$this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'xss_clean|trim|matches[password]');
			$this->form_validation->set_rules('tbl_admin_role_id', 'Admin Role Selection', 'required|xss_clean|trim');
			$this->form_validation->set_rules('tbl_district_id', 'Subject Selection', 'required|xss_clean|trim');
			//personal info
			if (empty($_FILES['imageFile']['name'])) {
				$this->form_validation->set_rules('imageFile', 'Image', 'required|xss_clean');
			}
			$this->form_validation->set_rules('name', 'Full Name', 'required|xss_clean|trim');
			$this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists|xss_clean|valid_email|trim');
			$this->form_validation->set_rules('status', 'Status', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('admin/add_admin', $data);
				$this->load->view('templates/footer');
			} else {

				$fileUpload = new \Verot\Upload\Upload($_FILES['imageFile']);
				if ($fileUpload->uploaded) {
					$fileUpload->file_auto_rename = true;
					$fileUpload->mime_check = true;
					$fileUpload->file_max_size = '1000000'; // 1mb
					$fileUpload->allowed = array('image/*');
					$fileUpload->forbidden = array('application/*', 'text/*', 'video/*', 'audio/*');
					$fileUpload->no_script = false;
					//$fileUpload->image_min_width = 400;
					$fileUpload->image_ratio = true;
					$fileUpload->image_ratio_crop = true;
					$fileUpload->image_ratio_fill = true;
					$fileUpload->image_resize = true;
					$fileUpload->image_x = 350;
					$fileUpload->image_y = 350;
					//$imgUploadPath=base_url().IMG_UPLOAD_PATH.'admin';
					$fileUpload->process('./assets/upload/images/admin');
					if ($fileUpload->processed == true) {
						$admin_image = $fileUpload->file_dst_name;
						$fileUpload->clean();
					} else {
						$this->session->set_flashdata('img_upload_error', $fileUpload->error);
						redirect(base_url('add_admin'));
					}
				} else {
					$this->session->set_flashdata('img_upload_error', $fileUpload->error);
					redirect(base_url('add_admin'));
				}
				// $enc_pwd = $this->encrypt->encode($this->input->post('password'));
				$enc_pwd = $this->input->post('password');
				// to model
				$this->admin_model->add_admin($enc_pwd, $admin_image);
				// set session message
				$this->session->set_flashdata('add', '!');
				redirect(base_url('view_admin'));
			}
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view('admin/add_admin');
			$this->load->view('templates/footer');
		}
	}
	public function edit_admin($id = null) {
		if ($this->input->post('submit')) {

			if (!empty($this->input->post('current_password'))) {

				$this->form_validation->set_rules('current_password', 'Current Password', 'required|xss_clean|trim|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

				$this->form_validation->set_rules('new_password', 'New Password', 'required|xss_clean|trim|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));

				$this->form_validation->set_rules('c_new_password', 'Confirm New Password', 'required|xss_clean|trim|matches[new_password]|alpha_numeric', array('alpha_numeric' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
			}

			//login info
			// $this->form_validation->set_rules('username','Username','required|callback_check_username_exists|xss_clean|trim|alpha_numeric');
			if ($_SESSION['tbl_admin_role_id'] == '1') {
				$this->form_validation->set_rules('tbl_admin_role_id', 'Admin Role Selection', 'required|xss_clean|trim');
				$this->form_validation->set_rules('tbl_district_id', 'District Selection', 'required|xss_clean|trim');
				$this->form_validation->set_rules('status', 'Status', 'required|xss_clean');
			}
			//personal info
			// if(empty($_FILES['imageFile']['name']))
			// {
			//  $this->form_validation->set_rules('imageFile','Image','required|xss_clean');
			// }
			$this->form_validation->set_rules('name', 'Full Name', 'required|xss_clean|trim');
			$this->form_validation->set_rules('gender', 'Gender', 'required|xss_clean');

			$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
			if ($this->form_validation->run() === FALSE) {
				$data['all'] = $this->common_model->getRecordById($this->input->post('id'), $tbl_name = 'tbl_admin');

				$data['admin_role'] = $this->common_model->getAllRecordByArray('tbl_admin_role', array('status' => '1'));
				$data['district'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));

				$data['page_title'] = 'Edit User Information';
				$data['description'] = '...';
				if (empty($data['all'])) {
					show_404();
				}
				$this->load->view('templates/header', $data);
				$this->load->view('admin/edit_admin', $data);
				$this->load->view('templates/footer');
			} else {

				if (!empty($_FILES['imageFile']['name'])) {
					$fileUpload = new \Verot\Upload\Upload($_FILES['imageFile']);
					if ($fileUpload->uploaded) {
						$fileUpload->file_auto_rename = true;
						$fileUpload->mime_check = true;
						$fileUpload->allowed = array('image/*');
						$fileUpload->forbidden = array('application/*', 'text/*', 'video/*', 'audio/*');
						$fileUpload->no_script = false;
						//$fileUpload->image_min_width = 400;
						$fileUpload->file_max_size = '1000000'; // 1mb
						$fileUpload->image_ratio = true;
						$fileUpload->image_ratio_crop = true;
						$fileUpload->image_ratio_fill = true;
						$fileUpload->image_resize = true;
						$fileUpload->image_x = 350;
						$fileUpload->image_y = 350;
						//$imgUploadPath=base_url().IMG_UPLOAD_PATH.'admin';
						$fileUpload->process('./assets/upload/images/admin');
						if ($fileUpload->processed == true) {
							//del the previous/old image befor the update new one
							// get image name from directory against record id
							$imageName = $this->common_model->getImageNameById($this->input->post('id'), 'tbl_admin');
							//del the image from folder
							$this->common_model->delImage($folderName = 'admin', $imageName['image']);
							$admin_image = $fileUpload->file_dst_name;
							$fileUpload->clean();
						} else {
							$this->session->set_flashdata('img_upload_error', $fileUpload->error);
							redirect(base_url('view_admin'));
						}
					} else {
						$this->session->set_flashdata('img_upload_error', $fileUpload->error);
						redirect(base_url('view_admin'));
					}
				} else {
					$admin_image = $this->input->post('hide_picture');
				}
				// first check the current pwd with db pwd ... then change it with new pwd
				$current_pwd = md5($this->input->post('current_password'));
				$userDetail = $this->admin->getRecordById($this->input->post('id'), 'tbl_admin');
				// $db_pwd = $this->encrypt->decode($userDetail['password']);
                $db_pwd = $userDetail['password'];
                

                //echo $current_pwd.'<br>'.$db_pwd; exit;
                 

				if (!empty($current_pwd)) {
					if ($current_pwd == $db_pwd) {
						// $enc_pwd = $this->encrypt->encode($this->input->post('new_password'));
						$enc_pwd = md5($this->input->post('new_password'));
						$this->session->set_flashdata('pwd', '!');
					} else {
						$enc_pwd = $userDetail['password'];
						$this->session->set_flashdata('pwd_error', '!');
					}
				} else {
					$enc_pwd = $userDetail['password'];
				}
				// to model
				$this->admin_model->update_admin($enc_pwd, $admin_image);
				// set session message
				$this->session->set_flashdata('updated', '!');
				redirect(base_url('view_admin'));
			}
		} else {
			// echo 'admin= '.$_SESSION['admin_id'].' .... $id= '.$id.'<br>';
			// echo 'tbl_admin_role_id= '.$_SESSION['tbl_admin_role_id'];
			if ($_SESSION['tbl_admin_role_id'] != '1') {
				if ($_SESSION['admin_id'] != $id) {
					$this->session->sess_destroy();
					redirect('admin', 'refresh');
				}
			}

			$data['all'] = $this->common_model->getRecordById($id, $tbl_name = 'tbl_admin');
			$data['admin_role'] = $this->common_model->getAllRecordByArray('tbl_admin_role', array('status' => '1'));
			$data['district'] = $this->common_model->getAllRecordByArray('tbl_district', array('status' => '1'));
			$data['page_title'] = 'Edit user Information';
			$data['description'] = '...';
			if (empty($data['all'])) {
				show_404();
			}
			$this->load->view('templates/header', $data);
			$this->load->view('admin/edit_admin', $data);
			$this->load->view('templates/footer');
		}
	}
	// view admin detail
	public function view_admin() {
		if (empty($_SESSION['tbl_admin_role_id'])) {
			$this->session->sess_destroy();
			redirect(base_url('login'), 'refresh');
		}

		$data['view_admin'] = $this->admin_model->view_admin();
		$data['page_title'] = 'View Users/Admin';
		$data['description'] = '...';
		$this->load->view('templates/header', $data);
		$this->load->view('admin/view_admin', $data);
		$this->load->view('templates/footer');
	}
	public function check_username_exists($username) {
		$this->form_validation->set_message('check_username_exists', 'This username is already Exists, Please Choose another');
		if ($this->admin_model->check_username_exists($username)) {
			return true;
		} else {
			return false;
		}
	}
	public function check_email_exists($email) {
		$this->form_validation->set_message('check_email_exists', 'This email is already in use, Please Choose another');
		if ($this->admin_model->check_email_exists($email)) {
			return true;
		} else {
			return false;
		}
	}
}
?>