<?php

//print_r($deatilpayment);


?>


<?php
$attribute=array('class'=>'form-horizontal');
echo form_open('payment/updatesave',$attribute);
?>
<?php
if($this->session->flashdata('messageupdate')){
?>
<div class="alert alert-success" role="alert">
<?php

 echo $this->session->flashdata('messageupdate');

?>
</div>
<?php
}
?>
<fieldset>

<!-- Form Name -->
<legend>Form Name</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="customer">Customer</label>
  <div class="col-md-4">
    <select id="customer" name="customer" class="form-control">
    	<?php
    	 foreach ($customer as $row) {

    	 	if($row->customer_id==$deatilpayment[0]->customer_id){

    	 		$sel='selected="selected"';

    	 	}else{
    	 		$sel='';
    	 	}


    	 ?>
		<option <?= $sel ?> value="<?=$row->customer_id ?>">
			<?=$row->first_name .' '.$row->last_name ?></option>
    	<?php
    	 }
    	?>
      
    
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="staff">staff</label>
  <div class="col-md-4">
    <select id="staff" name="staff" class="form-control">
      <option value="1">Option one</option>
      <option value="2">Option two</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="date_payment">Date Payment</label>  
  <div class="col-md-4">
  <input id="date_payment" name="date_payment" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="amount">Amount</label>  
  <div class="col-md-4">
  <input id="amount" name="amount" type="text" value='<?=$deatilpayment[0]->amount?>' class="form-control input-md">
    
  </div>
</div>

<input type="hidden" name="payment_id" value="<?=$deatilpayment[0]->payment_id?>">
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="updatebtn"></label>
  <div class="col-md-4">
    <button type='submit' id="updatebtn" name="updatebtn" class="btn btn-primary">Button</button>
     <a class="btn btn-info" href="<?=site_url('payment')?>">Back</a>

  </div>
</div>

</fieldset>
</form>
