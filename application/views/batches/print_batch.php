<?=error_reporting('0')?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
<style type="text/css">
.dtable
{
    border-collapse:collapse;
}
.dtable tr th
{
    border:1px solid gray!important;
    border-collapse:collapse;
}


.tbody tr td
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
	     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=($uniquebanks[0]['bfc_bank'] ==1)?'National Bank of Pakistan':'Khyber Bank'?><br>
	     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saddar Road Branch, Peshawar.</p>
	     
	<p>Subject:		&nbsp;&nbsp;&nbsp; <b><u> <?php $grant = $uniquebanks[0]['tbl_name']; 
	               $typofgrant = '';
	                if($grant =='tbl_retirement_grant') $typofgrant = 'RETIREMENT';
	                else if($grant =='tbl_monthly_grant') $typofgrant = 'MONTHLY';
	                else if($grant =='tbl_scholaarship_grant') $typofgrant = 'SCHOLAARSHIP';
	                else  if($grant =='bl_funeral_grant') $typofgrant ='FUNERAL';
	                else if ($grant =='tbl_lump_sum_grant') $typofgrant = 'LUMPSUM';
	                echo $typofgrant.' GRANT PAYMENTS';
	?>
	           </u></b> 
	       
	                                            
	</p>
	<?php 
	                    
	                    $totalamount1 = 0;   
                            foreach($uniquebanks as $row){
                               $tbl_banks_id = $row['tbl_banks_id']; 
                               $tbl_name = $row['tbl_name'];
                              $applications1 =  $this->common_model->getBatchDetailBankWise($tbl_banks_id, $tbl_name, $batch_no);
                                $totalamount1+=intval($applications1['net_amount']);
                            }
                            ?>
                          
                          
	
	<p>
	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I am directed to refer to the subject cited above and to state that the Competent Authority has approved an amount of Rs.<?=number_format($totalamount1)?> for transfer of fund to the 
	    , on account of <?=strtolower($typofgrant)?> grant payments, which may be debited from Benevolent Fund Main Account No. PLS A/C <?=($uniquebanks[0]['bfc_bank'] ==2)?'00945005':'900132-7/ 3086442361'?>, held with your branch, summarized details are as under.
	    
	</p>
	
	

    <table class="dtable" style="Width:100%;">
                <tr>
                    <th>Bank Name</th>
                    <th>No Of Cases</th>
                    <th>Ammount</th>
                </tr>
                <tbody class="tbody">
                    <?php 
	                    
	                    $totalbanks = $totalamount = 0;   
                            foreach($uniquebanks as $row){
                               $tbl_banks_id = $row['tbl_banks_id']; 
                               $tbl_name = $row['tbl_name'];
                              $applications =  $this->common_model->getBatchDetailBankWise($tbl_banks_id, $tbl_name, $batch_no);
                                $totalbanks+= $applications['totalcases'];
                                $totalamount+=intval($applications['net_amount']);
                            ?>
                            
                            <tr>
                                    <td><?=$row['bank_name']?></td>
                                    <td style="text-align:center;"><?=$applications['totalcases']?></td>
                                    <td style="text-align:center;"><?=number_format($applications['net_amount'])?></td>
                            </tr>    
                            
                           
	               <?php } ?>
	               <tr>
	                    <td>Total:</td>
	                    <td style="text-align:center;"><?=$totalbanks?></td>
	                    <td style="text-align:center;"><?=number_format($totalamount)?></td>
	               </tr>
	               </tbody>
	               </table>
	               
    <p>It is, therefore, requested to transfer online the aforementioned amount as per instruction given above, under intimation to this department please</p>
    
    
    <div style="float:left;width: 100%;margin-top: 15%;font-size:10px" >
        <div style="float:left;width: 31%;"> ____________________________________ </div> 
        <div style="float:left;width: 31%;"> ____________________________________ </div> 
        <div style="float:left;width: 31%;"> ____________________________________ </div> 
    </div>
    
    <div style="float:left;width: 100%; font-size:10px;">
        <div style="float:left;width: 31%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assistant (A/Cs Section)</div>   
        <div style="float:left;width: 3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div style="float:left;width: 31%" >Assistant Secertary (B&A)</div>
        <div style="float:left;width: 31%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Secertary</div>
    </div>
    
     <div style="float:left;width: 100%; font-size:10px;">
        <div style="float:left;width: 31%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Benevolent Fund Board</div>   
        <div style="float:left;width: 3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div style="float:left;width: 31%" >Benevolent Fund Board</div>
        <div style="float:left;width: 31%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Benevolent Fund Board</div>
    </div>
    
    <pagebreak /> 
    <?php  
        foreach($uniquebanks as $row1){
                               $tbl_banks_id = $row1['tbl_banks_id']; 
                               $tbl_name = $row1['tbl_name'];
        ?>                      
        <h3 style="text-align:center">LIST FORWARDED TO BANK FOR RELEASE OF PAYMENT</h3>
        <h5 style="text-align:center"><?=$row1['bank_name']?></h5>
    <table class="dtable" style="Width:100%;">
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
	<tbody class="tbody">
    <?php     $applicationsdetail =  $this->common_model->BankApplicationsDetail($batch_no,$tbl_banks_id,$tbl_name); 
              $i = 1; foreach($applicationsdetail as $row) { ?>
      
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?=$row['grantee_name']?></td>
                                    <td><?=$row['father_name']?></td>
                                    <td><?=$row['name']?></td>
                                    <td><?=$row['cnic_no']?></td>
                                    <td><?=$row['bank']?></td>
                                    <td><?=$row['branch_code']?></td>
                                    <td><?=$row['account_no']?></td>
                                    <td><?=number_format($row['net_amount']) ?></td> 
                                    
                                </tr>
                                <?php $i++;
                            } 
                            ?>
        	</tbody>
    </table>
      
    
      <div style="float:left;width: 100%;margin-top: 15%;font-size:10px" >
        <div style="float:left;width: 31%;"> ____________________________________ </div> 
        <div style="float:left;width: 31%;"> ____________________________________ </div> 
        <div style="float:left;width: 31%;"> ____________________________________ </div> 
    </div>
    
    <div style="float:left;width: 100%; font-size:10px;">
        <div style="float:left;width: 31%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assistant (A/Cs Section)</div>   
        <div style="float:left;width: 3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div style="float:left;width: 31%" >Assistant Secertary (B&A)</div>
        <div style="float:left;width: 31%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Secertary</div>
    </div>
    
     <div style="float:left;width: 100%; font-size:10px;">
        <div style="float:left;width: 31%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Benevolent Fund Board</div>   
        <div style="float:left;width: 3%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div><div style="float:left;width: 31%" >Benevolent Fund Board</div>
        <div style="float:left;width: 31%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Benevolent Fund Board</div>
    </div>
    <pagebreak />
    <?php }  ?>
     
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
