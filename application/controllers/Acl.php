<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//start calss text
class Acl extends MY_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function acl_cat(){
		$this->db->insert('acl_categories', array(
		  'category_code' => 'payment',
		  'category_desc' => 'Payment Permissions'
		));
	}

	public function acl_act(){
		$this->db->insert('acl_actions', array(
		  'action_code' => 'update',
		  'action_desc' => 'update payment',
		  'category_id' => 2
		));
		// Insert ID #1
		 
		$this->db->insert('acl_actions', array(
		  'action_code' => 'delete',
		  'action_desc' => 'delete payment',
		  'category_id' => 2
		));
		// Insert ID #2
	}

	public function acl_add(){
		$this->db->insert('acl', array(
		  'action_id' => 3,
		  'user_id' => 2147484848
		));
		// Gives user with user ID 123456 permission for all actions in the general category
		 
		$this->db->insert('acl', array(
		  'action_id' => 4,
		  'user_id' => 2147484848
		));
		// Gives user with user ID 654321 permission to view documents:
	}

}