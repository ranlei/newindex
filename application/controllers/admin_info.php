<?php if(!defined('BASEPATH')) exit ("no direct script access allowed controller");
class Admin_info extends CI_Controller {
//读取各个表信息的类

		public function __construct(){
			parent::__construct();
			$this->load->model('admin_model');
			$this->load->helper('url');
		}

		public function link_address($var,$essay_id){//接受$var参数，生成链接地址
			if($var == 1){
				return "http://www.stuzone.com/zone_info/?view-$essay_id.htm";
			}elseif ($var == 2) {
				return "http://www.stuzone.com/zone_vision/?view-$essay_id";
			} elseif ($var == 3) {
				return "http://www.stuzone.com/zone_video/?view-$essay_id";
			} elseif ($var == 4) {

				return "http://www.stuzone.com/zone_download/?view-$essay_id.htm";
			}elseif($var == 5){
				return "http://market.stuzone.com/index.php/goods_info/view/$essay_id";
			}elseif($var == 6){
				return  "http://guwen.stuzone.com/index.php/question/index/$essay_id";
			}else{

				return "not";
			}


		}
		public function pic_address($var,$pic_id){ //接受$var参数，生成图片地址
			if($var == 2){
				return "http://www.stuzone.com/enimo/uploadfile$pic_id";
			}elseif($var == 5) {

				return "http://market.stuzone.com/$pic_id";
			}

		}
		

		public function getRecommendinfo(){ //得到推荐区数据并存入2013_stuzone_index表中
			$res = $this->admin_model->getRecommendData();
			
			//$r = $this->admin_model->detectCat($res[1]['essay_categoryid']);

			// print_r($res[1]['essay_id']);
			// print_r($r);
			// $test = $this->link_address($r,$res[1]['essay_id']);
			// print_r($test);
			for($i=0; $i < count($res);$i++){
				$var_one =$this->admin_model->detectCat($res[$i]['essay_categoryid']);//判断属于哪个频道
				$addr = $this->link_address($var_one,$res[$i]['essay_id']);
				$channel = "tuijian";
				$data = array('categories' => $var_one, 
								'self_id' => $res[$i]['essay_id'],
								'any_link_addr' => $addr,
								'any_title' => $res[$i]['essay_title'],
								'channel' => $channel,
								'pic_addr' => 0);

				$this->admin_model->insertJudgeData($data);
			}


		}

		
		public function getInfoData(){//获取首页资讯数据
			$arr = array(61,65,66,67,68,69,82,149);
			$result =$this->admin_model->getData($arr);

			for($j=0;$j<count($result);$j++){
				$res = $result[$j];
				for($i=0;$i<count($res);$i++){
					$var_one =1;
					$addr = $this->link_address($var_one,$res[$i]['essay_id']);
					$channel = "zixun";
					$data = array('categories' => $var_one, 
									'self_id' => $res[$i]['essay_id'],
									'any_link_addr' => $addr,
									'any_title' => $res[$i]['essay_title'],
									'channel' => $channel,
									'pic_addr' => 0);
					
					$this->admin_model->insertJudgeData($data);
				}
			
			}

		}
		public function getSightData(){//获取首页视觉数据
			// $arr = array(60,73,74,75,76,139);
			$arr = array(75);
			$result =$this->admin_model->getSightData($arr);

			
			for($j=0;$j<count($result);$j++){
				$res = $result[$j];
				for($i=0;$i<count($res);$i++){
					$var_one =2;
					$addr = $this->link_address($var_one,$res[$i]['essay_id']);
					$channel = "shijue";
					preg_match("/src=\"(.+?)\".*?>/",$res[$i]['essay_content'],$matchs);
					preg_match("/uploadfile(.*)/",$matchs[1],$finish_matchs);
				
					$pic_addr = $this->pic_address($var_one,$finish_matchs[1]);
					$data = array('categories' => $var_one, 
									'self_id' => $res[$i]['essay_id'],
									'any_link_addr' => $addr,
									'any_title' => $res[$i]['essay_title'],
									'channel' => $channel,
									'pic_addr' => $pic_addr);
					
					$this->admin_model->insertJudgeData($data);
				
				}
			
			}


		}
		public function getVideoData(){//获取视频数据
			$arr = array(175,176,174,178,179,180,182,183,185);
			$result =$this->admin_model->getData($arr);
			
			for($j=0;$j<count($result);$j++){
				$res = $result[$j];
				for($i=0;$i<count($res);$i++){
					$var_one =3;
					$addr = $this->link_address($var_one,$res[$i]['essay_id']);
					$channel = "shipin";
					$data = array('categories' => $var_one, 
									'self_id' => $res[$i]['essay_id'],
									'any_link_addr' => $addr,
									'any_title' => $res[$i]['essay_title'],
									'channel' => $channel,
									'pic_addr' => 0);
					
					$this->admin_model->insertJudgeData($data);
				}
			
			}

		}
		public function getDownData(){//获取下载数据
			$arr = array(114,115,128,112,113);
			$result =$this->admin_model->getData($arr);
			
			for($j=0;$j<count($result);$j++){
				$res = $result[$j];
				for($i=0;$i<count($res);$i++){
					$var_one =4;
					$addr = $this->link_address($var_one,$res[$i]['essay_id']);
					$channel = "xiazai";
					$data = array('categories' => $var_one, 
									'self_id' => $res[$i]['essay_id'],
									'any_link_addr' => $addr,
									'any_title' => $res[$i]['essay_title'],
									'channel' => $channel,
									'pic_addr' => 0);
					
					$this->admin_model->insertJudgeData($data);
				}
			
			}
		}
		public function getMarketData(){//获取市场热门信息
			$handle = fopen("http://market.stuzone.com/index.php/stuzone_api/hot_goods/27369b3bf4483e8dcfd85ba9a39a947f","rb");
			$content = "";
			while (!feof($handle)) {
			    $content .= fread($handle, 10000);
			}
			fclose($handle);

			$res = json_decode($content);

			for($i=0;$i<count($res);$i++){
				$var_one = 5;
				$addr = $this->link_address($var_one,$res[$i]->good_id);
				$channel = "shichang";
				$pic_link = $this->pic_address($var_one,$res[$i]->good_picsrc);
				$data = array('categories' => $var_one,
								'self_id' =>$res[$i]->good_id,
								'any_link_addr'=>$addr,
								'any_title' =>$res[$i]->good_title,
								'channel' =>$channel,
								'pic_addr' =>$pic_link );
				$this->admin_model->insertJudgeData($data);

			}	




		}

		public function getguwenData(){//获取故问热门信息
			$handle = fopen("http://guwen.stuzone.com/index.php/api/get_hot_ques/20","rb");
			$content = "";
			while (!feof($handle)) {
			    $content .= fread($handle, 10000);
			}
			fclose($handle);

			$res = json_decode($content);
			
			for($i=0;$i<count($res);$i++){
				$var_one = 6;
				$addr = $this->link_address($var_one,$res[$i]->msgid);
				$channel = "guwen";
				
				$data = array('categories' => $var_one,
								'self_id' =>$res[$i]->msgid,
								'any_link_addr'=>$addr,
								'any_title' =>$res[$i]->ques_title,
								'channel' =>$channel,
								'pic_addr' =>0 );
				$this->admin_model->insertJudgeData($data);

			}	

		}

		// public function getRanking(){
		// 		$mon=getdate();
		// 	if($mon['mday']==30){

		// 		$this->admin_model->update_Click();
		// 	}

		// 	$res = $this->admin_model->getAllRanking();
		// 	for ($i=0; $i <count($res) ; $i++) { 
		// 		$var_one =$this->admin_model->detectCat($res[$i]['essay_categoryid']);//判断属于哪个频道
		// 		$addr = $this->link_address($var_one,$res[$i]['essay_id']);
		// 		$data[$i] = array('self_id' =>$res[$i]['essay_id'] ,
		// 						'any_title'=>$res[$i]['essay_title'],
		// 						'all_ranking'=>$res[$i]['essay_click'],
		// 						'ranking_addr'=>$addr, );

								
		// 	}
		// 	echo json_encode($data);

			
		// }
		public function updateData(){ //功能：更新2013_stuzone_index数据
			$this->getRecommendinfo();
			$this->getInfoData();
			$this->getSightData();
			$this->getVideoData();
			$this->getDownData();
			$this->getMarketData();
			$this->getguwenData();

		}

		


	}


