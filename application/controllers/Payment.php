<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//start calss text
class Payment extends CI_Controller {


public function __construct(){
	parent::__construct();
	$this->load->model('M_payment');

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
		'" class="btn btn-primary glyphicon glyphicon-pencil" ></a>';
		

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

	
 $data['deatilpayment']=$this->M_payment->get_paymentbyid($id);
  $data['customer']=$this->M_payment->get_customer();


	$d['content']=$this->load->view('payment/v_paymenupdate',$data,TRUE);
	  $this->load->view('templateadmin2',$d);

}

public function updatesave(){

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


   redirect('payment/update/'.$paymentid);



}



}
