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
		$rowtable[]='<a href="'.site_url('payment/edit/').'" class="btn btn-default glyphicon glyphicon-pencil" ></a>
		<a class="btn btn-default glyphicon glyphicon-pencil" ></a>';
		

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



function edit($data){

}


}
