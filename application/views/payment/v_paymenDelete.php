
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

$attribute=array('id'=>'deleteformpaymnet');

echo form_open('payment/deleteupdate',$attribute);
?>
<input type='hidden' name='payment_id'  value="<?=$deatilpayment[0]->payment_id?>">
<button type='button' class="btn btn-warning" id='btndelete'> DELETE</button>
<?php
echo form_close();
?>

<div id="modalpaymentdelete" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        DELETE DATA
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id='deleteyes' type="button" class="btn btn-primary">Delete</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
$(document).ready(function(){

$("#btndelete").click(function(){

    $('#modalpaymentdelete').modal('show');

    $("#deleteyes").click(function(){

    $('#deleteformpaymnet').submit();

	});



});




   
});
</script>


