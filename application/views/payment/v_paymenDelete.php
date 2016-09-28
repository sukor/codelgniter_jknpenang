
<?php

$templatetable=array('table_open'=>'<table class="table table-striped">');


$this->table->set_template($templatetable);

$this->table->set_heading('','');

$this->table->add_row('Customer Name',
	$deatilpayment[0]->first_name_customer.' '.
	$deatilpayment[0]->last_name_customer );
$this->table->add_row('Staff Name',
	$deatilpayment[0]->first_name.' '.
	$deatilpayment[0]->last_name );



echo $this->table->generate();


echo form_open('payment/deleteupdate');
?>
<input type='hidden' name='payment_id'  value="<?=$deatilpayment[0]->payment_id?>">
<button type='button' class="btn btn-warning" id='btndelete'> DELETE</button>
<?php
echo form_close();
?>



<script type="text/javascript">
$(document).ready(function(){

$("#btndelete").click(function(){

    alert("The paragraph was clicked.");

});
   
});
</script>


