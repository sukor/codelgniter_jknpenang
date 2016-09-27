<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//start calss text
class M_payment extends CI_Model {


public function __construct(){
	parent::__construct();

}


public function get_data_payment(){

$this->_filter_payment();


$length=$this->input->post('length',TRUE);
$start=$this->input->post('start',TRUE);

if($length != -1){
	$this->db->limit($length,$start);
}

$query=$this->db->get();

return $query->result();

}



public function _get_table(){

  $this->db->select('c.first_name as customer_first_name,
  	c.last_name as customer_last_name,
  	s.first_name,s.last_name,p.amount,p.payment_date');
  $this->db->from('payment p');
  $this->db->join('customer c',
  	'c.customer_id=p.customer_id','left');
  $this->db->join('staff s',
  	's.staff_id=p.staff_id','left');
 $this->db->where('1','1',false);
  

}



public function get_total_paymet(){

	$this->_get_table();
	return $this->db->count_all_results();

}


public function count_filter_payment(){

	$this->_filter_payment();
	$query=$this->db->get();
	return $query->num_rows();

}


public function _filter_payment(){

	$column_serach=array('c.first_name','c.last_name',
		's.first_name','s.last_name');

		$this->_get_table();

		$i=0;
		foreach ($column_serach as $row) {


  			// $_POST['search']['value'];
			$datsearch=$this->input->post('search',TRUE);

			if(isset($datsearch['value'])){


				if($i==0){

					$this->db->group_start();
					$this->db->like($row,$datsearch['value']);


				}else{

					$this->db->or_like($row,$datsearch['value']);

				}

				if(count($column_serach)-1 ==$i){
					$this->db->group_end();

				}	


			}

			$i++;

			
		}




	
}








}