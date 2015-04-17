/*
 *time js
 *@project stuzone
 *@version 2.0
 *@author c1avie (www.c1avie.com)
 *@copyright bitworkshop
 */
window.onload =function() {
	var d = new Date(),
		year = d.getFullYear(),
	 	month = d.getMonth(),
	 	week = d.getDay(),
	 	day = d.getDate(),
		monthDay = new Array(31,28,31,30,31,30,31,31,30,31,30,31),
		weekDay = "",
		isLeapYear = false;  //是否为闰年

	//将数字转换为汉字
	switch(week) {
		case 0:
			weekDay = "日";
			break;
		case 1:
			weekDay = "一";
			break;
		case 2:
			weekDay = "二";
			break;
		case 3:
			weekDay = "三";
			break;
		case 4:
			weekDay = "四";
			break;
		case 5:
			weekDay = "五";
			break;
		case 6:
			weekDay = "六";
			break;
	}
	//判断是否为闰年
	if( ((year % 4 == 0) && (year % 100 != 0)) || (year % 400 == 0) ) {
		isLeapYear = true;
	}
	//循环计算天数
	function getCurrentDay(theMonth,theDay) {
		var currentDay = 0;
		for(var i = 0;i < monthDay.length;i++) {
			if(i < theMonth) {
				if(isLeapYear && i == 1) {
					currentDay = currentDay + 29;
				}
				else {
					currentDay = currentDay + monthDay[i];
				}
			}
			if(i == theMonth) {
				currentDay = currentDay + theDay;
			}
		}
		return currentDay;
	}
	var nowDay = getCurrentDay(month,day),
	    initialDay = getCurrentDay(8,1),
	    weekYear = parseInt((nowDay - initialDay) / 7);
	
	if(week != 6) {
		weekYear = weekYear + 1;
	} 
	var today = document.getElementById("today");
	today.innerHTML = "今天是" + (month + 1) + "月" + day + "日" + "<span style='margin-left: 15px;'>" + "星期" + weekDay + "</span>" + "<span style='margin-left: 15px;'>" + "第" + weekYear + "周" + "</span>";
}