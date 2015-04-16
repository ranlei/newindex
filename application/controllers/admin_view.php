<?php 

/**
* 功能：后台界面管理的控制器
*/
class Admin_view extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->library('session');
		$this->load->model('admin_model');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');

	}
	

		public function stu_login(){//登录管理
			$user = $this->input->post("user");
			$pass = $this->input->post("pass");     
			$res=$this->admin_model->authPass($user);
			if($res=="0"){
				echo json_encode("2");

			}else if($res['pass']==hash('md5', $pass)){
					$arr = array('user' =>$user ,
								'session_pass' =>$res['pass'] );
					$this->session->set_userdata($arr);
					$session_id = $this->session->userdata('user');
				echo json_encode($session_id);
					


			}else if($res['pass']!=hash('md5', $pass)){
				echo json_encode("1");
			}
			

		}
		public function judge_session(){ //判断session
			$session_id = $this->session->userdata('user');
			echo json_encode($session_id);
		}


		public function des_session(){//销毁session
			$end=$this->session->sess_destroy();
			echo json_encode($end);
		}


		public function stu_ann(){ //通知公搞信息
			$con = $this->input->post("content");
			$this->admin_model->add_ann($con);
			
		}
		public function stu_info(){//首页所有信息集合
			$res = $this->admin_model->getAllinfo();
			echo json_encode($res);


		}

		public function modify_title(){//获取需要修改的标题
			$title_num = $this->input->post("content");
			
			$res = $this->admin_model->getTitle($title_num);
			echo json_encode($res[0]);

		}
		public function modify_title_out(){ //修改标题
			$title_id = $this->input->post("modify_title_id");
			$title_con = $this->input->post("modify_title_con");

			$res = $this->admin_model->modTitle($title_id,$title_con);
		}
		//
		//添加了通知修改删除的功能
		//
		//

		public function getAllann(){ //获取所有通知
			$res = $this->admin_model->getAllann();
			echo json_encode($res);
		}
		
		public function delAnn(){ //删除通知
			$id = $this->input->post("ann_id");
			$res = $this->admin_model->delAnn($id);
		}
		public function getModify(){//获取需要修改的标题
			$id = $this->input->post("ann_id");
			$res = $this->admin_model->getModify($id);
			echo json_encode($res[0]);

		}
		public function modifyAnn(){//正式修改通知
			$id = $this->input->post("ann_id");
			$content = $this->input->post("content");
			$res = $this->admin_model->modifyAnn($id,$content);
			echo json_encode($res);
		}

}
