<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Batches extends MY_Controller {

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        parent::__construct();  
    } 
    
    
    public function create_batch() { 
        
        $data['bank_types'] = $this->common_model->getAllRecordByArray('tbl_banks', array('status' => '1'));        
        $data['grants'] = $this->common_model->getAllRecords('tbl_grants');
        $data['statuses'] = $this->common_model->getAllRecords('tbl_case_status');
        $data['banks'] = $this->common_model->getAllRecords('tbl_list_bank_branches');
        $data['districts'] = $this->common_model->getAllRecords('tbl_district');
        $data['applications'] = $this->common_model->getAllRecordByArray('tbl_grants_has_tbl_emp_info_gerund', null);
        $data['admin_roles'] = $this->common_model->getAllRecords('tbl_admin_role');

		$data['page_title'] = 'Advance Search';
        $data['description'] = '...'; 

		$this->load->view('templates/header', $data);
		$this->load->view('batches/create_batch', $data);
		$this->load->view('templates/footer');
    }
    
	 
	public function view_batches() { 
         
		$data['page_title'] = 'View Batches';
        $data['description'] = '...'; 

		$this->load->view('templates/header', $data);
		$this->load->view('batches/view_batches', $data);
		$this->load->view('templates/footer');
    }
    
    public function get_transactions($id = null) { 
        
        $transactions = $this->common_model->getAllRecordByArray('tbl_transactions', array('application_no' => $id));
        
        $table = '';


        $table .= '
        <form name="formID" id="formID" method="post" action="#">
            <table class="table table-bordered table-striped table-hover table-condensed">  
                <tr>
                    <th width="30%">Amount</th>
                    <td width="70%"><input type="text" name="amount" id="amount" class="form-control" required></td> 
                </tr>  
                <tr>
                    <th>Bank Transaction ID</th>
                    <td><input type="text" name="bank_transaction_id" id="bank_transaction_id" class="form-control" required></td> 
                </tr>  
                <tr>
                    <th>&nbsp;</th>
                    <td>
                        <input type="hidden" name="application_no" id="application_no" value="'.$id.'">
                        <button type="button" onclick="save()" id="btnSave" name="btnSave" class="btn btn-primary  btn-sm"><i class="fa fa-plus"> </i> Save Record</button>
                    </td> 
                </tr>  
            </table>
        </form>';

        $table .= '<h4 class="modal-title">Transactions List</h4>';


        $table .= '<table class="table table-bordered table-striped table-hover table-condensed">';

        $table .= '<thead>
            <tr>
                <th>Sr.</th>
                <th>Amount</th>
                <th>Bank Transaction ID</th>
                <th>Add By / Date</th>
            </tr>
        </thead>';

        if(count($transactions) > 0) { 
            $i=0;
            foreach ($transactions as $key => $value) {
            $i++;
        
                $getRole = $this->admin->getRecordById($value['added_by'], $tbl_name = 'tbl_admin');
                $recordAddDate = date("d-M-Y", strtotime($value['date_added']));

                $add_by_date = 'Add by <i><strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';
                
                $table .= '<tr>
                    <td>'.$i.'</td>
                    <td>'.$value['amount'].'</td>
                    <td>'.$value['bank_transaction_id'].'</td>
                    <td>'. $add_by_date .'</td>
                </tr>';

            }
        } else {
                $table .= '<tr>
                    <td colspan="4">No records!</td> 
                </tr>';
        }
        $table .= '</table>';
 
        echo $table;

    }


    public function add_app_to_batch(){
        
        $postData = $this->input->post();
        echo '<pre>'; print_r($postData); 
        exit;
        
        // $json = array();
        // //print_r($this->input->post());
		// $this->form_validation->set_rules('application_number', ucwords(str_replace('_', ' ', 'application_number')), 'required|xss_clean|trim|min_length[3]|max_length[25]');
		// $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		// if ($this->form_validation->run() === FALSE) {

		// 	$json = array(
		// 		'application_number' => form_error('application_number'), 
		// 	);
		// 	echo json_encode($json);

		// } else {
		// 	$result = $this->batches_model->add_application_to_batch();

		// 	$json = array(
		// 		'success' => false,
		// 	);
		// 	if ($result) {
		// 		$json = array(
		// 			'success' => true,
		// 		);
		// 	}
		// 	echo json_encode($json);
        // }
        
    }

    public function add_transaction() {

        //echo 'i m here'; exit;

        $json = array();  

        $this->form_validation->set_rules('amount', ucwords(str_replace('_', ' ', 'amount')), 'required|xss_clean|trim|min_length[3]|max_length[25]|is_unique[tbl_district.name]|alpha_numeric_spaces', array('alpha_numeric_spaces' => 'The %s field may only contain A-Z, a-z and 0-9 characters.'));
		//$this->form_validation->set_rules('status', 'Selection', 'required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run() === FALSE) {

			$json = array(
				'amount' => form_error('amount'),
				//'status' => form_error('status'),
			);
			echo json_encode($json);

		} else {
            
            $application_no = $this->input->post('application_no');  
            $amount_to_send = $this->input->post('amount');  

            $get_app_table = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $application_no);
            $tbl_grant_id = $get_app_table['tbl_grants_id'];
             
            $get_tbl_grants = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $tbl_grant_id);
            $tbl_grant_name = $get_tbl_grants['tbl_name'];  

            $get_app_amount = $this->common_model->getRecordByColoumn($tbl_grant_name, 'application_no', $application_no);
            $app_amount = $get_app_amount['net_amount'];

            // total paid amount
            $amount = $this->batches_model->get_sum_amount_transaction(); 
            $remaining_amount = $app_amount - $amount;
 
            //checking...
            if($remaining_amount >= $amount_to_send) {
            
                $result = $this->batches_model->add_transaction($tbl_grant_id); 
                $json = array(
                    'success' => false,
                );
                if ($result) {
                    $json = array(
                        'success' => true,
                    );
                }
                echo json_encode($json);  
               
            } else {
                $json = array(
                    'success' => false,
                    'message' => 'You cannot add more than '. $remaining_amount . ' amount',
                );
                echo json_encode($json);  
            }


            
        }
    }
    

    public function batch_app_status() {
        $postData = $this->input->post(); 
        //echo '<pre>'; print_r($postData); exit;
        if(isset($postData['btnSubmit'])){
            

            //$action = $postData['btnSubmit'];
            $batch_no = $postData['batch_no'];

            $countSelected = count($this->input->post('app_no')); 
            if($countSelected > 0) {

                $this->batches_model->update_application_status();
				// set session message
				$this->session->set_flashdata('custom', 'Application(s) status updated successfully!');
				redirect(base_url('batch_details/'.$batch_no));

            } else {
                $this->session->set_flashdata('error_custom', 'Please select some applications to proceed!');
				redirect(base_url('batch_details/'.$batch_no));
            }
        } 
    }
    
    
    function PrintBatch($id)
    {
         $data['applications'] = $this->common_model->getAllRecordByArray('tbl_batches', array('batch_no' => $id));
         //echo '<pre>'; print_r($data);die();
         $page     = 'batches/print_batch.php';
        
    		$this->load->view($page,$data);
    		
    		$html = $this->load->view($page,$data,TRUE);
		
		//$pdfFilePath = $code.'.pdf';
        $m = '';
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath, "I");	
		
    }

    public function batch_details($id = null) { 
         
        $data['page_title'] = 'Batch Details: ' . $id;
        $data['batch_number'] = $id;
        $data['description'] = '...';  
        $data['batch_nmbr'] =  $id;
        $data['applications'] = $this->common_model->getAllRecordByArray('tbl_batches', array('batch_no' => $id));

        $this->load->view('templates/header', $data);
		$this->load->view('batches/batch_details', $data);
		$this->load->view('templates/footer');


       
        
		// $data = $row = array();

        // //$batchesData = $this->batches_model->getRows($_POST);
		// // Fetch batches records
		// $batchesData = $this->batches_model->get_batch_applications($id);
        // //echo '<pre>'; print_r($batchesData); exit;
        // // echo json_encode($batchesData);

		// $i = $_POST['start'];
		// foreach ($batchesData as $batch) {
		// 	$i++;
		// 	//$status = ($batch->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

		// 	$getRole = $this->admin->getRecordById($batch->record_add_by, $tbl_name = 'tbl_admin');
		// 	$recordAddDate = $batch->record_add_date;
		// 	$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

		// 	$add_by_date = 'Add by <i><strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

		// 	$actionBtn = '<a href="' . site_url('batch_details/' . $batch->batch_no ) . '">
        //               <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
        //               </a>';

		// 	// '<a href="javascript:void(0)" onclick="getData(' . "'" . $batch->id . "'" . ')">
        //     //           <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
        //     //           </a>';

		// 	// $actionBtn = '<a href="' . site_url('district/edit_district/' . $districtInfo->id) . '">
		// 	//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
		// 	//                    </a>';
		// 	$data[] = array($i, $batch->application_no, $add_by_date, $actionBtn);
		// }

		// $output = array(
		// 	"draw" => $_POST['draw'],
		// 	"recordsTotal" => $this->batches_model->countAll(),
		// 	"recordsFiltered" => $this->batches_model->countFiltered($_POST),
		// 	"data" => $data,
		// );

		// // Output to JSON format
        // echo json_encode($output);
        
        

    }
    
    public function get_batch_sum($batchID = null){
        if($batchID != '') {
            $result = $this->batches_model->get_total_grant_batch($batchID); 
            return $result;
        } else {
            return '0.00';
        }
    }


    public function get_batch() {

		$data = $row = array();

        //$batchesData = $this->batches_model->getRows($_POST);
		// Fetch batches records
		$batchesData = $this->batches_model->get_batches($_POST);
        //echo '<pre>'; print_r($batchesData); exit;
        // echo json_encode($batchesData);

		$i = $_POST['start'];
		foreach ($batchesData as $batch) {
			$i++;
			//$status = ($batch->status == 1) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Inactive</span>';

			$getRole = $this->admin->getRecordById($batch->record_add_by, $tbl_name = 'tbl_admin');
			$recordAddDate = $batch->record_add_date;
			$recordAddDate = date("d-M-Y", strtotime($recordAddDate));

			$add_by_date = 'Add by <i><strong>' . $getRole['name'] . '</strong> on <strong>' . $recordAddDate . '</strong></i>';

			$actionBtn = '<a href="' . site_url('batch_details/' . $batch->batch_no ) . '">
                      <button type="button"class="btn btn-sm btn-xs btn-primary"><i class="fa fa-history"></i></button>
                      </a>';

			// '<a href="javascript:void(0)" onclick="getData(' . "'" . $batch->id . "'" . ')">
            //           <button type="button" id="item_edit" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
            //           </a>';

			// $actionBtn = '<a href="' . site_url('district/edit_district/' . $districtInfo->id) . '">
			//                    <button type="button" class="item_edit btn btn-sm btn-xs btn-warning"><i class="fa fa-edit"></i></button>
			//                    </a>';
			$data[] = array($i, $batch->batch_no, $batch->applications, $add_by_date, $actionBtn);
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->batches_model->countAll(),
			"recordsFiltered" => $this->batches_model->countFiltered($_POST),
			"data" => $data,
		);

		// Output to JSON format
		echo json_encode($output);
	}



	public function get_reports() {  
        $postData = $this->input->post();
        //echo '<pre>'; var_dump($postData);
        $data = $this->batches_model->get_listing_reports($postData);
		echo json_encode($data);
    }
    
    public function add_batch() {  
        $postData = $this->input->post();
        $bfc_bank = $this->input->post('bfc_bank');
        //echo '<pre>'; print_r($postData); //exit;

        if($postData['action'] == 'btnCreateBatch'){
            
            $countSelected = count($this->input->post('selectall'));
            //echo 'countSelected = '. $countSelected; exit;
            if($countSelected > 0) {

                $this->batches_model->add_batch($this->input->post('selectall'),$bfc_bank);
				// set session message
				$this->session->set_flashdata('custom', 'Batch created successfully!');
				redirect(base_url('batches'));

            } else {
                $this->session->set_flashdata('error_custom', 'Please select some applications to proceed!');
				redirect(base_url('batches'));
            }
        } 
    }

}
?>
