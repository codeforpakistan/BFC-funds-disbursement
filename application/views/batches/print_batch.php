<?=error_reporting('0')?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
<style type="text/css">
#dtable
{
    border-collapse:collapse;
}
#dtable tr th
{
    border:1px solid gray!important;
    border-collapse:collapse;
}


#tbody tr td
{
    border:1px solid gray!important;
    border-collapse:collapse;
    
}




</style>
</head>
<body style="background: url(assets/site/images/certificatebg.png);background-repeat: no-repeat;background-position: center;">

    <table style="width:100%">
        <tr>
            <td style="width:30%"><img src="assets/upload/images/bfc.png" style="width:150px;"></td>
            <td style="width:40%"></td>
            <td style="width:30%">Government of Khyber Pakhtunkhwa Administration Department Benevolent Fund Cell. Dated Peshawar the <?=date('d-m-Y')?> </td>
        </tr>
        
    </table> 
    <p>To</p>
    <p>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Manager,<br>
	     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=($applications[0]['bfc_bank'] ==1)?'National Bank of Pakistan':'Khyber Bank'?><br>
	     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saddar Road Branch, Peshawar.</p>
	     
	<p>Subject:		&nbsp;&nbsp;&nbsp; <?php 
	                                        if($applications[0]['tbl_grants_id'] ==1) 
	                                            echo 'Scholarship Payments';
	                                       else if($applications[0]['tbl_grants_id'] ==2) 
	                                            echo 'Funeral Payments';
	                                       else if($applications[0]['tbl_grants_id'] ==3) 
	                                            echo 'Retirement Payments';
	                                       else if($applications[0]['tbl_grants_id'] ==4) 
	                                            echo 'Monthly Payments';
	                                       else if($applications[0]['tbl_grants_id'] ==5) 
	                                            echo 'Interest Free Loan Payments';
	                                       else if($applications[0]['tbl_grants_id'] ==6) 
	                                            echo 'Lumpsum Payments';     
	                                            
	                                            
	                               ?>
	                                            
	</p>
	
	<p>
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kindly refer to the subject cited above and to state that Rs.<?=number_format($sum)?> may be transferred to the relevant account of grantees of Benevolent Fund. A detailed list including Name, Father’s Name, Designation, Bank Branch Name, Code & Account Numbers mentioned against each grantee, may be debited from Benevolent Fund General Account No.<?=($applications[0]['bfc_bank'] ==2)?'00945005':'900132-7/ 3086442361'?>  held with your branch.
	</p>

    
    
    
    <table id="dtable" style="Width:100%;">
        <tr>
            <th>S.No</th>
            <th>Name of Government Servant</th>
            <th>Fathe / Husband Name</th>
            <th>Designation</th>
            <th>CNIC</th>
            <th>Name of the Bank and Branch</th>
            <th>Branch Code</th>
            <th>Account No</th>
            <th>Amount</th>
            </th>
        </tr>
	<tbody id="tbody">
    <?php //echo '<pre>'; print_r($applications);die();
     foreach ($applications as $key => $value) {
                                $i++;

                                
                                
                                $application_no = $value['application_no'];
                                $tbl_grants_id = $value['tbl_grants_id'];
                                $tbl_district_id = $value['tbl_district_id'];

                                $grant_info = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no',  $application_no);
                                $emp_info_id = $grant_info['tbl_emp_info_id'];
                                $emp_info = $this->common_model->getRecordByColoumn('tbl_emp_info', 'id',  $emp_info_id);
                                $grantee_name = $emp_info['grantee_name'];
                                $father_husband = $emp_info['father_name'];
                                $cnic = $emp_info['cnic_no'];
                                $tbl_post_id = $emp_info['tbl_post_id'];
 

                                $app_gerund = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $application_no);
                                $tbl_banks_id = $app_gerund['tbl_banks_id']; 
                                $tbl_list_bank_branches_id = $app_gerund['tbl_list_bank_branches_id']; 

                                //tbl_bfc_list_bank

                                $tbl_bank = $this->common_model->getRecordByColoumn('tbl_banks', 'id', $tbl_banks_id);
                                $bank = $tbl_bank['name']; 
                                $tbl_branch = $this->common_model->getRecordByColoumn('tbl_list_bank_branches', 'id', $tbl_list_bank_branches_id);
                                $branch = $tbl_branch['name']; 
                                $code = $tbl_branch['branch_code']; 
                                $bank_branch = $bank.' '.$branch;

                                $tbl_post = $this->common_model->getRecordByColoumn('tbl_post', 'id', $tbl_post_id);
                                $designation = $tbl_post['name']; 

                                
                                 

                                $tbl_grants = $this->common_model->getRecordByColoumn('tbl_grants', 'id', $tbl_grants_id);
                                $grant_name = $tbl_grants['name']; 
                                $grant_tbl_name = $tbl_grants['tbl_name']; 

                       // echo $grant_tbl_name;die();
                                $tbl_app_details = $this->common_model->getRecordByColoumn($grant_tbl_name, 'application_no', $application_no);
                                $account_no = $tbl_app_details['account_no']; 
                                $net_amount = $tbl_app_details['net_amount']; 

                                //$tbl_district = $this->common_model->getRecordByColoumn('tbl_district', 'id', $tbl_district_id);
                                //$district_name = $tbl_district['name']; 


                                //$getRole = $this->admin->getRecordById($value['record_add_by'], $tbl_name = 'tbl_admin');
                                //echo '<pre>'; print_r($getRole);
                                $recordAddDate = $value['record_add_date'];
                                $recordAddDate = date("d-M-Y", strtotime($recordAddDate));
                                //$add_by_date = 'Add by '.$getRole['name'].' on '.$recordAddDate;

                                $app_gerund = $this->common_model->getRecordByColoumn('tbl_grants_has_tbl_emp_info_gerund', 'application_no', $application_no);
                                $status_id = $app_gerund['status']; 
                                $status = $this->common_model->getRecordByColoumn('tbl_case_status', 'id', $status_id);

                                ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $grantee_name; ?></td>
                                    <td><?= $father_husband; ?></td>
                                    <td><?= $designation; ?></td>
                                    <td><?= $cnic; ?></td>
                                    <td><?= $bank_branch; ?></td>
                                    <td><?= $code; ?></td>
                                    <td><?= $account_no; ?></td>
                                    <td><?= number_format($net_amount) ?></td> 
                                    
                                </tr>
                                <?php
                            }
                            ?>
                            
    
    
    
    
    <?php     /*
    
	$counter = 1;

	foreach ($retirementData as $value) {
		$emp_info = $this->common_model->getRecordByColoumn('tbl_emp_info', 'id',  $value['tbl_emp_info_id']);
        $get_brach = $this->common_model->getRecordByColoumn('tbl_list_bank_branches', 'id',  $value['tbl_list_bank_branches_id']);
		?>
		<tr>
		<td><?=$counter?></td>
	    <td><?=$emp_info['grantee_name']?></td>
        <td><?=$emp_info['father_name']?></td>
        <td><?=$emp_info['pay_scale']?></td>
	    <td><?=$emp_info['cnic_no']?></td>
	    <td><?=$get_brach['name']?></td>
	    <td><?=$get_brach['branch_code']?></td>
        <td><?=$value['account_no']?></td>
	    <td><?=$value['net_amount']?></td>
        </tr>
    <?php $counter++; } */?>

        	</tbody>
    </table>
    
    <p>It is requested that compliance report may be provided to this office within three days</p>
    
    
    <div style="float:left;width: 100%;margin-top: 15%;font-size:10px" >
        <div style="float:left;width: 10%" >
            Checked </div><div style="float:left;width: 23%" >_______________________
        </div>   
        <div style="float:left;width: 10%" >
        Verified</div><div style="float:left;width: 23%" >_______________________
        </div>
        <div style="float:left;width: 10%" >
        Yours Sincerely</div><div style="float:left;width: 24%" >_______________________
        </div>
    </div>
    
    <div style="float:left;width: 100%; font-size:10px" >
        <div style="float:left;width: 10%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div style="float:left;width: 23%" >Assistant (A/Cs Section) Benevolent Fund Board</div>   
        <div style="float:left;width: 10%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div style="float:left;width: 23%" >Assistant Secertary (B&A) Benevolent Fund Board</div>
        <div style="float:left;width: 10%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div style="float:left;width: 24%" >Secertary <br> Benevolent Fund Board</div>
    </div>
    
     
<style type="text/css">
    #report table tr td:first-child { text-align: left; width: 30%; }
    .table
    {
        margin-bottom: 0rem!important;
    }
    .dt-card__header
    {
        margin-bottom: 0rem!important;
    }
    
    #toptable 
    {
        border: none!important;
    }
      .table tr td
     {
        border: 1px solid gray!important;   
        border-collapse: collapse!important;
     }
    .table {
            border-collapse: collapse;
            }

</style>
</body>
</html>
