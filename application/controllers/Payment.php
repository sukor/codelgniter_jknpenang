<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//start calss text
class Payment extends MY_Controller {


public function __construct(){
	parent::__construct();
	$this->load->model('M_payment');

}

public function test(){
	if(!$this->acl_permits('payment.update'))
	 redirect("welcome/permission_denied");

	echo "boleh view";
}


public function index(){


  
	$data['title']='payment';
 	$d['content']=$this->load->view('payment/v_paymenttable',$data,TRUE);
	  $this->load->view('templateadmin2',$d);


}


public function get_table_ajax_payment(){

  
	$list=$this->M_payment->get_data_payment();


	// $data=array();
    
	foreach ($list as $row) {
		$rowtable=array();
		$rowtable[]=$row->customer_first_name .' '.$row->customer_last_name ;
		$rowtable[]=$row->first_name .' '.$row->last_name ;
		$rowtable[]=$row->amount ;
		$rowtable[]=$row->payment_date;
		$rowtable[]='<a href="'.site_url('payment/update/'.$row->payment_id) .
		'" class="btn btn-primary glyphicon glyphicon-pencil" ></a>
		<a href="'.site_url('payment/delete/'.$row->payment_id) .
		'" class="btn btn-primary glyphicon glyphicon-trash" ></a>';
		

     $data[]=$rowtable;
		
	}


	$out=array(
				'draw'=>$this->input->post('draw',TRUE),	
				'recordsTotal'=>$this->M_payment->get_total_paymet(),
				'recordsFiltered'=>$this->M_payment->count_filter_payment(),
				'data'=>$data

		);


 echo json_encode($out);
//$this->output->enable_profiler(TRUE);

}



public function update($id){
 check_acl();
	
 $data['deatilpayment']=$this->M_payment->get_paymentbyid($id);
  $data['customer']=$this->M_payment->get_customer();


	$d['content']=$this->load->view('payment/v_paymenupdate',$data,TRUE);
	  $this->load->view('templateadmin2',$d);

}

public function updatesave(){
	check_acl("payment.update");
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";

	$paymentid=$this->input->post('payment_id',TRUE);

	$data=array(
			'customer_id'=>$this->input->post('customer',TRUE),
			'amount'=>$this->input->post('amount',TRUE)
		);


	$this->db->where('payment_id',$paymentid);
	$this->db->update('payment',$data);


	///$this->output->enable_profiler(TRUE);

	$this->session->set_flashdata('messageupdate','Seuccesful Update');
    redirect('payment/update/'.$paymentid);



}


public function delete($id){
   check_acl();
   $data['deatilpayment']=$this->M_payment->get_paymentbyid($id);


	$d['content']=$this->load->view('payment/v_paymenDelete',$data,TRUE);
	$this->load->view('templateadmin2',$d);

}

public function deleteupdate(){


	$id=$this->input->post('payment_id',TRUE);

	$this->db->where('payment_id',$id);
	$delete=$this->db->delete('payment');

  if($delete){
  	$this->session->set_flashdata('messageupdate','<div class="alert alert-success" role="alert">Seuccesful Delete
  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> </div>');
  }else{
  	$this->session->set_flashdata('messageupdate','<div class="alert alert-success" role="alert">Delete Fail </div>');
  }
	
	//$this->output->enable_profiler(TRUE);
    redirect('payment');


}





}
