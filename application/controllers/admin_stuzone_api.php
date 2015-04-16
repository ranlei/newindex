<?php if(!defined('BASEPATH')) exit ("no direct script access allowed controller");
class Admin_stuzone_api extends CI_Controller { //读取各个表信息的类

		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->helper('url');
		}

		public function getReco(){//功能：获取推荐数据
			$num = 14;
			$channel = "tuijian";
			$res = $this->admin_model->getIndexData($channel,$num);	
			echo json_encode($res);

		}
		public function getInfo(){//功能：获取资讯数据
			$num = 14;
			$channel = "zixun";
			$res = $this->admin_model->getIndexData($channel,$num);	
			echo json_encode($res);
		}

		public function getVision(){//功能：获取视觉数据
			$num = 9;
			$channel = "shijue";
			$res = $this->admin_model->getIndexData($channel,$num);	
			echo json_encode($res);

		}
		public function getVideo(){//功能：u获取视频数据
			$num = 6;
			$channel = "shipin";
			$res = $this->admin_model->getIndexData($channel,$num);	
			echo json_encode($res);

		}
		public function getDown(){//功能：获取下载数据
			$num = 7;
			$channel = "xiazai";
			$res = $this->admin_model->getIndexData($channel,$num);	
			echo json_encode($res);

		}
		public function getMarket(){//功能：获取市场数据
			$num = 4;
			$channel = "shichang";
			$res = $this->admin_model->getIndexData($channel,$num);	
			echo json_encode($res);

		}
		public function getGuwen(){//功能：获取故问数据
			$num = 6;
			$channel = "guwen";
			$res = $this->admin_model->getIndexData($channel,$num);	
			echo json_encode($res);
		}
		public function getRank(){//功能：获取月排行榜单（2013/11/13）
			$res=$this->admin_model->getRanking();
			echo json_encode($res);
		}

		public function getAnn(){//功能:获取最后一条通知(2013/11/24)
			$res=$this->admin_model->getAnn();
			echo json_encode($res);
		}
	}



















 