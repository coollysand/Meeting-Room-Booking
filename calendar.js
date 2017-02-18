

function newXmlHttp(){

	var xmlhttp		= false;
    var contentType = "application/x-www-form-urlencoded; charset=utf-8";
	
	try{
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	}catch(e){
		try{
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			xmlhttp = false;
		}
	}

	if(!xmlhttp && document.createElement){
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;

}



function getcalendar(pagefile){

	pagefile="calendar.php?id="+pagefile;
	var getcontent;
	getcontent		 =newXmlHttp();
    getcontent.open('GET', pagefile, true);
	getcontent.onreadystatechange = function(){

		if (getcontent.readyState == 4 && getcontent.status == 200) {
				document.getElementById("calendar").innerHTML = getcontent.responseText;
			}

	}
	getcontent.send(null);
}