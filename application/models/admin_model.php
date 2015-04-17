<?php if(!defined('BASEPATH')) exit ("no direct script access allowed model");
	class Admin_model extends CI_Model {
		public function __construct(){
			parent::__construct();
			$this->load->database();

		}

		public function getIndexData($channel,$num){//api,获取首页数据
			$sql = "SELECT id,any_title,any_link_addr,pic_addr FROM 2013_stuzone_index WHERE channel = '$channel' ORDER BY self_id DESC LIMIT 0,$num";
			$query = $this->db->query($sql);
			$res = $query->result_array();
			return $res;

		}

		public function compareData($var,$arr){//功能：判断该栏目是否属于该频道是。
												//$arr:该频道所有栏目集合
			
			$j=0;
	
			for($i=0;$i<count($arr);$i++){
				if($var == $arr[$i]){
					$j++;
					
				}
				
			}
			
			return $j;
			
		}

		public function detectCat($category){//检测所属栏目
			
			$arr_info = array(61,65,66,67,68,69,82,149);
			$arr_sight = array(75);
			$arr_video = array(175,176,174,178,179,180,182,183,185);
			$arr_down = array(114,115,128,112,113);

			if($this->compareData($category,$arr_info)){
				return 1;
				
			}else if ($this->compareData($category,$arr_sight)) {
				return 2;
			}else if ($this->compareData($category,$arr_video)) {
				return 3;
			}else if ($this->compareData($category,$arr_down)) {
				return 4;
			}else{
				return "error";
			}


		}


	
		public function getData($array){//获取首页其他模块数据
			
			$arr = $array;
			
			for($i=0;$i<count($arr);$i++){
				$sql ="SELECT essay_id,essay_title,essay_categoryid,essay_updatetime FROM 
					any_essay WHERE essay_quote=11 AND essay_categoryid = $arr[$i] ORDER BY essay_id DESC limit 0,5"; 
					$query = $this->db->query($sql);
					$res[$i]= $query->result_array();
					
			}
			
			return $res;
			
		}
		public function getSightData($array){//获取首页视觉数据
			
			$arr = $array;
			
			for($i=0;$i<count($arr);$i++){
				$sql ="SELECT essay_id,essay_title,essay_categoryid,essay_content,essay_updatetime FROM 
					any_essay WHERE essay_categoryid = $arr[$i] ORDER BY essay_id DESC limit 0,10"; 
					$query = $this->db->query($sql);
					$res[$i]= $query->result_array();
					
			}
			
			return $res;
			
		}
		//功能描述:无参数调用,返回表any_essay中推荐区数据
		public function getRecommendData(){
			$sql ="SELECT essay_id,essay_title,essay_categoryid,essay_updatetime FROM any_essay WHERE essay_quote=1 ORDER BY essay_id DESC limit 0,15"; 
			$query = $this->db->query($sql);
			$res = $query->result_array();
			return $res;

		}

		public function insertJudgeData($arr){ //向数据库判断插入新数据
		
			$sql_judge = "SELECT * FROM 2013_stuzone_index WHERE self_id=$arr[self_id]";
			
			$query = $this->db->query($sql_judge);
			$res = $query->result_array();
			
			if (!$res) {
				$sql_insert = "INSERT INTO 2013_stuzone_index(categories,self_id,any_link_addr,any_title,channel,pic_addr) 
			 			VALUES ('$arr[categories]','$arr[self_id]','$arr[any_link_addr]','$arr[any_title]','$arr[channel]','$arr[pic_addr]')";
					 	$this->db->query($sql_insert);
			} else{
				echo "is exists";
			}
			

		}


		public function getAllRanking(){

			$sql = "SELECT essay_title,essay_id,essay_categoryid,essay_click FROM any_essay WHERE essay_quote=11 ORDER BY essay_click_mon DESC limit 0,6";
			$query = $this->db->query($sql);
			$res = $query->result_array();
			return $res;
		}

		public function updateClick(){ //更新排行榜
			
			$sql ="UPDATE any_essay SET essay_click_mon=essay_click - essay_click_mon";
			$query = $this->db->query($sql);

		}


		public function getRanking(){
				$mon=getdate();
			if($mon['mday']==16){
			
				$this->updateClick();
			}

			$res = $this->getAllRanking();
			for ($i=0; $i <count($res) ; $i++) { 
				$var_one =$this->detectCat($res[$i]['essay_categoryid']);//判断属于哪个频道
				$addr = $this->link_address($var_one,$res[$i]['essay_id']);
				$data[$i] = array('self_id' =>$res[$i]['essay_id'] ,
								'any_title'=>$res[$i]['essay_title'],
								'all_ranking'=>$res[$i]['essay_click'],
								'ranking_addr'=>$addr, );
	
			}
			return $data;

			
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

		public function getAnn(){ //获取通知
			$sql = "SELECT * FROM 2013_stuzone_ann ORDER BY id DESC LIMIT 1";
			$query = $this->db->query($sql);
			$res = $query->result_array();
			return $res;

		}

		public function add_ann($con){ //添加通知
			$content = $con['content'];
			$pic = $con['pic'];
			$title = $con['title'];
			$sql = "INSERT INTO 2013_stuzone_ann (content,pic_path,title) values('$content','$pic','$title')";
			$query = $this->db->query($sql);

		}
		public function getAllinfo(){ //获取首页所有的信息
			$sql = "SELECT self_id,any_title,channel FROM 2013_stuzone_index";
			$query = $this->db->query($sql);
			$res = $query->result_array();
			return $res;
		}
		public function getTitle($title_num){//获取标题
			$sql = "SELECT self_id,any_title FROM 2013_stuzone_index WHERE self_id='$title_num'";
			$query = $this->db->query($sql);
			$res = $query->result_array();
			return $res;
		}
		public function modTitle($title_id,$title_con){//获取修改标题
			$sql = "UPDATE 2013_stuzone_index SET any_title='$title_con' WHERE self_id='$title_id'";
			$query = $this->db->query($sql);
			
		}

		public function authPass($user){ //验证密码
			$sql = "SELECT pass FROM 2013_stuzone_admin_user WHERE name='$user'";
			$query = $this->db->query($sql);
			if($query){
				$res = $query->result_array();
				return $res[0];
			}else{
				return 0;
			}
		}

		public function getAllann(){ //获取所有通知数据
			$sql = "SELECT * FROM 2013_stuzone_ann";
			$query = $this->db->query($sql);
			$res = $query->result_array();
			return $res;
		}

		public function delAnn($id){
			$sql = "DELETE FROM 2013_stuzone_ann WHERE id='$id'";
			$query = $this->db->query($sql);
		}

		public function getModify($id){
			$sql = "SELECT id,content FROM 2013_stuzone_ann WHERE id ='$id'";
			$query = $this->db->query($sql);
			$res = $query->result_array();
			return $res;
		}

		public function modifyAnn($id,$content){
			$sql = "UPDATE 2013_stuzone_ann SET content = '$content' WHERE id = '$id' ";
			$query = $this->db->query($sql);
			if($query){
				return $id;
			}

		}

}


















