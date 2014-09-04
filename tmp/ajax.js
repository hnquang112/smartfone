function GetXmlHttpObject(){
	var objXMLHttp=null;
	if (window.XMLHttpRequest) { // Non-IE browsers
        objXMLHttp = new XMLHttpRequest();
	}
	else if (window.ActiveXObject) { // IE
        objXMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	return objXMLHttp;
}
function StateChanged(){
	var id = document.getElementById("alert"); // #alert là chỗ hiện thông báo
	if (xmlHttp.readyState == 4|| xmlHttp.readyState=="complete") {// Complete
		if(xmlHttp.responseText=="0"){ // Nếu giá trị trả về là 0
			id.style.visibility = "visible";
			id.innerHTML = "Tên đăng nhập này đã được sử dụng.";
			id.style.color = "red";
			id.style.marginLeft="195px";
		}
		else{
			if(xmlHttp.responseText=="1"){ // Nếu giá trị trả về là 1
				id.style.visibility = "visible";
				id.innerHTML = "Tên đăng nhập này có thể sử dụng.";
				id.style.color = "blue";
				id.style.marginLeft="195px";
			}
			else{ // Nếu giá trị trả về khác 0 và 1
				id.style.visibility = "hidden";
			}
		}
    }
}
function goTest(obj){
	xmlHttp=GetXmlHttpObject();
	xmlHttp.onreadystatechange = StateChanged;
	var url = "tmp/checkuser.php";
    url = url+"?u=" + obj;
	xmlHttp.open("GET", url,true);
	xmlHttp.send(null);
}