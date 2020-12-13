<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        parent::__construct(); 
        
        $this->load->model('grants_model');
        $this->load->model('common_model');
        
    } 
    
    
	 
	public function view_reports() { 
        
        $data['grants'] = $this->common_model->getAllRecords('tbl_grants');
        $data['statuses'] = $this->common_model->getAllRecords('tbl_case_status');
        $data['banks'] = $this->common_model->getAllRecords('tbl_list_bank_branches');
        $data['districts'] = $this->common_model->getAllRecords('tbl_district');
        $data['applications'] = $this->common_model->getAllRecordByArray('tbl_grants_has_tbl_emp_info_gerund', null);
        
		$data['page_title'] = 'View All Reports';
        $data['description'] = '...'; 

		$this->load->view('templates/header', $data);
		$this->load->view('reports/view_reports', $data);
		$this->load->view('templates/footer');
	}

	public function get_reports() {  
        $postData = $this->input->post();
        //echo '<pre>'; var_dump($postData);
        $data = $this->reports_model->get_listing_reports($postData);
		echo json_encode($data);
    }
    
    public function create_batch() {  
        $postData = $this->input->post();
        //echo '<pre>'; print_r($postData); //exit;

        if($postData['action'] == 'btnCreateBatch'){
            
            $countSelected = count($this->input->post('selectall'));
            //echo 'countSelected = '. $countSelected;
            if($countSelected > 0) {

                $this->reports_model->add_batch($this->input->post('selectall'));
				// set session message
				$this->session->set_flashdata('custom', 'Batch created successfully!');
				redirect(base_url('reports'));

            } else {
                $this->session->set_flashdata('error_custom', 'Please select some applications to proceed!');
				redirect(base_url('reports'));
            }
        } 
    }













    ### GRANT RELEASED

    public function view_grant_released() { 
        
        $data['grants'] = $this->common_model->getAllRecords('tbl_grants');
        //$data['statuses'] = $this->common_model->getAllRecords('tbl_case_status');
        //$data['banks'] = $this->common_model->getAllRecords('tbl_list_bank_branches');
        $data['districts'] = $this->common_model->getAllRecords('tbl_district');
        //$data['applications'] = $this->common_model->getAllRecordByArray('tbl_grants_has_tbl_emp_info_gerund', null);
        
		$data['page_title'] = 'Grants Released';
        $data['description'] = '...'; 

		$this->load->view('templates/header', $data);
		$this->load->view('reports/view_grant_released', $data);
		$this->load->view('templates/footer');
	}

    public function get_grant_released() {  
        $postData = $this->input->post();
        //echo '<pre>'; var_dump($postData);
        $data = $this->reports_model->get_grant_released($postData);
		echo json_encode($data);
    }





    ### DISBURSEMENT 

    public function view_disbursement() { 
        
        // $data['grants'] = $this->common_model->getAllRecords('tbl_grants');
        // $data['statuses'] = $this->common_model->getAllRecords('tbl_case_status');
        // $data['banks'] = $this->common_model->getAllRecords('tbl_list_bank_branches');
        // $data['applications'] = $this->common_model->getAllRecordByArray('tbl_grants_has_tbl_emp_info_gerund', null);
        
		$data['page_title'] = 'View Total Disbursement';
        $data['description'] = '...'; 

		$this->load->view('templates/header', $data);
		$this->load->view('reports/view_disbursement', $data);
		$this->load->view('templates/footer');
    }
    

    public function get_disbursements_list() {

		$data = $row = array();

		// Fetch grants's records
		$grantsData = $this->grants_model->getRows($_POST);

		$i = $_POST['start'];
		foreach ($grantsData as $grantsInfo) {
			$i++;

            $tbl_name = $grantsInfo->tbl_name;

            $getAmount = $this->common_model->getSumByColoumn($tbl_name, 'grant_amount', 'total_amount', '1', '1');
            $total_amount = 'Rs. '. $getAmount['total_amount'];
  
            $cases = $this->common_model->getCountAll($tbl_name);

			$actionBtn = '<a href="' . site_url('' . $grantsInfo->id . '') . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>';
			 
			$data[] = array($i, $grantsInfo->name, $total_amount, $cases, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->grants_model->countAll(),
			"recordsFiltered" => $this->grants_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}



}
?>
