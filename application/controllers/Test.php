<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//start calss text
class Test extends CI_Controller {


public function __construct(){
	parent::__construct();

}



public function index(){
	// echo "ini index";

	$data['product']='ini prodcut';
	$data['product2']='ini prodcut2';
	$data['product3']=array('test'=>'test');


	$this->load->view('foldertest/test',$data);
}


/*
date:26/9/2016
*/
public function test($data='',$data2=''){
	echo $data;
	echo $data2;
}



}//end of class test