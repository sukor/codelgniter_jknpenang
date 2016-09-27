<h3><?= $title?></h3>

<table id="tablepaymnet" class='table'>
	<thead>
		<tr>
			<th>Customer</th>
			<th>Staff</th>
			<th>Amount</th>
			<th>Payment Date</th>
			<th>Action</th>

		</tr>

	</thead>

</table>

<script type="text/javascript">
$(document).ready(function() {
    $('#tablepaymnet').DataTable( {
        "processing": true,
        "serverSide": true,
        'pageLength':25,
        'lengtMenu':[20,100,200,300],
        "ajax":{
        		"url":"<?= site_url('payment/get_table_ajax_payment')?>",
        		"type":"POST",
        		"data":{"<?= $this->security->get_csrf_token_name()?>":
        				"<?= $this->security->get_csrf_hash()?>"}

        }
    } );
} );
</script>



