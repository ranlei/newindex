function getRootPath() //得到网站的根目录
  { 
    var strFullPath=window.document.location.href; 
    var strPath=window.document.location.pathname; 
    var pos=strFullPath.indexOf(strPath); 
    var prePath=strFullPath.substring(0,pos); 
    var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
    return(prePath+postPath); 
  } 
function getcatgray($i){ //换取各个管理页面
	if($i==1){

		window.location.href=getRootPath()+"/index.php/admin_info/stu_info";


	}else if($i==2){
		window.location.href=getRootPath()+"/index.php/admin_info/stu_que";

	}else if($i==3){
		window.location.href=getRootPath()+"/index.php/admin_info/stu_market";
	}else if($i==4){
		window.location.href=getRootPath()+"/index.php/admin_info/stu_topic";
	}else if($i==5){
		window.location.href=getRootPath()+"/index.php/admin_info/stu_ann";

	}else if($i==6){
		window.location.href=getRootPath()+"/index.php/admin_info/stu_maintain";

	}else if($i==7){
		alert("7");
	}

}

function getInfo(){
	
}

