<?php if(!defined('BASEPATH')) exit ("no direct script access allowed model");
	/**
	* 功能：为控制器admin_stuzone_api提供数据
	*/
	class Admin_api_model extends CI_Model
	{
		
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}



	}

