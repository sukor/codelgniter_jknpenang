<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//start calss text
class M_film extends CI_Model {


public function __construct(){
	parent::__construct();

}

 public function get_film(){
 	$this->db->select('*');
 	$this->db->from('film');
 	$this->db->order_by('title','asc');

 	$query=$this->db->get();

 	if($query->num_rows() > 0){

 		return $query->result();
 	}



 }




}//end of class