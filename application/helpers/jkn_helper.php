<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function check_acl($acl=""){
	$CI = &get_instance();

	$curClass = strtolower(get_class($CI));
	$method = $CI->router->fetch_method();

	if(empty($acl))
		$acl = $curClass.'.'.$method;

	if(!$CI->acl_permits($acl))
		redirect("welcome/permission_denied");
}