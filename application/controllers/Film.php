<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//start calss text
class Film extends CI_Controller {


public function __construct(){
	parent::__construct();
	$this->load->model('M_film');

}


public function index(){
	$data['title']='film';

	$data['film']=$this->M_film->get_film();

	/*echo "<pre>";
	print_r($d['film']);
	echo "</pre>";
	die();
*/



  $d['content']=$this->load->view('film/filmdetail',$data,TRUE);
	  $this->load->view('templateadmin2',$d);
}


}//end of class
